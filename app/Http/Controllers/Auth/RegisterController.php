<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function registerUser(RegistrationRequest $request)
    {

        $user = User::create($request->all());
        // Iniciar sesión automáticamente después del registro
        auth()->login($user);
        return redirect()->route('landing')->with('success', 'Registro realizado');
    }
}
