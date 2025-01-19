<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Experiencia;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){

        $experiencias = Experiencia::all();
        return View('landing', compact('experiencias'));

    }

    public function viewProviderProfile($menu)
    {

        $user = Auth::user();

        $experiencias = $user->experiencia;

        return view('provider.prov-profile', compact('experiencias', 'menu'));
    }

    public function viewClientProfile($menu)
    {

        $user = Auth::user();

        $reservas = $user->reserva;
        return view('client.client-profile', compact('reservas', 'menu'));
    }


}
