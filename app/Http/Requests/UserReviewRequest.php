<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserReviewRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:30'],
            'no_telp' => ['required', 'numeric', 'min:6'],
            'comments' => ['required'],
            'star_rating' => ['required', 'numeric'],
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Sialakan isi kolom nama',
            'name.min' => 'Panjang minimal nama adalah 3 karater',
            'no_telp.required' => 'Silakan isi kolom No.Telepon!',
            'no_telp.numeric' => 'Kolom No.Telepon harus angka!',
            'no_telp.min' => 'Minimal No.Telepon adalah 6 angka',
            'star_rating.required' => 'Silakan pilih banyak nya bintang!',
            'star_rating.numeric' => 'Silakan pilih bintang dari 1-5 saja!',
        ];
    }
}
