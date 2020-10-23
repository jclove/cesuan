<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\OrderBusiness;
use App\Http\Business\ProductBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request, OrderBusiness $order_business)
    {
        $condition = $request->only([
            'pay_status', 'wechat_user_id', 'out_trade_no'
        ]);
        $list = $order_business->index($condition);

        $pay_type = config('site.pay_type');

        return view('admin.order.index', compact('list', 'pay_type', 'condition'));
    }

    /**
     * @param Request $request
     * @param OrderBusiness $order_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request, OrderBusiness $order_business, ProductBusiness $product_business)
    {
        $order_id = $request->get('order_id', 0);
        $info = $order_business->show($order_id);

        $pay_type = config('site.pay_type');
        $product_info = $product_business->show($info->product_id);

        return view('admin.order.detail', compact('info', 'pay_type', 'product_info'));
    }
}
