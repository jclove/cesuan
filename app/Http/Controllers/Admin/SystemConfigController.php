<?php

namespace App\Http\Controllers\Admin;

use App\Http\Business\SystemConfigBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemConfigController extends Controller
{
    /**
     * @param SystemConfigBusiness $system_config_business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(SystemConfigBusiness $system_config_business)
    {
        $info = $system_config_business->show();
        if ($info && !empty($info->config)){
            $info->config = json_decode($info->config, true);
        }
        return view('admin.system.edit', compact('info'));
    }

    /**
     * @param Request $request
     * @param SystemConfigBusiness $system_config_business
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, SystemConfigBusiness $system_config_business)
    {
        $update_data = $request->only([
            'config'
        ]);
        $update_data['config'] = json_encode($update_data['config']);
        $system_config_business->updateOrCreate($update_data);
        return redirect()->route('admin.system.edit');
    }
}
