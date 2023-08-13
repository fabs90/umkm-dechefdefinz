<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBahanBakuRequest extends FormRequest
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
            'harga_baru' => 'required | numeric | min:0',

        ];
    }

    public function messages()
    {
        return [
            'harga_baru.required' => 'Silakan isi harga dahulu!',
            'harga_baru.numeric' => 'Silakan isi angka saja!',
            'harga_baru.min' => 'Minimal harga adalah 0',
        ];
    }
}
