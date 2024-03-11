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
            $table->string('name'); //Ej: Westcon Mexico, S.A. de C.V 
            $table->string('direccion'); //Ej: Av. Insurgentes Sur 730 Piso 11Col. Del Valle, Del. Benito Juárez, C.P. 03100 Ciudad de México.
            $table->string('name_contacto'); //Ej: Carlos Ruiz
            $table->string('telefono'); //Ej: 99 22 00 12 42
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
