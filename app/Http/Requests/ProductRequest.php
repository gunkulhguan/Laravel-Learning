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
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'picture' => 'mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรอกชื่อสินค้า',
            'price.required' => 'กรอกราคา',
            'price.numeric' => 'ราคาต้องเป็นตัวเลขเท่านั้น',
            'category_id.required' => 'เลือกประเภทสินค้า',
            'picture.mimes' => 'ไฟล์ต้องเป็น jpg jpeg png เท่านั้น'
        ];
    }
}
