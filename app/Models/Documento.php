<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{

    protected $fillable = [
        'titulo',
        'tipo_documento_id',
        'users_id',
        'clientes_id',
    ];

    use HasFactory;

    // RELACIÓN UNO A MUCHOS (INVERSA)
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipos_documentos_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id', 'id');
    }
}
