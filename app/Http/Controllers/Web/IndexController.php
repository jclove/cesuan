<?php

namespace App\Http\Controllers\Web;

use App\Http\Business\ProductBusiness;
use App\Http\Business\ProductClassBusiness;
use Illuminate\Http\Request;

class IndexController
{
    /**
     * @param ProductClassBusiness $product_class_business
     * @param ProductBusiness $product_business
     */
    public function index(
        Request $request,
        ProductClassBusiness $product_class_business,
        ProductBusiness $product_business
    ){
        $pid = $request->get('pid', 0);
        // 获取分类列表
        $product_class_list = $product_class_business->index([
            'status' => 'yes'
        ]);

        $pid = empty($pid) ? $product_class_list->first()->id : $pid;

        // 获取产品列表
        $product_list = $product_business->index([
            'pid' => $pid,
            'status' => 'yes'
        ]);

        return view('web.index', compact('product_class_list', 'product_list', 'pid'));
    }
}