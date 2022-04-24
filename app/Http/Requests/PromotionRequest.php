<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'name' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khuyến mãi không được để trống',
            'date_start.required' => 'Ngày bắt đầu không được để trống',
            'date_end.required' => 'Ngày kết thúc không được để trống'
        ];
    }
}