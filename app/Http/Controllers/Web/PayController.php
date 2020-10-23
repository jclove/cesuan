<?php

namespace App\Http\Controllers\Web;

use App\Http\Business\OrderBusiness;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class PayController extends Controller
{
    /**
     * @var bool
     */
    private $isMobile = true;

    /**
     * PayController constructor.
     */
    public function __construct()
    {
        $agent = new Agent();
        $this->isMobile = $agent->isMobile();
        $this->middleware('existOrderId')->except([
            'aliPayNotify', 'wechatNotify'
        ]);
    }

    /**
     * @param OrderBusiness $order_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|string
     */
    public function wechat(OrderBusiness $order_business)
    {
        $order_id = session('order_id');
        $order_info = $order_business->show($order_id);
        if (empty($order_info)) {
            return redirect()->route('web.index');
        }
        if ($order_info->pay_status == 'yes') {
            return redirect()->route('web.product.show');
        }
        $config = [
            'return_url' => route('web.pay.payReturn'),
            'notify_url' => route('web.pay.wechatNotify')
        ];
        $order = [
            'out_trade_no' => $order_info->out_trade_no,
            'total_fee' => $order_info->total_fee * 100,
            'body' => $order_info->body,
        ];
        try {
            if ($this->isMobile) {
                $pay_type = 'h5wechat';
                $gopay = app('pay.wechat', $config)->wap($order);
            } else {
                $pay_type = 'pcwechat';
                $pay_info = app('pay.wechat', $config)->scan($order);
                $gopay = view('web.pay.wechat', compact('order_info', 'pay_info'));
            }
            $order_business->update($order_info->id, [
                'pay_type' => $pay_type
            ]);
            return $gopay;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param OrderBusiness $order_business
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function alipay(OrderBusiness $order_business)
    {
        $order_id = session('order_id');
        $order_info = $order_business->show($order_id);
        if (empty($order_info)) {
            return redirect()->route('web.index');
        }
        if ($order_info->pay_status == 'yes') {
            return redirect()->route('web.product.show');
        }
        $config = [
            'return_url' => route('web.pay.payReturn'),
            'notify_url' => route('web.pay.aliPayNotify')
        ];
        $order = [
            'out_trade_no' => $order_info->out_trade_no,
            'total_amount' => $order_info->total_fee,
            'subject' => $order_info->body,
        ];
        try {
            if ($this->isMobile) {
                $pay_type = 'h5alipay';
                $gopay = app('pay.alipay', $config)->wap($order);
            } else {
                $pay_type = 'alipay';
                $gopay = app('pay.alipay', $config)->web($order);
            }
            $order_business->update($order_info->id, [
                'pay_type' => $pay_type
            ]);
            return $gopay;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payReturn()
    {
        return view('web.pay.payReturn');
    }

    /**
     * @param OrderBusiness $order_business
     * @return string
     */
    public function wechatNotify(OrderBusiness $order_business)
    {
        $app = app('pay.wechat');
        try {
            $data = $app->verify();
            \Log::info('wechatPayNotify start');
            $order_info = $order_business->showOutTradeNo($data['out_trade_no']);
            // 找不到该订单
            if (empty($order_info)) {
                return 'fail';
            }
            // 检查订单是否已经更新过支付状态
            if ($order_info->pay_status == 'yes') {
                return $app->success();
            };

            $order_business->update($order_info->id, [
                'transaction_id' => $data['transaction_id'],
                'pay_status' => 'yes',
                'pay_user' => $data['openid'],
                'pay_time' => $data['time_end'],
            ]);
            if ($order_info->wechat_user_id) {
                self::commission($order_info);
                // 模版消息推送
                $system_config_info = app('\App\Http\Business\SystemConfigBusiness')->show();
                $system_config_info = json_decode($system_config_info->config, true);
                // 模版消息ID不为空
                if (!empty($system_config_info['base']['template'])) {
                    // 获取产品名称
                    $product_info = app('\App\Http\Business\ProductBusiness')->show($order_info->product_id);
                    if (empty($product_info)) {
                        return $app->success();
                    }
                    // 获取用户信息
                    $user_info = app('\App\Http\Business\WechatUserBusiness')->show($order_info->wechat_user_id);
                    if (empty($user_info)) {
                        return $app->success();
                    }
                    $send_res = app('wechat.official_account')->template_message->send([
                        'touser' => $user_info->openid,
                        'template_id' => $system_config_info['base']['template'],
                        'url' => route('web.product.show', ['order_id' => $order_info->id]),
                        'data' => [
                            'first' => ['您好，您的测算服务已完成', '#006abf'],
                            'keyword1' => [$product_info['name'], '#f95b14'],
                            'keyword2' => [date('Y-m-d H:i'), '#006abf'],
                            'remark' => [$system_config_info['base']['template_remark'], '#666666']
                        ]
                    ]);
                    \Log::info($send_res);
                }
            }
            \Log::info('wechatPayNotify end');
            return $app->success();
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
            return 'fail';
        }
    }

    /**
     * @param OrderBusiness $order_business
     * @return string
     */
    public function aliPayNotify(OrderBusiness $order_business)
    {
        $app = app('pay.alipay');
        try {
            $data = $app->verify();
            \Log::info($data);
            \Log::info('aliPayNotify start');
            $order_info = $order_business->showOutTradeNo($data['out_trade_no']);
            // 找不到该订单
            if (empty($order_info)) {
                return 'fail';
            }
            // 检查订单是否已经更新过支付状态
            if ($order_info->pay_status == 'yes') {
                return $app->success();
            };
            // 判断订单支付状态
            if ($data['trade_status'] != 'TRADE_SUCCESS' && $data['trade_status'] != 'TRADE_FINISHED') {
                return 'fail';
            }
            $pay_user = isset($data['buyer_logon_id']) ? $data['buyer_logon_id'] : $data['buyer_id'];
            $order_business->update($order_info->id, [
                'transaction_id' => $data['trade_no'],
                'pay_status' => 'yes',
                'pay_user' => $pay_user,
                'pay_time' => date('YmdHis', strtotime($data['gmt_payment']))
            ]);
            \Log::info('aliPayNotify end');
            return $app->success();
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
            return 'fail';
        }
    }

    /**
     * @param OrderBusiness $order_business
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkPay(OrderBusiness $order_business)
    {
        $order_id = session('order_id');
        $order_info = $order_business->show($order_id);
        return $this->jsonFormat($order_info['pay_status']);
    }

    /**
     * @param $order_info
     */
    private function commission($order_info)
    {
        $system_config_business = app('\App\Http\Business\SystemConfigBusiness');
        $commission_log_business = app('\App\Http\Business\CommissionLogBusiness');
        $agent_relation_business = app('\App\Http\Business\AgentRelationBusiness');
        $user_info_business = app('\App\Http\Business\UserInfoBusiness');

        $system_config_info = $system_config_business->show();
        if (empty($system_config_info)) {
            return false;
        }
        $system_config = json_decode($system_config_info->config, true);
        if (empty($system_config)) {
            return false;
        }
        $distribution_array = [
            0,
            $system_config['distribution']['first'],
            $system_config['distribution']['second'],
            $system_config['distribution']['third'],
        ];

        for ($i = 1; $i <= 3; $i++) {
            $distribution = $distribution_array[$i];
            if (empty($distribution)) {
                continue;
            }
            // 获取购买用户一级分销
            $pid_distribution_info = $agent_relation_business->show($order_info->wechat_user_id, $i);
            if (empty($pid_distribution_info)) {
                return false;
            }
            $count = $commission_log_business->isExist($order_info->id, $pid_distribution_info->pid);
            if ($count > 0) {
                return false;
            }
            $distribution_price = $distribution / 100 * $order_info->total_fee;
            // 写入日志
            $commission_log_business->store([
                'wechat_user_id' => $pid_distribution_info->pid,
                'order_id' => $order_info->id,
                'buy_user_id' => $order_info->wechat_user_id,
                'buy_total_fee' => $order_info->total_fee,
                'proportion' => $distribution / 100,
                'finally' => $distribution_price,
                'type' => $order_info->type
            ]);
            // 用户更新
            $user_info_business->update($pid_distribution_info->pid, [
                'commission' => DB::raw('commission + ' . $distribution_price),
                'total_commission' => DB::raw('total_commission + ' . $distribution_price),
            ]);
        }
    }
}