<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddDetailBill extends FormRequest
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
            'categorty' => 'required',
            'product'   => 'required',
            'size'      => 'required',
            'price'     => 'required|numeric',
            'quantity'  => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'categorty.required'=> 'Xin vui lòng chọn loại sản phẩm',
            'product.required'  => 'Xin vui lòng chọn sản phẩm',
            "size.required"     => "Xin vui lòng chọn size giày tương ứng",
            "price.required"     => "Xin vui lòng nhập giá giày",
            "price.numeric"     => "Xin vui lòng nhập giá giày là số",
            "quantity.required"  => "Xin vui lòng nhập số lượng giày",
            // "quantity.numeric"     => "Xin vui lòng nhập giá giày là số",
           
        ];
    }
}
