<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Experiencia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){

        $experiencias = Experiencia::all();
        return View('landing', compact('experiencias'));

    }

    public function viewProviderProfile($menu)
    {

        $experiencias = Experiencia::all();
        $reservas = Reserva::all();
        return view('provider.prov-profile', compact('experiencias', 'reservas', 'menu'));
    }

    public function viewClientProfile($menu)
    {

        $reservas = Reserva::all();
        $user = User::find(1);
        return view('client.client-profile', compact('user', 'reservas', 'menu'));
    }

    public function registerUser(RegistrationRequest $request)
    {

        $v = Validator::make([], []);
        $v->getMessageBag()->add('form', 'some_translated_error_key');

        User::create($request->all());
        return redirect()->route('landing')->with('success', 'Registro realizado');

    }
}
