<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResertPasswordRequest extends FormRequest
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
            'token' => 'required',
            'password' => 'required|string|min:6',
            'oldPassword' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'token.required' => '* Укажите имя',
            'password.required' => '* Укажите пароль',
            'password.min' => '* Пароль не может быть меньше 6 символов',
        ];
    }
}
