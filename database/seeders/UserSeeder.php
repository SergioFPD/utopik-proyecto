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
            'user'=> 'administra',
            'email' => 'admin@gmail.com',
            'password'=> '1234',
            'rol'=> 'admin',
            'nombre'=>'Luis',
            'ciudad_id'=>2
        ]);
        User::create([
            'id'=>2,
            'user'=> 'paco11',
            'email' => 'paco@gmail.com',
            'password'=> '1234',
            'rol'=> 'cliente',
            'nombre'=>'Paco',
            'ciudad_id'=>2
        ]);

        User::create([
            'id'=>3,
            'user'=> 'maria11',
            'password'=> '1234',
            'email' => 'maria@gmail.com',
            'rol'=> 'proveedor',
            'nombre'=>'Maria',
            'ciudad_id'=>3
        ]);
    }
}
