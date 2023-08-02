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
            'email' => ['required', 'email'],
            'comments' => ['required'],
            'star_rating' => ['required', 'numeric'],
        ];
    }

    public function message()
    {
        return [
            'name.min' => 'Panjang minimal nama adalah 3 karater',
            'email.email' => 'Masukan format email yang valid!',
            'star_rating.required' => 'Silakan pilih banyak nya bintang!',
            'star_rating.numeric' => 'Silakan pilih bintang dari 1-5 saja!',
        ];
    }
}
