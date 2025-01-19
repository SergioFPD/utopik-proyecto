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
        // Crear una nueva experiencia
       Reserva::create([
            'adultos' => '2',
            'nombre' => 'eliminar',
            'exp_fecha_id' => '1',
            'user_id' => '1',
            'experiencia_id' => '1',
        ]);
    }
}
