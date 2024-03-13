<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remision extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fecha',
        'clientes_id',
        'empresas_id',
        'cantidad',
        'unidad',
        'descripcion',
    ];


    
}
