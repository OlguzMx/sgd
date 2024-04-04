<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarantiaCambio extends Model
{

    protected $table = 'garantias_cambios'; //Nombre de la tabla

    use HasFactory;

    protected $fillable = [
        'fecha',
        'clientes_id',
        'empresas_id',
        'users_id',
        'documentos_id'
    ];

    // TODO SOBRE DOCUMETOS 
    
    // Documento pertenece a remisión
    public function documento() {
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
    public function detalles_garantia_cambio() {
        
        return $this->hasMany(DetallesGarantiaCambio::class, 'garantias_cambios_id', 'id');
    }
}
