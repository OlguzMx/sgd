<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remision extends Model
{
    protected $table = 'remision'; //Nombre de la tabla

    use HasFactory;

    protected $fillable = [
        'fecha',
        'clientes_id',
        'empresas_id',
        'cantidad',
        'unidad',
        'descripcion',
    ];

    
    
}
