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
        Schema::create('orden_de_compras', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Captura el nombre de documento
            $table->date('fecha');
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Muestra el nombre, telefono y email
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); // Muestra el nombre, direccion, ubicacion (ciudad y estado, ej: Villahermosa, Tabasco) y código postal 
            $table->foreignId('proveedores_id')->constrained('proveedores')->onDelete('cascade'); // Trae los campos de la tabla proveedores (name, direccion, nombre del contacto y telefono)
            $table->string('num_orden_compra');
            $table->string('nombre_proyecto');
            $table->string('tiempo_entrega'); //Ej: Por confirmar con el mayorista, 1 a 2 semanas
            $table->string('moneda'); //Moneda: USD, MXN
            $table->integer('cantidad');
            $table->string('unidad');
            $table->string('num_de_parte');
            $table->text('descripcion');
            $table->decimal('precio_unitario', 10,2); // Campo para almacenar precio unitario de cada unidad
            $table->decimal('importe', 10,2); //Campo para almacenar el importe de las unidades
            $table->decimal('subtotal', 10,2); // Campo para almacenar el subtotal del importe de cada unidad
            $table->decimal('iva', 10,2); // Campo para almacenar el IVA del subtotal
            $table->decimal('total', 10,2); // Campo para almacenar el total (incluye subtotal e IVA)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_de_compras');
    }
};
