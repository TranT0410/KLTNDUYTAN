<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'quantity' => 'required',
            'image' => 'image',
            'price' => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.max' => 'Tên sản phẩm không được quá :max ký tự',
            'image.image' => 'Phải là file định dạng hình ảnh',
            'quantity.required' => 'Số lượng không được để trống',
            'price.required' => 'Đơn giá không được để trống',
            'category_id' => 'Danh mục không được để trống'
        ];
    }
}