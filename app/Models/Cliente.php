<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'puesto',
        'num_cel',
        'num_fijo',
        'extension',
        'empresas_id',
    ];    

    public function REL_empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }

    // RELACIÓN UNO A MUCHOS
    public function documentos()
    {
        return $this->hasMany(Documento::class, 'clientes_id', 'id');
    }
}
