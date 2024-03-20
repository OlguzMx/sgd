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
        Schema::create('detalles_orden_de_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orden_de_compras_id')->constrained('orden_de_compras')->onDelete('cascade');
            $table->integer('cantidad');
            $table->string('num_de_parte');
            $table->text('descripcion');
            $table->decimal('precio_unitario', 10,2); // Campo para almacenar precio unitario de cada unidad
            $table->decimal('importe', 10,2); //Campo para almacenar el importe de las unidades
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_orden_de_compras');
    }
};
