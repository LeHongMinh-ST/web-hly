<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required',
            'content' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'content' => 'Nội dung trả lời',
            'name' => 'Họ và tên',
            'subject' => 'Chủ đề câu hỏi',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thọại'
        ];
    }
}
