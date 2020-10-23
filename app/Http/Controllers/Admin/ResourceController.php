<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\ResourceBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    /**
     * @param Request $request
     * @param ResourceBusiness $resource_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, ResourceBusiness $resource_business)
    {
        $condition = $request->only([]);
        $list = $resource_business->index($condition);
        return view('admin.resource.index', compact('list'));
    }

    public function count(ResourceBusiness $resource_business)
    {
        $total = $resource_business->total();
        return view('admin.resource.count', compact('total'));
    }
}
