<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Pais;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{

    public function viewProfile($menu)
    {
        $usuarios = User::all();
        return view('profiles.admin-profile', compact('usuarios', 'menu'));
    }

    public function createUser(UserRequest $request)
    {
        User::create($request->all());

        $tipo = $request->rol;

        return redirect()->back()->with('success', __('alerts.user_type_created', ['name' => $request->nombre, 'type' => $tipo]));
    }

    public function updateUser(Request $request, $user_id)
    {

        $user = User::find(Crypt::decryptString($user_id));

        $user->rol = $request->rol;
        $user->bloqueado = $request->bloqueado;
        $user->save();
        return redirect()->route('admin.profile', 'users')->with('success', __('alerts.user_updated', ['name' => $user->nombre]));
    }

    public function updateProvider(Request $request, $provider_id)
    {
        $user = User::find(Crypt::decryptString($provider_id));

        $user->bloqueado = $request->bloqueado;
        $user->save();
        return redirect()->route('admin.profile', 'providers')->with('success', __('alerts.user_updated', ['name' => $user->nombre]));
    }

    public function deleteUser($user_id)
    {

        $user = User::find(Crypt::decryptString($user_id));

        $user->delete();
        return redirect()->back()->with('success', __('alerts.user_deleted', ['name' => $user->nombre]));
    }

    public function storeCountry(Request $request)
    {


        Pais::create($request->all());

        return redirect()->back()->with('success', __('alerts.country_created', ['name' => $request->pais]));
    }
}
