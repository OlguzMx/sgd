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
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('folio');
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Muestra el nombre y puesto
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); // Muestra el nombre, direccion y ubicacion (ciudad y estado, ej: Villahermosa, Tabasco)
            $table->foreignId('documentos_id')->constrained('documentos')->onDelete('cascade'); //Muestra el documento
            $table->decimal('subtotal', 10, 2); // Campo para almacenar el subtotal del importe de cada unidad
            $table->decimal('iva', 10, 2); // Campo para almacenar el IVA del subtotal
            $table->decimal('total', 10, 2); // Campo para almacenar el total (incluye subtotal e IVA)            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion');
    }
};
