<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;


use Illuminate\Foundation\Http\FormRequest;

class ForgetRequest extends FormRequest
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
            'email' => 'required',
            'passwordNew' => [
                'required',
                'max:100',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'confirmPassword' => 'required|same:passwordNew',
            //
        ];
    }
    public function messages()
    {

        return [
            'email.required' => 'Email không được để trống',
            'passwordNew.required' => 'Mật khẩu mới không được để trống',
            'passwordNew.numbers'         => 'Mật khẩu phải chứa 1 chữ cái thường và 1 chữ cái hoa',
            'passwordNew.min' => 'Mật khẩu không được nhỏ hơn :min kí tự',
            'passwordNew.regex' => 'Mật khẩu có ít nhất 1 chữ hoa,chữ thường,không có kí tự đặc biệt',
            'confirmPassword.required' => 'Mật khẩu xác nhận không được để trống',
            'confirmPassword.same' => 'Mật khẩu xác nhận không trùng khớp',
        ];
    }
}