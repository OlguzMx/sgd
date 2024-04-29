<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table = 'orden_de_compras';

    use HasFactory;

    protected $fillable = [
        'fecha',
        'clientes_id',
        'empresas_id',
        'proveedores_id',
        'documentos_id',
        'num_orden_compra',
        'nombre_proyecto',
        'name_cliente',
        'domicilio',
        'ubicacion',
        'codigo_postal',
        'contacto_cliente',
        'tel_cliente',
        'email_cliente',
        'subtotal',
        'iva',
        'total'
    ];

    public function documento() {
        return $this->belongsTo(Documento::class);
    }
    
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedores_id', 'id');
    }
    public function detalles_orden_compra() {
        
        return $this->hasMany(DetallesOrdenCompra::class, 'orden_de_compras_id', 'id');
    }
}
