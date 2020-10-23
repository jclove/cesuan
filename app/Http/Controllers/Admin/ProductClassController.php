<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\ProductClassBusiness;
use App\Http\Requests\ProductClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductClassBusiness $product_class_business)
    {
        $list = $product_class_business->index();
        return view('admin.productClass.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productClass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductClass $request, ProductClassBusiness $product_class_business)
    {
        $store_data = $request->only([
            'name'
        ]);
        $res = $product_class_business->store($store_data);
        if (empty($res)){
            \Toastr::error('新增失败');
        }else{
            \Toastr::success('新增成功');
        }
        return redirect()->route('product-class.index');
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
    public function edit($id = 0, ProductClassBusiness $product_class_business)
    {
        $info = $product_class_business->show($id);
        return view('admin.productClass.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductClass $request, $id = 0, ProductClassBusiness $product_class_business)
    {
        $update_data = $request->only([
            'name', 'sort', 'status'
        ]);
        $res = $product_class_business->update($id, $update_data);
        if (empty($res)){
            \Toastr::error('更新失败');
        }else{
            \Toastr::success('更新成功');
        }
        return redirect()->route('product-class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0, ProductClassBusiness $product_class_business)
    {
        $res = $product_class_business->destroy($id);
        if (empty($res)) {
            \Toastr::error('删除失败');
        } else {
            \Toastr::success('删除成功');
        }
        return redirect()->route('product-class.index');
    }
}
