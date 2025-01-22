<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Support\Facades\Auth;
use App\Models\Experiencia;
use App\Models\Ciudad;
use App\Models\Imagen;
use Illuminate\Http\Request;
use App\Models\Actividad;
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

        // $request->validate([
        //     'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar el tipo y tamaño de la imagen
        // ]);

        $ciudadExistente = Ciudad::where('ciudad', $request->ciudad)
            ->where('pais_id', $request->pais_id)
            ->first();

        // Verifico si ya existe una ciudad en ese pais en la BD

        $ciudad = Ciudad::firstOrCreate(
            ['ciudad' => $request->ciudad, 'pais_id' => $request->pais_id],
            ['ciudad' => $request->ciudad, 'pais_id' => $request->pais_id]
        );

        $user = Auth::user();

        // // Obtener el archivo
        // $image = $request->file('image');

        // Crear el nombre único para la imagen
        $imageName = time() . '.' . $request->image->extension(); 

        // Crear una carpeta con el ID del usuario autenticado
        $userId = Auth::id(); // Asegúrate de que el usuario esté autenticado
        $folderPath = "public/images/providers/".$userId;
        $folderUri = "images/providers/".$userId;


        $request->image->storeAs($folderPath, $imageName);




        // // Crear la carpeta si no existe
        // if (!file_exists($folderPath)) {
        //     mkdir($folderPath, 0755, true);
        // }

        // // Mover la imagen a la carpeta del usuario
        // $image->move($folderPath, $imageName);

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

        Imagen::create([
            'ruta' => $folderUri."/".$imageName,
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
