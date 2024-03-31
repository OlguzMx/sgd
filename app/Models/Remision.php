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
        'empresas_id',
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
    public function detalles_remision() {
        
        return $this->hasMany(DetallesRemision::class);
    }
}
