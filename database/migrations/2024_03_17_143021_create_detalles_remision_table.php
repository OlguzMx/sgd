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
        Schema::create('detalles_remision', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remision_id')->constrained('remision')->onDelete('cascade');
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
        Schema::dropIfExists('detalles_remision');
    }
};
