<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class AdminController extends Controller
{

    public function viewUsers(){

        $usuarios = User::all();
        return view('admin.users', compact('usuarios'));
    }

    public function createUser(UserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users');

    }

    public function updateUser(UserRequest $request, User $user)
    {
        $user->rol = $request->rol;
        $user->bloqueado = $request->bloqueado;
        $user->save();
        return redirect()->route('admin.users');

    }
}
