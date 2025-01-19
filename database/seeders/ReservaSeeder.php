<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Reserva::truncate();
        // Crear una nueva experiencia
       Reserva::create([
            'adultos' => '2',
            'nombre' => 'eliminar1',
            'exp_fecha_id' => '1',
            'user_id' => '2',
            'experiencia_id' => '1',
        ]);

        Reserva::create([
            'adultos' => '4',
            'nombre' => 'eliminar2',
            'exp_fecha_id' => '1',
            'user_id' => '4',
            'experiencia_id' => '1',
        ]);
    }
}
