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
        Schema::create('detalles_entrada_almacen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrada_almacen_id')->constrained('entrada_almacen')->onDelete('cascade');
            $table->string('cantidad');
            $table->string('marca');
            $table->string('modelo');
            $table->string('num_de_parte');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_entrada_almacen');
    }
};
