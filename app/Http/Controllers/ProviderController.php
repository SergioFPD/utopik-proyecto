<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Support\Facades\Auth;
use App\Models\Experiencia;
use App\Models\Ciudad;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Exp_fecha;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class ProviderController extends Controller
{
    public function viewProviderProfile($menu)
    {

        $user = Auth::user();

        $experiencias = $user->experiencia;
        $paises = Pais::all();

        return view('provider.prov-profile', compact('experiencias', 'menu', 'paises'));
    }

    public function createExperience(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validar el tipo y tamaño de la imagen
            'fechas' => 'required|array|different:null',
            'fechas.*' => 'required|string'
        ]);

        if ($validator->fails()) {
            // Especifica un nombre de error para abrir el formulario modal correspondiente
            $validator->errors()->add('modal-new-experience', 'Error in this modal form');
            // Llamamos a la excepción de validación para que Laravel maneje el error
            throw new ValidationException($validator);
        }

        // Verifico si ya existe una ciudad en ese pais en la BD
        $ciudad = Ciudad::firstOrCreate(
            ['ciudad' => $request->ciudad, 'pais_id' => $request->pais_id],
            ['ciudad' => $request->ciudad, 'pais_id' => $request->pais_id]
        );

        $user = Auth::user();

        // Crear el nombre único para la imagen
        $imageName = time() . '.' . $request->image->extension();

        // Crear una carpeta con el ID del usuario autenticado
        $folderPath = "public/images/providers/" . $user->id;
        $folderUri = "images/providers/" . $user->id; // Se guardará como ruta de la imagen


        $request->image->storeAs($folderPath, $imageName);

        $experiencia = Experiencia::create([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'vip' => $request->vip,
            'activa' => $request->activa,
            'duracion' => $request->duracion,
            'precio_adulto' => $request->precio_adulto,
            'precio_nino' => $request->precio_nino,
            'ciudad_id' => $ciudad->id,
            'user_id' => $user->id,
        ]);

        // Guardar las fechas asociadas, primero pasamos el string recibido, que 
        // poralgun error no es un array de php
        $arrayFechas = json_decode($request->fechas[0], true);
        foreach ($arrayFechas as $fecha) {
            Exp_fecha::create([
                'experiencia_id' => $experiencia->id,
                'fecha' => $fecha,
            ]);
        }

        Imagen::create([
            'ruta' => $folderUri . "/" . $imageName,
            'experiencia_id' => $experiencia->id,

        ]);

        return redirect()->route('provider.profile', 'experiences');
    }

    public function createActivity(Request $request)
    {

        // Validaciones de campos, si alguno falla se muestra en formulario
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|min:5',
            'descripcion' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            // Especifica un nombre de error para abrir el formulario modal correspondiente
            $validator->errors()->add('modal-new-activity', 'Error in this modal form');
            // Llamamos a la excepción de validación para que Laravel maneje el error
            throw new ValidationException($validator);
        }



        $experiencia = Experiencia::find(Crypt::decryptString($request->experiencia_id));

        $experiencia->actividad()->create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'dia' => $request->dia,

        ]);

        return redirect()->back();
    }
}
