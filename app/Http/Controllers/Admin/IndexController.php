<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\OrderBusiness;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(OrderBusiness $order_business)
    {
        // 按支付状态分组
        $group_pay_stauts = $order_business->groupPayStauts();
        // 按类型分组
        $group_pay_type = $order_business->groupPayType();
        // 按天分组单数
        $group_day = $order_business->groupDay();
        $pay_type_array = config('site.pay_type');
        return view('admin.index', compact('pay_type_array','group_pay_stauts', 'group_pay_type', 'group_day'));
    }
}