<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\JsonException;
use App\Http\Business\OrderBusiness;
use App\Http\Business\ProductBusiness;
use App\Http\Business\ResourceBusiness;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @param OrderBusiness $order_business
     * @param ProductBusiness $product_business
     * @return \Illuminate\Http\JsonResponse
     * @throws JsonException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(
        Request $request,
        OrderBusiness $order_business,
        ProductBusiness $product_business,
        ResourceBusiness $resource_business
    )
    {
        $store_data = $request->only([
            'product_id',
            'realname',
            'birthday',
            'birthtime',
            'sex',
            'other_realname',
            'other_birthday',
            'other_sex',
            'other_birthtime',
        ]);
        // 获取产品信息
        $product_info = $product_business->show($store_data['product_id']);
        if (empty($product_info)) {
            throw new JsonException(10000);
        }

        $total_fee = session('is_weixin') == 'yes' ? $product_info->wechat_total_fee : $product_info->total_fee;
        $wechat_user_id = session('is_weixin') == 'yes' ? session('wechatUser.id', 0) : 0;
        $store_data = array_merge($store_data, [
            'wechat_user_id' => $wechat_user_id,
            'out_trade_no' => Helper::createOutTradeNo(),
            'total_fee' => $total_fee,
            'price' => $product_info->price,
            'body' => $product_info->name,
            'share_from' => '',
            'type' => Helper::getOrderType(),
        ]);

        if (empty($store_data['other_realname']) && empty($store_data['other_birthday'])) {
            unset($store_data['other_realname'], $store_data['other_birthday'], $store_data['other_sex'], $store_data['other_birthtime']);
        }
        // 请求数据
        $content = Helper::postHttp('http://luck.zunyue.me/api/cesuan', array_merge($store_data, [
            'product_sn' => $product_info->identity,
            'isApp' => 1,
        ]));
        if (empty($content) || $content['error_code'] != 0) {
            // 处理
            \Log::info('错误');
        }
        $store_data['content'] = json_encode($content['body_data'], JSON_UNESCAPED_UNICODE);

        $order_info = $order_business->store($store_data);
        session(['order_id' => $order_info->id]);
        return $this->jsonFormat(true);
    }
}