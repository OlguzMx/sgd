<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesSalidaAlmacen extends Model
{
    protected $table = 'detalles_salida_almacen';
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'marca',
        'modelo',
        'num_de_parte',
        'descripcion',
        'salida_almacen_id'
    ];
    
    // Todo sobre documentos

    public function salida_almacen()
    {
        return $this->belongsTo(SalidaAlmacen::class);
    }
}
