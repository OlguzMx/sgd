<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizacion';

    protected $fillable = [
        'fecha',
        'folio',
        'clientes_id',
        'empresas_id',
        'documentos_id',
        'subtotal',
        'iva',
        'total'
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detalles_cotizacion()
    {
        return $this->hasMany(DetallesCotizacion::class, 'cotizacion_id', 'id');
    }

}
