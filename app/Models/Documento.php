<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Remision;

class Documento extends Model
{

    protected $fillable = [
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

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }

    // SOLO RELACIONES SOBRE DOCUMENTOS

    // Un tipo pertenece a Documento
    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    // Relación uno a uno
    public function remision()
    {
        return $this->hasOne(Remision::class, 'documentos_id', 'id');
    }

    public function garantia_cambio()
    {
        return $this->hasOne(GarantiaCambio::class, 'documentos_id', 'id');
    }

    public function detalles_garantia_cambio()
    {
        return $this->belongsTo(DetallesGarantiaCambio::class, 'garantias_cambios_id', 'id');
    }

    public function entrada_almacen()
    {
        return $this->hasOne(EntradaAlmacen::class, 'documentos_id', 'id');
    }

    public function salida_almacen()
    {
        return $this->hasOne(SalidaAlmacen::class, 'documentos_id', 'id');
    }

    public function orden_compra()
    {
        return $this->hasOne(OrdenCompra::class, 'documentos_id', 'id');
    }

    public function cotizacion()
    {
        return $this->hasOne(Cotizacion::class, 'documentos_id', 'id');
    }

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'documentos_id', 'id');
    }
}
