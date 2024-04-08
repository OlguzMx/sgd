<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesRemision;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Documento;

class EditarRemision extends Component
{
    public $id; // Id del documento
    public $documento; //Referencia de la instancia de Documento
    public $clientes; //Referencia de la instanicia Clientes
    public $empresas; //Referencia de la instanicia Empresas

    // Atributos Formulario
    public $users_id;
    public $clientes_id;
    public $fecha;
    public $empresas_id;
    public $detalles; // Objeto de arrays
    public $new_detalles = [];



    public function mount($id)
    {
        $this->id = $id; //Id del Documento
        $this->documento = Documento::find($id); // Busqueda del documento por medio del Id
        // Colección de Modelos (Mostrar todo en la vista)
        $this->clientes = Cliente::all();
        $this->empresas = Empresa::all();

        // Sincronizar datos de la base de datos con el formulario de editar
        $this->users_id =  $this->documento->users_id;
        $this->fecha = $this->documento->remision->fecha;
        $this->clientes_id = $this->documento->clientes_id;
        $this->empresas_id = $this->documento->remision->empresas_id;
        $this->detalles = $this->documento->remision->detalles_remision;

        // Inicializamos los valores de cantidad en new_detalles usando los datos del detalle
        foreach ($this->detalles as $index => $detalle) {
            $this->initializeCantidad($index, $detalle->cantidad, $detalle->unidad, $detalle->descripcion);
        }
    }

    public function initializeCantidad($index, $cantidad, $unidad, $descripcion)
    {
        $this->new_detalles[$index]['cantidad_' . $index] = $cantidad;
        $this->new_detalles[$index]['unidad_' . $index] = $unidad;
        $this->new_detalles[$index]['descripcion_' . $index] = $descripcion;
    }

    // Método para sincronizar los detalles modificados por el usuario con $new_detalles
    public function sincronizarDetalles()
    {
        foreach ($this->detalles as $index => $detalle) {
            // Verifica si se ha modificado el detalle en el input correspondiente
            if (isset($this->new_detalles[$index])) {
                // Si se ha modificado, actualiza el detalle en $new_detalles
                $this->new_detalles[$index]['cantidad'] = $this->new_detalles[$index]['cantidad_' . $index];
                $this->new_detalles[$index]['unidad'] = $this->new_detalles[$index]['unidad_' . $index];
            } else {
                // Si no se ha modificado, conserva el valor original del detalle
                $this->new_detalles[$index]['cantidad'] = $detalle['cantidad'];
            }
        }
    }



    public function editarDocumento()
    {
        // Luego sincroniza los detalles modificados por el usuario
        $this->sincronizarDetalles();

        // Obtén el documento que se va a editar
        $documento = Documento::find($this->id);

        // Si el documento existe
        if ($documento) {
            // Actualiza los campos del documento
            $documento->clientes_id = $this->clientes_id;
            $documento->save();

            // Verifica si el documento tiene una remisión asociada
            if ($documento->remision) {
                // Actualiza los campos de la remisión
                $documento->remision->fecha = $this->fecha;
                $documento->remision->empresas_id = $this->empresas_id;
                $documento->remision->save();

                // Borra todos los detalles de la remisión actual
                $documento->remision->detalles_remision()->delete();

                // Guarda los nuevos detalles proporcionados por el usuario
                foreach ($this->new_detalles as $index => $detalle) {
                    $nuevoDetalle = new DetallesRemision();
                    $nuevoDetalle->cantidad = $detalle['cantidad_' . $index];
                    $nuevoDetalle->unidad = $detalle['unidad_' . $index];
                    $nuevoDetalle->descripcion = $detalle['descripcion_' . $index];
                    $documento->remision->detalles_remision()->save($nuevoDetalle);
                }
            }
        }

        return redirect(route('documentos.index'))->with('alerta', 'El documento se modificó correctamente correctamente.');
    }

    public function render()
    {
        return view('livewire.editar-remision', [
            'id' => $this->id,
        ]);
    }
}
