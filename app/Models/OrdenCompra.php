<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table = 'orden_de_compras';

    use HasFactory;

    protected $fillable = [
        'fecha',
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

    public function detalles_orden_compra() {
        
        return $this->hasMany(DetallesOrdenCompra::class, 'orden_de_compras_id', 'id');
    }
}
