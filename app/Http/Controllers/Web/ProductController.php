<?php

namespace App\Http\Controllers\Web;

use App\Http\Business\HotBusiness;
use App\Http\Business\OrderBusiness;
use App\Http\Business\ProductBusiness;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('existOrderId')->except([
            'index'
        ]);
    }

    /**
     * @param Request $request
     * @param ProductBusiness $product_business
     */
    public function index(
        Request $request,
        ProductBusiness $product_business,
        HotBusiness $hot_business
    )
    {
        $product_id = $request->get('product_id');
        $product_info = $product_business->show($product_id);
        if (empty($product_info)) {
            return redirect()->route('web.index');
        }

        // 热门测算
        $hot_list = $hot_business->index([
            'pageSize' => 8
        ]);

        return view("web.product.{$product_info->identity}.index", compact('product_info', 'hot_list'));
    }

    /**
     * @param Request $request
     */
    public function showPay(
        ProductBusiness $product_business,
        OrderBusiness $order_business,
        HotBusiness $hot_business
    )
    {
        $order_id = session('order_id', 0);
        $order_info = $order_business->show($order_id);
        if (empty($order_info)) {
            return redirect()->route('web.index');
        }
        // 产品信息
        $product_info = $product_business->show($order_info->product_id);
        if (empty($product_info)) {
            return redirect()->route('web.index');
        }
        // 用户额外信息
        $other_user_info = Helper::calendar($order_info->birthday);
        $other_other_user_info = false;
        if (isset($order_info['other_birthday']) && !empty($order_info['other_birthday'])) {
            $other_other_user_info = Helper::calendar($order_info['other_birthday']);
        }
        // 配置信息
        $bir_time_config = config('site.bir_time');

        $wechatPayInfo = '';
        if (session('is_weixin') == 'yes') {
            $config = [
                'return_url' => route('web.pay.payReturn'),
                'notify_url' => route('web.pay.wechatNotify')
            ];

            // 微信支付
            $order = [
                'out_trade_no' => $order_info->out_trade_no,
                'total_fee' => $order_info->total_fee * 100,
                'body' => $order_info->body,
                'openid' => session('wechatUser.openid'),
            ];
            try {
                $order_business->update($order_info->id, [
                    'pay_type' => 'wechat'
                ]);
                $wechatPayInfo = json_encode(app('pay.wechat', $config)->mp($order));
            } catch (\Exception $exception) {
                $errorMessage = $exception->getMessage();
                if (strpos($errorMessage, '已支付') !== false) {
                    $pay_info = app('pay.wechat')->find($order_info->out_trade_no);
                    $order_business->update($order_info->id, [
                        'pay_type' => 'wechat',
                        'transaction_id' => $pay_info['transaction_id'],
                        'pay_status' => 'yes',
                        'pay_user' => $pay_info['openid'],
                        'pay_time' => $pay_info['time_end'],
                    ]);
                    return redirect()->route('web.product.show');
                }
            }
        }

        // 热门测算
        $hot_list = $hot_business->index([
            'pageSize' => 8
        ]);

        return view("web.product.{$product_info->identity}.showPay", compact('wechatPayInfo', 'bir_time_config', 'other_user_info', 'order_info', 'product_info', 'hot_list', 'other_other_user_info'));
    }

    /**
     * @param ProductBusiness $product_business
     * @param OrderBusiness $order_business
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(
        Request $request,
        ProductBusiness $product_business,
        OrderBusiness $order_business,
        HotBusiness $hot_business
    )
    {
        if ($request->has('order_id')) {
            $wechat_user_id = session('wechatUser.id');
            $order_id = $request->get('order_id');
            $order_info = $order_business->getUserOrder($wechat_user_id, $order_id);
        } else {
            $order_id = session('order_id', 0);
            $order_info = $order_business->show($order_id);
        }
        if (empty($order_info)) {
            return redirect()->route('web.index');
        }
        if ($order_info->pay_status != 'yes') {
            return redirect()->route('web.product.showPay');
        }
        // 用户额外信息
        $other_user_info = Helper::calendar($order_info->birthday);
        $other_other_user_info = false;
        if (isset($order_info['other_birthday']) && !empty($order_info['other_birthday'])) {
            $other_other_user_info = Helper::calendar($order_info['other_birthday']);
        }
        // 产品信息
        $product_info = $product_business->show($order_info->product_id);
        if (empty($order_info)) {
            return redirect()->route('web.index');
        }
        // 配置信息
        $bir_time_config = config('site.bir_time');
        $content = json_decode($order_info->content, true);
        if (empty($content)) {
            // 处理
        }
        $order_info->content = $content;


        // 热门测算
        $hot_list = $hot_business->index([
            'pageSize' => 8
        ]);

        return view("web.product.{$product_info->identity}.show", compact('bir_time_config', 'other_user_info', 'order_info', 'product_info', 'hot_list', 'other_other_user_info'));
    }
}