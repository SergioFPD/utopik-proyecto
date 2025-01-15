<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Ciudad::create([
            'id'=>1,
            'ciudad'=> 'Madrid',
            'pais_id'=>1
        ]);

        Ciudad::create([
            'id'=>2,
            'ciudad'=> 'Valencia',
            'pais_id'=>1
        ]);

        Ciudad::create([
            'id'=>3,
            'ciudad'=> 'Sevilla',
            'pais_id'=>1
        ]);
    }
}
