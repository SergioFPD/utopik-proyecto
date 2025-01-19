<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function createExperience($request)
    {
        Experiencia::create($request->all());

        $experiencias = Experiencia::all();

        return redirect()->route('landing', compact('experiencias'));
    }
}
