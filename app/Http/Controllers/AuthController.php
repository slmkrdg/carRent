<?php

namespace App\Http\Controllers;

use Laravel\Passport\HasApiTokens;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HasApiTokens;

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return generateApiMessage(0,0,200,"İşlem başarılı",['token' => Auth::user()->createToken('user')->accessToken]);
        }

        return generateApiMessage(1,1,401,"İşlem başarısız");
    }
}
