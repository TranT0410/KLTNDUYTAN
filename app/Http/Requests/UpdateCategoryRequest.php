<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.max' => 'Tên danh mục không được quá :max ký tự!',
            'image.image' => 'Image phải là hình ảnh',
        ];
    }
}