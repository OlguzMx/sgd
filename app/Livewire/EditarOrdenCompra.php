<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesOrdenCompra;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Documento;
use App\Models\Proveedor;

class EditarOrdenCompra extends Component
{
    public $id; //id del documento
    public $documento; //Hace referencia a la instancia de Documento
    public $clientes; //Hace referencia a la instancia de Clientes
    public $empresas; //Hace referencia a la instancia de Empresas
    public $proveedores; //Hace referencia a la instancia de Proveedores

    //Campos del formulario
    public $fecha;
    public $clientes_id;
    public $users_id;
    public $empresas_id;
    public $proveedores_id;
    public $num_orden_compra;
    public $nombre_proyecto;
    public $tiempo_entrega;
    public $moneda;
    public $subtotal;
    public $iva;
    public $total;

    public $detalles;
    public $new_detalles;

    public function mount($id)
    {
        $this->id = $id;
        $this->documento = Documento::find($id); //Realizamos la búsqueda del documento por medio del id
        // Colección de modelos (Mostrar todo en la vista)
        $this->clientes = Cliente::all();
        $this->empresas = Empresa::all();
        $this->proveedores = Proveedor::all();

        // Sincronizamos los datos de la base de datos con el formulario de edit-garantia-cambios
        $this->fecha = $this->documento->orden_compra->fecha;
        $this->clientes_id = $this->documento->clientes_id;
        $this->empresas_id = $this->documento->orden_compra->empresas_id;
        $this->proveedores_id =  $this->documento->proveedores_id;
        $this->num_orden_compra = $this->documento->num_orden_compra;
        $this->nombre_proyecto = $this->documento->nombre_proyecto;
        $this->tiempo_entrega = $this->documento->tiempo_entrega;
        $this->moneda = $this->documento->moneda;
        $this->subtotal = $this->documento->subtotal;
        $this->iva = $this->documento->iva;
        $this->total = $this->documento->total;
        $this->detalles = $this->documento->orden_compra->detalles_orden_compra;

        // Inicializamos los valores en new_detalles usando los datos del detalle 
        // (Los datos de la base de datos de la tabla detalles_garantias_cambios)
        foreach ($this->detalles as $index => $detalle) {
            $this->initializeDatos(
                $index,
                $detalle->cantidad,
                $detalle->num_de_parte,
                $detalle->descripcion,
                $detalle->precio_unitario,
                $detalle->importe,
            );
        }
    }

    public function initializeDatos($index, $cantidad, $num_de_parte, $descripcion, $precio_unitario, $importe)
    {
        $this->new_detalles[$index]['cantidad_' . $index] = $cantidad;
        $this->new_detalles[$index]['num_de_parte_' . $index] = $num_de_parte;
        $this->new_detalles[$index]['descripcion_' . $index] = $descripcion;
        $this->new_detalles[$index]['precio_unitario_' . $index] = $precio_unitario;
        $this->new_detalles[$index]['importe_' . $index] = $importe;
    }

    public function sincronizarDetallesOrden()
    {
        foreach ($this->detalles as $index => $detalle) {
            //Verificar si se ha modificado el detalle en el input correspondiente
            if (isset($this->new_detalles[$index])) {
                //Si se ha  modificado el dato, se actualiza el detalle en $new_detalles
                $this->new_detalles[$index]['cantidad'] = $this->new_detalles[$index]['cantidad_' . $index];
                $this->new_detalles[$index]['num_de_parte'] = $this->new_detalles[$index]['num_de_parte_' . $index];
                $this->new_detalles[$index]['descripcion'] = $this->new_detalles[$index]['descripcion_' . $index];
                $this->new_detalles[$index]['precio_unitario'] = $this->new_detalles[$index]['precio_unitario_' . $index];
                $this->new_detalles[$index]['importe'] = $this->new_detalles[$index]['importe_' . $index];
            } else {
                // Si no se ha modificado, conserva el valor original del detalle
                $this->new_detalles[$index]['cantidad'] = $detalle['cantidad'];
            }
        }
    }

    public function editarOrdenCompra()
    {
        // Después de sincronizar los detalles modificaciones por el usuario
        $this->sincronizarDetallesOrden();

        // Se obtiene el documento que se va a editar
        $documento = Documento::find($this->id);

        //Si el documento existe 
        if ($documento) {
            // Actualiza los campos del documento
            $documento->clientes_id = $this->clientes_id;
            $documento->save();

            // Verificar si el documento tiene una garantia y/o cambio asociado
            if ($documento->orden_compra) {
                // Actualiza los campos del documento: orden_compras
                $documento->orden_compra->fecha = $this->fecha;
                $documento->orden_compra->empresas_id = $this->empresas_id;
                $documento->orden_compra->proveedores_id = $this->proveedores_id;
                $documento->orden_compra->num_orden_compra = $this->num_orden_compra;
                $documento->orden_compra->nombre_proyecto = $this->nombre_proyecto;
                $documento->orden_compra->tiempo_entrega = $this->tiempo_entrega;
                $documento->orden_compra->moneda = $this->moneda;
                $documento->orden_compra->subtotal = $this->subtotal;
                $documento->orden_compra->iva = $this->iva;
                $documento->orden_compra->total = $this->total;
                $documento->orden_compra->save();

                // Borrado de todos los detalles de la orden_compras actual
                $documento->orden_compra->detalles_orden_compra()->delete();

                //Guardar los nuevos detalles proporcionados por el user
                foreach ($this->new_detalles as $index => $detalle) {
                    $nuevoDetalle = new DetallesOrdenCompra();
                    $nuevoDetalle->cantidad = $detalle['cantidad_' . $index];
                    $nuevoDetalle->num_de_parte = $detalle['num_de_parte_' . $index];
                    $nuevoDetalle->descripcion = $detalle['descripcion_' . $index];
                    $nuevoDetalle->precio_unitario = $detalle['precio_unitario_' . $index];
                    $nuevoDetalle->importe = $detalle['importe_' . $index];
                    $documento->orden_compra->detalles_orden_compra()->save($nuevoDetalle);
                }
            }
        }
    }
    public function render()
    {
        return view('livewire.editar-orden-compra', [
            'id' => $this->id,
        ]);
    }
}
