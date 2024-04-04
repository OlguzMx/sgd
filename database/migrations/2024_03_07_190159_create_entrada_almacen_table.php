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
        Schema::create('entrada_almacen', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Quien recibe el documento (Ej: Empleados de AR-SITE INTEGRADORES S.A DE C.V)
            $table->foreignId('documentos_id')->constrained('documentos')->onDelete('cascade'); //Muestra el documento
            $table->string('name_cliente'); //Quien entrega (Mostrará el nombre)
            $table->string('puesto_cliente'); //Quien entrega (Mostrará el puesto del cliente)
            $table->string('empresa_cliente'); //Muestra el nombre empresa/institucion que pertenece
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrada_almacen');
    }
};
