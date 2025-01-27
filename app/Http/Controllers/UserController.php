<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Reserva;
use App\Models\Pais;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function viewClientProfile($menu)
    {
        $user = Auth::user();

        $reservas = Reserva::join('exp_fechas', 'exp_fechas.id', '=', 'reservas.exp_fecha_id') // unir tabla exp_fechas y reservas por id
            ->where('reservas.user_id', $user->id)  // Filtrar por el cliente
            ->orderBy('exp_fechas.fecha', 'asc')  // Ordenar por la fecha de la tabla 'exp_fechas'
            ->get();

        return view('profiles.client-profile', compact('reservas', 'menu'));
    }

    public function storeReserve(Request $request)
    {
        $user = Auth::user();

        Reserva::create([

            'adultos' => $request->adultos,
            'menores' => $request->menores,
            'experiencia_id' => Crypt::decryptString($request->experiencia_id),
            'exp_fecha_id' => $request->exp_fecha_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('client.profile', 'reserves');
    }
}
