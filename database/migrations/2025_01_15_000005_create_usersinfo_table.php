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
        Schema::create('usersinfo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable();  // Clave foránea para usuarios
            $table->unsignedBigInteger('proveedor_id')->nullable();  // Clave foránea para proveedores
            $table->unsignedBigInteger('ciudad_id')->nullable();  // Ciudad de residencia
            $table->string('telefono');
            $table->string('email');
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('set null');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersinfo');
    }
};
