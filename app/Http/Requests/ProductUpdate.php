<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'alias' => 'required',
            'price' => 'required',
            'total_fee' => 'required',
            'desc' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '产品名称不能为空',
            'alias.required' => '简称不能为空',
            'price.required' => '原价不能为空',
            'total_fee.required' => '支付价格不能为空',
            'desc.required' => '描述不能为空',
        ];
    }
}
