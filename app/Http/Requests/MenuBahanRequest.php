<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuBahanRequest extends FormRequest
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
            'select_menu' => ['numeric', 'required'],
            'bahans' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'select_menu.required' => 'Silakan pilih menu dahulu!',
            'select_menu.numeric' => 'Silakan pilih opsi menu yang valid',
        ];

    }
}
