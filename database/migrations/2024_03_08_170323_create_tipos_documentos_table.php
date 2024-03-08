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
        Schema::create('tipos_documentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remision_campos_id')->constrained('remision')->onDelete('cascade');
            $table->foreignId('garantias_cambios_campos_id')->constrained('garantias_cambios')->onDelete('cascade');
            $table->foreignId('orden_de_compras_campos_id')->constrained('orden_de_compras')->onDelete('cascade');
            $table->foreignId('cotizacion_campos_id')->constrained('cotizacion')->onDelete('cascade');
            $table->foreignId('entrada_almacen_campos_id')->constrained('entrada_almacen')->onDelete('cascade');
            $table->foreignId('salida_almacen_campos_id')->constrained('salida_almacen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_documentos');
    }
};
