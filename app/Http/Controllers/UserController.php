<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $usuario = User::find(1);
        $usuario2 = User::find(2);
        return View('index', compact('usuario', 'usuario2'));

    }

    public function registerUser(RegistrationRequest $request)
    {

        $v = Validator::make([], []);
        $v->getMessageBag()->add('form', 'some_translated_error_key');

        User::create($request->all());
        return redirect()->route('landing');

    }
}
