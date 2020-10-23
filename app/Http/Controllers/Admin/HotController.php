<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\HotBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotController extends Controller
{
    /**
     * @param HotBusiness $hot_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(HotBusiness $hot_business)
    {
        $list = $hot_business->index();
        return view('admin.hot.index', compact('list'));
    }

    /**
     * @param Request $request
     */
    public function join(Request $request, HotBusiness $hot_business)
    {
        $data = $request->only([
            'product_id', 'status'
        ]);
        $res = $hot_business->createOrUpdate($data);
        if (empty($res)) {
            \Toastr::error('更新失败');
        } else {
            \Toastr::success('更新成功');
        }
        return redirect()->route('product.index');
    }

    /**
     * @param int $id
     * @param HotBusiness $hot_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id = 0, HotBusiness $hot_business)
    {
        $info = $hot_business->show($id);
        return view('admin.hot.edit', compact('info'));
    }

    /**
     * @param Request $request
     * @param HotBusiness $hot_business
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, HotBusiness $hot_business)
    {
        $update_data = $request->only([
            'sort', 'status', 'product_id'
        ]);
        $res = $hot_business->createOrUpdate($update_data);
        if (empty($res)) {
            \Toastr::error('更新失败');
        } else {
            \Toastr::success('更新成功');
        }
        return redirect()->route('admin.hot.index');
    }
}
