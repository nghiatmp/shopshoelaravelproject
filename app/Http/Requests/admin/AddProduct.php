<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AddProduct extends FormRequest
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
            'namepro'=>'required|min:3|max:300|unique:product,name',
            'description'=>'required|min:3|max:100',
            'unitprice'=>'required|numeric',
            'proprice'=>'required|numeric',
            'images' => 'max:2048|required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'namepro.required'  => 'Bạn chưa nhập tên Product',
            'namepro.min'       => 'Tên Product phải dài từ 3 đến 100 ký tự',
            'namepro.max'       => 'Tên Product phải dài từ 3 đến 100 ký tự',
            'namepro.unique'    => 'Tên Product phải là duy nhất',
            'description.required'  => 'Bạn chưa nhập description',
            'description.min'   => 'Description phải dài từ 3 đến 100 ký tự',
            'description.max'   => 'Description phải dài từ 3 đến 100 ký tự',
            'unitprice.required'=> 'Bạn chưa nhập Unit_Price',
            'unitprice.numeric' => 'Unit_Price bánh phải là số',
            'proprice.required' => 'Bạn chưa nhập Promotion_Price',
            'proprice.numeric'  => 'Promotion_Price phải là số',
            'images.max'        => 'Kích thước ảnh quá lớn',
            'images.required'     => 'Bạn chưa chọn ảnh',
        ];
    }
}
