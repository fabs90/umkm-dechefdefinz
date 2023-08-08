<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kueLoyangRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:100', 'unique:menu_kue,slug'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ];
    }
}
