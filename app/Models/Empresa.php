<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'direccion',
        'ubicacion',
        'codigo_postal'
    ];
    
    public function REL_cliente()
    {
        return $this->hasMany(Cliente::class);
    }

    public function documento()
    {
        return $this->hasMany(Documento::class);
    }


}
