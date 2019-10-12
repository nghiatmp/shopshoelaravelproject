<?php

namespace App\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginPage extends FormRequest
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
            'email'=>'required|email',
            'pass'=>'required|min:6|max:10',
        ];
    }
}
