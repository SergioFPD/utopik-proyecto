<?php

namespace Database\Seeders;

use App\Models\Exp_fecha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exp_fecha::create([
            'id'=>1,
            'fecha'=> Carbon::create(2025, 1, 10),
            'experiencia_id'=>1,
        ]);

        Exp_fecha::create([
            'id'=>2,
            'fecha'=> Carbon::create(2025, 2, 9),
            'experiencia_id'=>1,
        ]);

        Exp_fecha::create([
            'id'=>3,
            'fecha'=> Carbon::create(2025, 12, 8),
            'experiencia_id'=>1,
        ]);

        Exp_fecha::create([
            'id'=>4,
            'fecha'=> Carbon::create(2025, 24, 1),
            'experiencia_id'=>1,
        ]);
    }
}
