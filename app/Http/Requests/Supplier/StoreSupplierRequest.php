<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên nhà đầu tư',
            'description' => 'Mô tả',
            'thumbnail' => 'Ảnh đại diện'
        ];
    }
}
