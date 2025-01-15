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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('user')->unique();  // Campo 'user', único para cada proveedor
            $table->string('password');  // Campo 'password', para la contraseña
            $table->string('nombreempresa');  // Nombre de la empresa
            $table->string('logo')->nullable();  // Logo de la empresa (opcional, puede ser nulo)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
