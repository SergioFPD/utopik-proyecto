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

    // Todas las vistas tendrán la variable paises para el menu
    // a traves del AppServiceProvider de Providers
    public function home()
    {

        $experiencias = Experiencia::all();
        return View('home', compact('experiencias'));
    }

    public function providerLogin()
    {
        return View('provider-login');
    }

    public function country($country)
    {
        $experiencias = Experiencia::all();
        $paisElegido = Pais::firstWhere('pais', $country);
        if($country == 'World'){
            $experienciasPais = Experiencia::all();
        }else{

            $experienciasPais = Experiencia::whereHas('ciudad.pais', function ($query) use ($country){
                $query->where('pais', $country); // Filtrar por el país
            })->get();
    
        }
       
        return View('experiences-by-country', compact('experiencias', 'experienciasPais', 'paisElegido'));
    }

    public function viewDetail($nombre)
    {
        $experiencias = Experiencia::all();
        $experiencia = Experiencia::firstWhere('nombre', $nombre);

        if ($experiencia == null || ($experiencia->vip && ((Auth::check() && (!Auth::user()->vip && Auth::user()->rol != 'admin')) || !Auth::check()))) {
            return redirect()->route('home');
        } else {
            return View('experience-detail', compact('experiencia', 'experiencias'));
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
