<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::truncate();
        User::create([
            'id'=>1,
            'user'=> 'paco11',
            'password'=> '1234',
            'rol'=> 'cliente',
            'nombre'=>'Paco',
            'ciudad_id'=>2
        ]);

        User::create([
            'id'=>2,
            'user'=> 'maria11',
            'password'=> '1234',
            'rol'=> 'proveedor',
            'nombre'=>'Maria',
            'ciudad_id'=>3
        ]);
    }
}
