<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Şifreyi bcrypt ile şifrele
        ]);

        return generateApiMessage(1,1,200,"İşlem başarılı");
    }
}
