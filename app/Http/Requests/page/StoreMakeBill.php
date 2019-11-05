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
            "username"  => "required|max:60|min:2",
            "email"     => "required|email",
            "phone"     => "required|numeric",
            "address"   => "required|max:60|min:2",
            "note"      => "required|max:60|min:2",
        ];
    }

    public function messages()
    {
        return [
            'thanhtoan.required' => 'Xin vui lòng chọn hình thức thanh toán',
            "username.required"  => "Xin vui lòng nhập tên của bạn",
            "username.max"       => "Tên của bạn phải nằm trong khoảng 2-60 kí tự",
            "username.min"       => "Tên của bạn phải nằm trong khoảng 2-60 kí tự",
            "email.required"     => "Xin vui lòng nhập email của bạn",
            "email.email"        => "Email của bạn chưa đúng định dạng",
            "phone.required"     => "Vui lòng nhập số điện thoại của bạn",
            "phone.numeric"      =>  "Số điện thoại của bạn chưa đúng định dạng",
            "address.max"       => "Địa chỉ của bạn phải nằm trong khoảng 2-60 kí tự",
            "address.required"  => "Xin vui lòng nhập địa chỉ của bạn",
            "address.min"       => "Địa chỉ bạn phải nằm trong khoảng 2-60 kí tự",
            "note.required"     => "Xin vui lòng nhập yêu cầu của bạn",
            "note.max"          => "Dòng chú ý của bạn phải nằm trong khoảng 2-60 kí tự",
            "note.min"          => "Dòng chú ý của bạn phải nằm trong khoảng 2-60 kí tự",

        ];
    }
}
