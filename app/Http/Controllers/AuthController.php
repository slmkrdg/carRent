<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use App\Models\User;

class AuthController extends Controller
{
    use HasApiTokens;

    public function login(Request $request)
    {
        // Giriş için gerekli olan alanları tanımlayın
        $credentials = $request->only('email', 'password');

        // Kullanıcıyı doğrulayın
        if (Auth::attempt($credentials)) {
            // Doğrulandıysa token oluşturun
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json(['token' => $token], 200);
        }

        // Giriş başarısızsa hata döndürün
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
