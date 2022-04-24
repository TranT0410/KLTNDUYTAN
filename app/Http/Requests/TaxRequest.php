<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxRequest extends FormRequest
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
            'name' => 'required|taxations:unique',
            'rate_tax' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'supplier_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên loại thuế không được để trống',
            'name.unique' => 'Tên loại thuế là duy nhất',
            'rate_tax' => 'Phần trăm thuế không được để trống',
            'date_start.required' => 'Ngày bắt đầu không được để trống',
            'date_end.required' => 'Ngày kết thúc không được để trống',
            'supplier_id' => 'Nhà Cung Cấp Không được để trống',
        ];
    }
}