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
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade');
            $table->integer('cantidad');
            $table->string('unidad');
            $table->string('num_de_parte');
            $table->text('descripcion');
            $table->decimal('precio_unitario', 10, 2); // Campo para almacenar precio unitario de cada unidad
            $table->decimal('importe', 10, 2); //Campo para almacenar el importe de las unidades
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
