<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'seo_title' => 'required|max:100',
            'seo_description' => 'required',
            'contact_address' => 'required|max:255',
            'logo' => 'required|max:256',
            'favicon' => 'required|max:256',
        ];
    }

    public function attributes(): array
    {
        return [
            'seo_title' => 'tiêu đề',
            'seo_description' => 'mô tả',
            'contact_address' => 'địa chỉ',
            'logo' => 'logo',
            'favicon' => 'favicon'
        ];
    }
}
