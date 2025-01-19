<?php

namespace Database\Seeders;

use App\Models\Actividad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experiencia;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Crear una nueva experiencia
        $experiencia = Experiencia::create([
            'nombre' => 'Aventura en la montaña',
            'descripcion' => 'Una experiencia única de senderismo y exploración en las montañas.',
            'vip' => '1'
        ]);

        // Crear las 3 actividades asociadas a esta experiencia
        $actividades = [
            ['nombre' => 'Senderismo', 'descripcion' => 'Caminar por los senderos de la montaña'],
            ['nombre' => 'Escalada', 'descripcion' => 'Escalar las paredes rocosas de la montaña'],
            ['nombre' => 'Fotografía de naturaleza', 'descripcion' => 'Capturar la belleza de la naturaleza en la cima de la montaña']
        ];

        // Asociar las actividades a la experiencia
        foreach ($actividades as $actividad) {
            $experiencia->actividad()->create($actividad);
        }

        // Crear una nueva experiencia
        $experiencia = Experiencia::create([
            'nombre' => 'Escapada a la playa',
            'descripcion' => 'Relájate en las mejores playas del Caribe.'
        ]);

        // Crear las 3 actividades asociadas a esta experiencia
        $actividades = [
            ['nombre' => 'barcos', 'descripcion' => 'Ir en barco'],
            ['nombre' => 'Escalada', 'descripcion' => 'Nadar con delfines'],
            ['nombre' => 'Fotografía de naturaleza', 'descripcion' => 'pescar mucho']
        ];

        // Asociar las actividades a la experiencia
        foreach ($actividades as $actividad) {
            $experiencia->actividad()->create($actividad);
        }
    }
}
