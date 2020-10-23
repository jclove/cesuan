<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\ProductBusiness;
use App\Http\Business\ProductClassBusiness;
use App\Http\Requests\ProductUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductBusiness $product_business)
    {
        $list = $product_business->index([
            'isHot' => true
        ]);
        return view('admin.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = 0, ProductBusiness $product_business, ProductClassBusiness $product_class_business)
    {
        $info = $product_business->show($id);
        // 获取分类列表
        $product_class_list = $product_class_business->index();

        return view('admin.product.edit', compact('info', 'product_class_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, $id = 0, ProductBusiness $product_business)
    {
        $update_data = $request->only([
            'pid', 'name', 'desc', 'alias', 'total_fee', 'price', 'sort', 'status', 'wechat_total_fee'
        ]);

        $res = $product_business->update($id, $update_data);

        if (empty($res)){
            \Toastr::error('更新失败');
        }else{
            \Toastr::success('更新成功');
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
