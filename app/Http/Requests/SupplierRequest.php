<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:10',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhà cung cấp không được để trống!',
            'name.max' => 'Tên nhà cung cấp không được quá :max kí tự!',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá :max kí tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được quá :max kí tự',
            'user_id.required' => 'User name không được để trống',
        ];
    }
}