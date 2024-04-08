<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesEntradaAlmacen extends Model
{
    protected $table = 'detalles_entrada_almacen';

    use HasFactory;
    protected $fillable = [
        'cantidad',
        'marca',
        'modelo',
        'num_de_parte',
        'descripcion',
        'entrada_almacen_id'
    ];

    // Todo sobre documentos

    public function entrada_almacen()
    {
        return $this->belongsTo(EntradaAlmacen::class);
    }
}
