<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesCotizacion extends Model
{
    use HasFactory;

    protected $table = 'detalles_cotizacion';

    protected $fillable = [
        'cantidad',
        'unidad',
        'num_de_parte',
        'descripcion',
        'precio_unitario',
        'importe',
        'cotizacion_id',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class);
    }
}
