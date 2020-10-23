<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\CashLogBusiness;
use Illuminate\Http\Request;

class CashLogController
{
    /**
     * @param Request $request
     * @param CashLogBusiness $cash_log_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        Request $request,
        CashLogBusiness $cash_log_business
    ){
        $condition = $request->only([
            'nickname', 'wechat_user_id'
        ]);
        $condition['realationWechatUser'] = true;

        $list = $cash_log_business->index($condition);
        // 总记录数
        $total = $cash_log_business->total();
        $total_sum = $cash_log_business->totalSum();
        $day_total_sum = $cash_log_business->dayTotalSum();
        return view('admin.cash.index', compact('list', 'condition', 'total', 'total_sum', 'day_total_sum'));
    }
}