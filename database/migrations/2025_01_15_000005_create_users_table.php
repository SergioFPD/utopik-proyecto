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
            $table->string('nombre');  // Nombre
            $table->string('email');  // email
            $table->string('imagen')->nullable();  // Imagen de usuario (opcional, puede ser nulo)
            $table->boolean('vip')->default(false);  // Campo 'vip', por defecto es false
            $table->boolean('bloqueado')->default(false);  // Campo 'bloqueado', por defecto es false
            $table->enum('rol', ['admin', 'cliente', 'proveedor'])->default('cliente');  // Campo 'rol', puede ser 'admin' o 'cliente'
            $table->unsignedBigInteger('ciudad_id')->nullable();  // Ciudad de residencia
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación de correo electrónico
            $table->rememberToken(); // Token de "recordarme"
            $table->timestamps();  // Crea las columnas 'created_at' y 'updated_at'
 
            // Definir las claves foráneas
            // $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('set null');


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
