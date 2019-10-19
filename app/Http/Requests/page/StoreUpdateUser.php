<?php

namespace App\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUpdateUser extends FormRequest
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
        $id = Auth::user()->id;
        return [
            'name'=>'required|min:3|max:100|unique:users,fullname,'.$id,
           'birthday'=>'required',
           'email'=>'required|email|unique:users,email,'.$id, 
           'phone'=>'numeric|required',
           'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
