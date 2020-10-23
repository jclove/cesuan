<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\AdminUserBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    /**
     * 修改密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(){
        $info = $admin_id = auth()->user();
        return view('admin.adminUser.edit', compact('info'));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request, AdminUserBusiness $admin_user_business)
    {
        $update_data = $request->only([
            'username', 'password'
        ]);

        if (empty($update_data['password'])) {
            unset($update_data['password']);
        } else {
            $update_data['password'] = bcrypt($update_data['password']);
        }
        $admin_id = auth()->user()->id;
        $res = $admin_user_business->update($admin_id, $update_data);
        if (empty($res)){
            \Toastr::error('更新失败');
        }else{
            \Toastr::success('更新成功');
        }
        return redirect()->route('admin.index');
    }
}
