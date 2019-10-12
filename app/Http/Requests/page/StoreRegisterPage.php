<?php

namespace App\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterPage extends FormRequest
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
            'name'=>'required|min:3|max:100|unique:users,fullname',
           'pass'=>'required|min:6|max:10',
           'passAgain'=>'required|same:pass',
           'birthday'=>'required',
           'email'=>'required|email|unique:users,email', 
           'phone'=>'numeric|required',
           'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
