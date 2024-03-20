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
        Schema::create('garantias_cambios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Muestra el nombre, puesto y departamento del cliente
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); // Muestra el nombre y ubicación de la empresa
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garantias_cambios');
    }
};
