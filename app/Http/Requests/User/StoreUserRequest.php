<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6',
            'role_id'  => 'required',
            'email' => 'required|unique:users'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tên tài khoản',
            'fullname' => 'Họ và tên',
            'phone_number' => 'số điện thoại',
            'password' => 'Mật khẩu',
            'role_id'   => 'Nhóm quyền',
            'email'=> 'email'
        ];
    }
}
