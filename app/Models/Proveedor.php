<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    use HasFactory;

    protected $fillable = [
        'name',
        'direccion',
        'name_contacto',
        'telefono'
    ];

    public function documento()
    {
        return $this->hasMany(Documento::class);
    }
}
