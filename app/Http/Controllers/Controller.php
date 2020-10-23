<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * 返回格式化Json数据
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonFormat($data)
    {
        if (is_object($data)) {
            if (method_exists($data, 'toArray')) {
                $data = $data->toArray();
            }

            if (!is_array($data)) {
                $data = (array)$data;
            }
        }

        return response()->json([
            'error_code' => 0,
            'error_msg'  => 'ok',
            'body_data'  => $data
        ], 200, [], 256);
    }
}
