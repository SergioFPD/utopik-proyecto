<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class AdminController extends Controller
{

    public function viewProfile($menu)
    {

        $usuarios = User::all();
        return view('admin.admin-profile', compact('usuarios', 'menu'));
    }

    public function createUser(UserRequest $request)
    {
        User::create($request->all());
        $menu = 'users';
        $tipo = $request->rol;
        if ($tipo == 'proveedor')
            $menu = 'providers';

        return redirect()->route('admin.profile', $menu)->with('success', $tipo . ' ' . $request->nombre . ' creado');
    }

    public function updateUser(Request $request, User $user)
    {

        $user->rol = $request->rol;
        $user->bloqueado = $request->bloqueado;
        $user->save();
        return redirect()->route('admin.profile', 'users')->with('success', 'Usuario ' . $user->nombre . ' actualizado');
    }

    public function deleteUser(User $user)
    {
        $menu = 'users';
        if ($user->rol == 'proveedor')
            $menu = 'proveedor';
        $user->delete();
        return redirect()->route('admin.profile', $menu)->with('success', 'Usuario ' . $user->nombre . ' eliminado');
    }
}
