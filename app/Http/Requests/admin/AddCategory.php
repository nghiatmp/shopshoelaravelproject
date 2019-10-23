<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AddCategory extends FormRequest
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
            'catename'=>'required|min:3|max:300|unique:categories_product,name',
            'description'=>'required|min:3|max:100',
        ];
    }
    public function messages()
    {
        return [
            'catename.required'=>'Bạn chưa nhập tên Category',
            'catename.min'=>'Tên Category phải dài từ 3 đến 100 ký tự',
            'catename.max'=>'Tên Category phải dài từ 3 đến 100 ký tự',
            'catename.unique'=>'Tên Category phải là duy nhất',
            'description.required'=>'Bạn chưa nhập description',
            'description.min'=>'Description phải dài từ 3 đến 100 ký tự',
            'description.max'=>'Description phải dài từ 3 đến 100 ký tự',

        ];
    }
}
