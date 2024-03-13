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
        Schema::create('remision', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); //Muestra el nombre del cliente
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); //Muestra el nombre de la empresa
            $table->integer('cantidad');
            $table->string('unidad');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remision');
    }
};
