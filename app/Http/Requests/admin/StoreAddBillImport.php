<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddBillImport extends FormRequest
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
            'supplier'  => 'required',
            'rdoStatus' => 'required',
            'note'      => 'required|min:2|max:255',

        ];
    }
    public function messages()
    {
        return [
            'supplier.required'=>'Xin vui lòng chọn nhà cung cấp',
            'rdoStatus.required'=>'Xin vui lòng chọn hình thức thanh toán',
            "note.required"     => "Xin vui lòng nhập yêu cầu của bạn",
            "note.max"          => "Dòng chú ý của bạn phải nằm trong khoảng 2-255 kí tự",
            "note.min"          => "Dòng chú ý của bạn phải nằm trong khoảng 2-255 kí tự",
        ];
    }

}
