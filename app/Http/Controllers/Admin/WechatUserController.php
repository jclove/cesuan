<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\WechatUserBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatUserController extends Controller
{
    /**
     * @param Request $request
     * @param WechatUserBusiness $wechat_user_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request,WechatUserBusiness $wechat_user_business)
    {
        $condition = $request->only([
            'nickname'
        ]);
        $list = $wechat_user_business->index($condition);
        return view('admin.user.index', compact('list'));
    }
}
