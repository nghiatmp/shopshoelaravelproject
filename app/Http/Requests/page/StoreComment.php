<?php

namespace App\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'name'      =>'required|min:2',
            'comment'   =>'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'name.min'      => 'Tên bạn phải dài hơn 2 kí tự',

            'comment.required' => 'Vui lòng nhập bình luận',
            'comment.min'      => 'Bình luận của bạn phải dài hơn 6 kí tự',
        ];
        
    }
}
