<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesGarantiaCambio extends Model
{
    use HasFactory;
    protected $table = 'detalles_garantias_cambios';

    protected $fillable = [
        'marca_danado',
        'modelo_danado',
        'num_serie_danado',
        'marca_reemplazo',
        'modelo_reemplazo',
        'num_serie_reemplazo',
        'num_inventario',
        'garantias_cambios_id',
    ];

        // Todo sobre documentos
        public function garantia_cambio() {
            return $this->belongsTo(GarantiaCambio::class);
        }
}
