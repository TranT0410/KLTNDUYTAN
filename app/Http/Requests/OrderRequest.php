<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'receiver' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:10',
            'optradio' => 'required|in:0,1',
            'checkbox' => 'required|in:1'
        ];
    }
    public function messages()
    {
        return [
            'receiver.required' => 'Người nhận không được để trống',
            'receiver.max' => 'Tên người nhận không được quá :max kí tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá :max kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được quá :max kí tự',
            'optradio.required' => 'Vui lòng chọn phương thức thanh toán',
            'checkbox.required' => 'Vui lòng chấp nhận điều khoản dịch vụ'
        ];
    }
}