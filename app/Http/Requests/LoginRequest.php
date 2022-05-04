<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email đăng nhập không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
            'g-recaptcha-response.required' => 'Vui lòng xác minh rằng bạn không phải là rô bốt',
            'g-recaptcha-response.captcha' => 'Lỗi CAPTCHA! thử lại sau hoặc liên hệ với quản trị viên trang web.',
        ];
    }
}