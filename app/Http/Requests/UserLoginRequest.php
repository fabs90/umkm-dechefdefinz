<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserLoginRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:5'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'username.min' => 'Panjang minimal username adalah 5',
            'password.min' => 'Panjang minimal password adalah 5',
        ];
    }
}