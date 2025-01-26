<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pais;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function home()
    {
        $paises = Pais::all();
        $experiencias = Experiencia::all();
        return View('home', compact('experiencias', 'paises'));
    }

    public function country($country)
    {
        $paisElegido = Pais::firstWhere('pais', $country);
        $paises = Pais::all();
        if($country == 'World'){
            $experiencias = Experiencia::all();
        }else{

            $experiencias = Experiencia::whereHas('ciudad.pais', function ($query) use ($country){
                $query->where('pais', $country); // Filtrar por el país
            })->get();
    
        }
       
        return View('experiences', compact('experiencias', 'paises', 'paisElegido'));
    }

    public function viewDetail($nombre)
    {
        $experiencia = Experiencia::firstWhere('nombre', $nombre);
        $paises = Pais::all();

        if ($experiencia == null || ($experiencia->vip && ((Auth::check() && (!Auth::user()->vip && Auth::user()->rol != 'admin')) || !Auth::check()))) {
            return redirect()->route('landing');
        } else {
            return View('detail', compact('experiencia', 'paises'));
        }
    }

    public function formReserve($experiencia_id)
    {

        $experiencia = Experiencia::find(Crypt::decryptString($experiencia_id));

        if (!$experiencia) {
            $experiencia = "error";
        }

        return View('_modals.reserve-form', compact('experiencia'));
    }
}
