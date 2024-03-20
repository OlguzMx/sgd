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
        Schema::create('detalles_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cotizacion_id')->constrained('cotizacion')->onDelete('cascade'); // Trae los campos de la tabla proveedores (name, direccion, nombre del contacto y telefono)
            $table->integer('cantidad');
            $table->string('unidad');
            $table->string('num_de_parte');
            $table->text('descripcion');
            $table->decimal('precio_unitario', 10, 2); // Campo para almacenar precio unitario de cada unidad
            $table->decimal('importe', 10, 2); //Campo para almacenar el importe de las unidades
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_cotizacion');
    }
};
