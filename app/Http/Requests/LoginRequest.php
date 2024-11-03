<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        // Tüm kullanıcıların bu isteği yapmasına izin ver
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'E-posta adresi gereklidir.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'password.required' => 'Şifre gereklidir.',
            'password.min' => 'Şifre en az 8 karakter olmalıdır.',
        ];
    }
}