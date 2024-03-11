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
            $table->string('name'); //Captura el nombre de documento
            $table->date('fecha');
            $table->string('cantidad');
            $table->string('marca');
            $table->string('modelo');
            $table->string('num_de_serie');
            $table->text('descripcion');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // Quien recibe el documento (Ej: Empleados de AR-SITE INTEGRADORES S.A DE C.V)
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
