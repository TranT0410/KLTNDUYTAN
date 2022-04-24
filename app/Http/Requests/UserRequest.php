<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'email' => 'required|max:255|unique:users|email|max:255',
            'password' => [
                'required',
                'max:100',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'confirmPassword' => 'required|same:password',
            'phone' => 'required|max:10',
            'address' => 'required|max:255',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.max' => 'Tên người dùng không được quá :max kí tự',
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không được quá :max kí tự',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Phone không được để trống',
            'phone.max' => 'Phone không được quá :max kí tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.numbers'         => 'Mật khẩu phải chứa 1 chữ cái thường và 1 chữ cái hoa',
            'password.min' => 'Mật khẩu không được nhỏ hơn :min kí tự',
            'password.regex' => 'Mật khẩu có ít nhất 1 chữ hoa,chữ thường,không có kí tự đặc biệt',
            'confirmPassword.required' => 'Mật khẩu xác nhận không được để trống',
            'confirmPassword.same' => 'Mật khẩu xác nhận không trùng khớp',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá :max ký tự',
        ];
    }
}