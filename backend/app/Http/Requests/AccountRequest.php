<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => 'required|string|max:20',
            'roll' => 'required|integer',
            'password' => 'required|string|max:25',
            'avatar' => 'required|string|max:255',
            'Userid' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'Cần nhập nickname',
            'nickname.string' => 'Nickname phải là chuỗi',
            'nickname.max' => 'nockname tối đa 20 ký tự',
            'roll.required' => 'Cần nhập roll',
            'roll.integer' => 'Cần nhập số nguyên',
            'password.required' => 'El campo password es obligatorio',
            'password.string' => 'El campo password debe ser una cadena de texto',
            'password.max' => 'El campo password debe tener un máximo de 255 caracteres',
            'avatar.required' => 'El campo avatar es obligatorio',
            'avatar.string' => 'El campo avatar debe ser una cadena de texto',
            'avatar.max' => 'El campo avatar debe tener un máximo de 255 caracteres',
            'Userid.required' => 'El campo Userid es obligatorio',
            'Userid.integer' => 'El campo Userid debe ser un número entero',
        ];
    }
}
