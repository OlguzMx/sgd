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
        Schema::create('salida_almacen', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('name_cliente'); //Quien recibe (Mostrará el nombre)
            $table->string('puesto_cliente'); //Quien recibe (Mostrará el puesto del cliente)
            $table->string('empresa_cliente'); //Muestra el nombre de la empresa/institucion que pertenece
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Quien entrega el documento (Ej: Empleados de AR-SITE INTEGRADORES S.A DE C.V)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salida_almacen');
    }
};
