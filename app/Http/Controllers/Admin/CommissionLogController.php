<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\CommissionLogBusiness;
use Illuminate\Http\Request;

class CommissionLogController
{
    /**
     * @param Request $request
     * @param CommissionLogBusiness $commission_log_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(
        Request $request,
        CommissionLogBusiness $commission_log_business
    )
    {
        $condition = $request->only([
            'wechat_user_id'
        ]);
        $condition['myWechatUser'] = true;
        $list = $commission_log_business->index($condition);
        // 总记录数
        $total = $commission_log_business->total();
        // 总佣金
        $total_tee = $commission_log_business->totalTee();
        // 今日记录数
        $day_total = $commission_log_business->dayTotal();
        // 今日佣金
        $day_total_tee = $commission_log_business->daytotalTee();
        return view('admin.commissionLog.index', compact('condition','list', 'total', 'total_tee', 'day_total', 'day_total_tee'));
    }
}