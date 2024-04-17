<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesCotizacion;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Documento;

class EditarCotizacion extends Component
{

    public $id; //id del documento
    public $documento; //Hace referencia a la instancia de Documento
    public $clientes; //Hace referencia a la instancia de Clientes
    public $empresas; //Hace referencia a la instancia de Empresas

    //Campos del formulario
    public $fecha;
    public $folio;
    public $clientes_id;
    public $empresas_id;
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

        // Sincronizamos los datos de la base de datos con el formulario de edit-garantia-cambios
        $this->fecha = $this->documento->cotizacion->fecha;
        $this->clientes_id = $this->documento->clientes_id;
        $this->empresas_id = $this->documento->cotizacion->empresas_id;
        $this->folio =  $this->documento->cotizacion->folio;
        $this->detalles = $this->documento->cotizacion->detalles_cotizacion;

        // Inicializamos los valores en new_detalles usando los datos del detalle 
        // (Los datos de la base de datos de la tabla detalles_garantias_cambios)
        foreach ($this->detalles as $index => $detalle) {
            $this->initializeDatos(
                $index,
                $detalle->cantidad,
                $detalle->unidad,
                $detalle->num_de_parte,
                $detalle->descripcion,
                $detalle->precio_unitario,
                $detalle->importe,
            );
        }
    }
    public function initializeDatos($index, $cantidad, $unidad, $num_de_parte, $descripcion, $precio_unitario, $importe)
    {
        $this->new_detalles[$index]['cantidad_' . $index] = $cantidad;
        $this->new_detalles[$index]['unidad_' . $index] = $unidad;
        $this->new_detalles[$index]['num_de_parte_' . $index] = $num_de_parte;
        $this->new_detalles[$index]['descripcion_' . $index] = $descripcion;
        $this->new_detalles[$index]['precio_unitario_' . $index] = $precio_unitario;
        $this->new_detalles[$index]['importe_' . $index] = $importe;
    }

    public function sincronizarDetallesCotizacion()
    {
        foreach ($this->detalles as $index => $detalle) {
            //Verificar si se ha modificado el detalle en el input correspondiente
            if (isset($this->new_detalles[$index])) {
                //Si se ha  modificado el dato, se actualiza el detalle en $new_detalles
                $this->new_detalles[$index]['cantidad'] = $this->new_detalles[$index]['cantidad_' . $index];
                $this->new_detalles[$index]['unidad'] = $this->new_detalles[$index]['unidad_' . $index];
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

    public function editarCotizacion()
    {
        // Después de sincronizar los detalles modificaciones por el usuario
        $this->sincronizarDetallesCotizacion();

        // Se obtiene el documento que se va a editar
        $documento = Documento::find($this->id);

        //Si el documento existe 
        if ($documento) {
            // Actualiza los campos del documento
            $documento->clientes_id = $this->clientes_id;
            $documento->save();

            // Verificar si el documento tiene una garantia y/o cambio asociado
            if ($documento->cotizacion) {
                // Actualiza los campos del documento: cotizacions
                $documento->cotizacion->fecha = $this->fecha;
                $documento->cotizacion->empresas_id = $this->empresas_id;
                $documento->cotizacion->folio = $this->folio;
                $documento->cotizacion->save();

                // Borrado de todos los detalles de la cotizacions actual
                $documento->cotizacion->detalles_cotizacion()->delete();

                //Guardar los nuevos detalles proporcionados por el user
                foreach ($this->new_detalles as $index => $detalle) {
                    $nuevoDetalle = new DetallesCotizacion();
                    $nuevoDetalle->cantidad = $detalle['cantidad_' . $index];
                    $nuevoDetalle->unidad = $detalle['unidad_' . $index];
                    $nuevoDetalle->num_de_parte = $detalle['num_de_parte_' . $index];
                    $nuevoDetalle->descripcion = $detalle['descripcion_' . $index];
                    $nuevoDetalle->precio_unitario = $detalle['precio_unitario_' . $index];
                    $nuevoDetalle->importe = $detalle['importe_' . $index];
                    $documento->cotizacion->detalles_cotizacion()->save($nuevoDetalle);
                }
            }
        }
    }
    public function render()
    {
        return view('livewire.editar-cotizacion', [
            'id' => $this->id,
        ]);
    }
}
