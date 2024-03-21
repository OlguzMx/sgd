<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesRemision extends Model
{
    protected $table = 'detalles_remision';

    protected $fillable = [
        'remision_id',
        'cantidad',
        'unidad',
        'descripcion'
    ];

    use HasFactory;

    // Todo sobre documentos
    public function remision() {
        return $this->belongsTo(Remision::class);
    }
}
