<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Pais::create([
            'id'=>1,
            'pais'=> 'España',
        ]);

        Pais::create([
            'id'=>2,
            'pais'=> 'Alemania',
        ]);

        Pais::create([
            'id'=>3,
            'pais'=> 'Peru',
        ]);
    }
}
