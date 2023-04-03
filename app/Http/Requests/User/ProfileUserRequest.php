<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class ProfileUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users,email,' . $this->id . ',id',
            'fullname' => 'required',
            'phone_number' => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'phone_number'=>'Số điện thoại',
            'fullname' => 'họ và tên',
        ];
    }
}
