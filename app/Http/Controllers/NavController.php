<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function index()
    {
        $experiencias = Experiencia::all();
        return View('landing', compact('experiencias'));
    }

    public function viewDetail($nombre)
    {
        $experiencia = Experiencia::firstWhere('nombre', $nombre);


        if ($experiencia == null || ($experiencia->vip && ((Auth::check() && !Auth::user()->vip) || !Auth::check()))) {
            return redirect()->route('landing');
        } else {
            return View('detail', compact('experiencia'));
        }
    }
}
