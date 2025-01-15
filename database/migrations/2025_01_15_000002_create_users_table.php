<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();  // Crea la columna 'id' como clave primaria
            $table->string('user')->unique();  // Campo 'user', único para cada usuario
            $table->string('password');  // Campo 'password' para la contraseña
            $table->boolean('vip')->default(false);  // Campo 'vip', por defecto es false
            $table->boolean('bloqueado')->default(false);  // Campo 'bloqueado', por defecto es false
            $table->enum('rol', ['admin', 'cliente']);  // Campo 'rol', puede ser 'admin' o 'cliente'
            $table->timestamps();  // Crea las columnas 'created_at' y 'updated_at'
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
