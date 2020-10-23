<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\JsonException;
use App\Http\Business\AgentRelationBusiness;
use App\Http\Business\CashLogBusiness;
use App\Http\Business\CommissionLogBusiness;
use App\Http\Business\OrderBusiness;
use App\Http\Business\SystemConfigBusiness;
use App\Http\Business\UserInfoBusiness;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        view()->share('active', 'user');
    }

    /**
     * @param OrderBusiness $order_business
     * @param UserInfoBusiness $user_info_business
     */
    public function index(
        OrderBusiness $order_business,
        UserInfoBusiness $user_info_business,
        SystemConfigBusiness $system_config_business
    )
    {
        $wechat_user_id = session('wechatUser.id', 0);
        // 我的测算数
        $total = $order_business->count($wechat_user_id);
        $user_info = $user_info_business->show($wechat_user_id);
        $system_config_info = $system_config_business->show();
        $system_config = null;
        if (!empty($system_config_info)) {
            $system_config = json_decode($system_config_info->config, true);
        }
        return view('web.user.index', compact('total', 'user_info', 'system_config'));
    }

    /**
     * @param AgentRelationBusiness $agent_relation_businesss
     */
    public function agent(Request $request, AgentRelationBusiness $agent_relation_business)
    {
        $level = intval($request->get('level', 1));
        // 获取一级分销用户
        if ($level > 3 || $level < 1) {
            return redirect()->route('web.user.agent');
        }
        $wechat_user_id = session('wechatUser.id');
        // 统计一级分销用户数
        $first_count = $agent_relation_business->countLevel($wechat_user_id, 1);
        $second_count = $agent_relation_business->countLevel($wechat_user_id, 2);
        $third_count = $agent_relation_business->countLevel($wechat_user_id, 3);
        $list = $agent_relation_business->index($wechat_user_id, $level);
        return view('web.user.agent', compact('first_count', 'second_count', 'third_count', 'list', 'level'));
    }

    /**
     * @param Request $request
     * @param UserInfoBusiness $user_info_business
     * @param AgentRelationBusiness $agent_relation_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function ranking(
        Request $request,
        UserInfoBusiness $user_info_business,
        AgentRelationBusiness $agent_relation_business
    )
    {
        $level = intval($request->get('level', 0));
        if ($level > 3) {
            return redirect()->route('web.user.ranking');
        }
        if ($level == 0) {
            $list = $user_info_business->gameOrderByCommission();
        } else {
            $list = $agent_relation_business->gameOrderByCommission(session('wechatUser.id'), $level);
        }
        $top_list = $list->splice(0, 3)->all();
        $list = $list->all();
        return view('web.user.ranking', compact('list', 'top_list', 'level'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function poster()
    {
        return view('web.user.poster');
    }


    /**
     * @param SystemConfigBusiness $system_config_business
     * @return mixed
     */
    public function posterCreate(SystemConfigBusiness $system_config_business)
    {
        $share_url = route('web.index', ['share_uuid' => session('wechatUser.uuid')]);
        // 获取产品分类信息
        $system_config = $system_config_business->show();
        $system_config = json_decode($system_config->config, true);

        $qrcode_resize_array = explode('|', $system_config['haibao']['size']);
        $qrcode_base64 = base64_encode(QrCode::format('png')->margin(0)->size($qrcode_resize_array[2])->generate($share_url));
        // 生成海报
        $img = Image::cache(function ($image) use ($system_config, $qrcode_base64, $qrcode_resize_array) {
            $image->make(public_path($system_config['haibao']['image']))->insert($qrcode_base64, 'top-left', $qrcode_resize_array[0], $qrcode_resize_array[1]);
        }, 60, true);
        return $img->response('png');
    }

    /**
     * @param UserInfoBusiness $user_info_business
     * @param CashLogBusiness $cash_log_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cashLog(
        UserInfoBusiness $user_info_business,
        CashLogBusiness $cash_log_business
    )
    {
        $user_info = $user_info_business->show(session('wechatUser.id'));
        $list = $cash_log_business->index([
            'wechat_user_id' => $user_info->wechat_user_id,
            'pay_status' => 'yes'
        ]);
        return view('web.user.cashLog', compact('list', 'user_info'));
    }

    /**
     * @param UserInfoBusiness $user_info_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cash(
        UserInfoBusiness $user_info_business,
        CashLogBusiness $cash_log_business
    )
    {
        $wechat_user_id = session('wechatUser.id');
        $user_info = $user_info_business->show($wechat_user_id);
        $total = $cash_log_business->totalCash($wechat_user_id);
        return view('web.user.cash', compact('user_info', 'total'));
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws JsonException
     */
    public function userCash(Request $request, UserInfoBusiness $user_info_business, CashLogBusiness $cash_log_business)
    {
        $total_fee = $request->get('total_fee', 0);
        if ($total_fee < 0.3) {
            throw new JsonException(30002);
        }
        $wechat_user_id = session('wechatUser.id');
        $user_info = $user_info_business->show($wechat_user_id);
        // 判断可提现金额
        if ($user_info->commission < $total_fee) {
            throw new JsonException(30001);
        }
        // 判断今日是否已提现过
        $count = $cash_log_business->dayCash($wechat_user_id);
        if ($count > 0) {
            throw new JsonException(30003);
        }
        // 提现操作
        DB::beginTransaction();
        try {
            // 生成提现日志
            $cash_log_info = $cash_log_business->store([
                'wechat_user_id' => $wechat_user_id,
                'out_trade_no' => Helper::createOutTradeNo(),
                'total_fee' => $total_fee,
            ]);
            // 减少
            $res = $user_info_business->updateCommission($wechat_user_id, $cash_log_info->total_fee);
            if (empty($res)) {
                DB::rollback();
                throw new JsonException(30001);
            }
            // 企业付款到零钱
            $result = app('pay.wechat')->transfer([
                'partner_trade_no' => $cash_log_info->out_trade_no,
                'openid' => session('wechatUser.openid'),
                'check_name' => 'NO_CHECK',
                'amount' => $cash_log_info->total_fee * 100,
                'desc' => '佣金提现'
            ]);
            $cash_log_business->update($cash_log_info->id, [
                'transaction_id' => $result['payment_no'],
                'pay_time' => date('YmdHis', strtotime($result['payment_time'])),
                'pay_status' => 'yes'
            ]);
            DB::commit();
            return $this->jsonFormat(true);
        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
            DB::rollback();
            throw new JsonException(10000);
        }
    }

    /**
     * @param UserInfoBusiness $user_info_business
     * @param CommissionLogBusiness $commission_log_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function commissionLog(
        UserInfoBusiness $user_info_business,
        CommissionLogBusiness $commission_log_business
    )
    {
        $wechat_user_id = session('wechatUser.id');
        $user_info = $user_info_business->show($wechat_user_id);
        $list = $commission_log_business->index([
            'wechat_user_id' => $wechat_user_id,
            'type' => 'game'
        ]);
        return view('web.user.commissionLog', compact('list', 'user_info'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wechat()
    {
        $type = 'wechat';
        return view('web.user.qrcode', compact('type'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kefu()
    {
        $type = 'kefu';
        return view('web.user.qrcode', compact('type'));
    }

    /**
     * @param OrderBusiness $order_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function my(OrderBusiness $order_business)
    {
        $wechat_user_id = session('wechatUser.id');
        $list= $order_business->index([
            'pay_status' => 'yes',
            'wechat_user_id' => $wechat_user_id
        ]);
        return view('web.user.my', compact('list'));
    }
}