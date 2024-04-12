<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaAlmacen extends Model
{
    protected $table = 'salida_almacen'; //Nombre de la tabla

    use HasFactory;

    protected $fillable = [
        'fecha',
        'users_id',
        'documentos_id',
        'name_cliente',
        'puesto_cliente',
        'empresa_cliente',
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

    public function detalles_salida_almacen()
    {
        return $this->hasMany(DetallesSalidaAlmacen::class, 'salida_almacen_id', 'id');
    }
}
