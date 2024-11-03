<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad alanı gereklidir.',
            'email.required' => 'E-posta alanı gereklidir.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
            'password.required' => 'Şifre alanı gereklidir.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler uyuşmuyor.',
        ];
    }
}
