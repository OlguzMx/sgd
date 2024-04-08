<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table = 'orden_de_compra';

    use HasFactory;

    protected $fillable = [
        'fecha',
        'clientes_id',
        'empresas_id',
        'proveedores_id',
        'documentos_id',
        'num_orden_compra',
        'nombre_proyecto',
        'tiempo_entrega',
        'moneda',
        'subtotal',
        'iva',
        'total'
    ];
}
