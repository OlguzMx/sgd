<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesOrdenCompra extends Model
{
    protected $table = 'detalles_orden_de_compra';

    protected $fillable = [
        'orden_de_compra_id',
        'cantidad',
        'num_de_parte',
        'descripcion',
        'precio_unitario',
        'importe'
    ];
    use HasFactory;

    public function orden_de_compra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }
}
