<?php

namespace App\Http\Requests\page;

use Illuminate\Foundation\Http\FormRequest;

class StoreMakeBill extends FormRequest
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
            "thanhtoan" => "required",
            "username"  => "required|max:60|min:5",
            "email"     => "required|email",
            "phone"     => "required|numeric",
            "address"   => "required|max:60|min:5",
            "note"      => "required|max:60|min:5",
        ];
    }
}
