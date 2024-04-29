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
            $table->date('fecha');
            $table->foreignId('clientes_id')->constrained('clientes')->onDelete('cascade'); // Muestra el nombre, telefono y email
            $table->foreignId('empresas_id')->constrained('empresas')->onDelete('cascade'); // Muestra el nombre, direccion, ubicacion (ciudad y estado, ej: Villahermosa, Tabasco) y código postal 
            $table->foreignId('proveedores_id')->constrained('proveedores')->onDelete('cascade'); // Trae los campos de la tabla proveedores (name, direccion, nombre del contacto y telefono)
            $table->foreignId('documentos_id')->constrained('documentos')->onDelete('cascade'); //Muestra el documento
            $table->string('num_orden_compra');
            $table->string('nombre_proyecto');
            $table->string('name_cliente'); //Ej: AR-SITE INTEGRADORES S.A DE C.V
            $table->string('domicilio'); //Ej: Calle Unión No. 161 Col Escandón 1ra Sección dpto. 22, C.P. 11800 Delegación Miguel Hidalgo, Ciudad de Mexico
            $table->string('ubicacion'); //Ej: Ciudad de México
            $table->string('codigo_postal'); //Ej: 11800
            $table->string('contacto_cliente'); //Ej: ING. PEDRO CARMESÍ
            $table->string('tel_cliente'); //Ej: 9922776655
            $table->string('email_cliente'); //Ej: pcarmesi@gmail.com
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
