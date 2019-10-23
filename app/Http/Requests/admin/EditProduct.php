<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class EditProduct extends FormRequest
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
            'description'=>'required|min:3|max:100',
            'unitprice'=>'required|numeric',
            'proprice'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'description.required'=>'Bạn chưa nhập description',
            'description.min'=>'Description phải dài từ 3 đến 100 ký tự',
            'description.max'=>'Description phải dài từ 3 đến 100 ký tự',
            'unitprice.required'=>'Bạn chưa nhập Unit_Price',
            'unitprice.numeric'=>'Unit_Price  phải là số',
            'proprice.required'=>'Bạn chưa nhập Promotion_Price',
            'proprice.numeric'=>'Promotion_Price  phải là số',
        ];
    }
}
