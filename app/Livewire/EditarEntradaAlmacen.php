<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesEntradaAlmacen;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Documento;

class EditarEntradaAlmacen extends Component
{

    public $id; //id del documento
    public $documento; //Hace referencia a la instancia de Documento
    public $clientes; //Hace referencia a la instancia de Clientes
    public $clientes_id;
    public $empresas; //Hace referencia a la instancia de Empresas

    // Campos de formulario, tabla entrada_almacen
    public $fecha;
    public $users_id;
    public $name_cliente;
    public $puesto_cliente;
    public $empresa_cliente;

    // Variable donde almacena los objetos en un array, de la tabla detalles_entrada_almacen
    public $detalles;

    // Variable donde almacenará los datos editados
    public $new_detalles;

    public function mount($id)
    {
        $this->id = $id;
        $this->documento = Documento::find($id); //Realizamos la búsqueda del documento por medio del id
        // Colección de modelos (Mostrar todo en la vista)
        $this->clientes = Cliente::all();
        $this->empresas = Empresa::all();

        // Sincronizamos los datos de la base de datos con el formulario de edit-entrada-almacen
        $this->fecha = $this->documento->entrada_almacen->fecha;
        $this->users_id =  $this->documento->users_id;
        $this->clientes_id = $this->documento->clientes_id;
        $this->name_cliente = $this->documento->entrada_almacen->name_cliente;
        $this->puesto_cliente = $this->documento->entrada_almacen->puesto_cliente;
        $this->empresa_cliente = $this->documento->entrada_almacen->empresa_cliente;
        $this->detalles = $this->documento->entrada_almacen->detalles_entrada_almacen;

        // Inicializamos los valores en new_detalles usando los datos del detalle 
        // (Los datos de la base de datos de la tabla detalles_entrada_almacen)
        foreach ($this->detalles as $index => $detalle) {
            $this->initializeDatos(
                $index,
                $detalle->cantidad,
                $detalle->marca,
                $detalle->modelo,
                $detalle->num_de_parte,
                $detalle->descripcion,
            );
        }
    }

    public function initializeDatos($index, $cantidad, $marca, $modelo, $num_de_parte, $descripcion)
    {
        $this->new_detalles[$index]['cantidad_' . $index] = $cantidad;
        $this->new_detalles[$index]['marca_' . $index] = $marca;
        $this->new_detalles[$index]['modelo_' . $index] = $modelo;
        $this->new_detalles[$index]['num_de_parte_' . $index] = $num_de_parte;
        $this->new_detalles[$index]['descripcion_' . $index] = $descripcion;
    }

    // Método para sincronizar los detalles modificados por el user con $new_detalles
    public function sincronizarDetallesEntradaAlmacen()
    {
        foreach ($this->detalles as $index => $detalle) {
            //Verificar si se ha modificado el detalle en el input correspondiente
            if (isset($this->new_detalles[$index])) {
                //Si se ha  modificado el dato, se actualiza el detalle en $new_detalles
                $this->new_detalles[$index]['cantidad'] = $this->new_detalles[$index]['cantidad_' . $index];
                $this->new_detalles[$index]['marca_'] = $this->new_detalles[$index]['marca_' . $index];
                $this->new_detalles[$index]['modelo'] = $this->new_detalles[$index]['modelo_' . $index];
                $this->new_detalles[$index]['num_de_parte'] = $this->new_detalles[$index]['num_de_parte_' . $index];
                $this->new_detalles[$index]['descripcion'] = $this->new_detalles[$index]['descripcion_' . $index];
            } else {
                // Si no se ha modificado, conserva el valor original del detalle
                $this->new_detalles[$index]['cantidad'] = $detalle['cantidad'];
            }
        }
    }

    public function editarEntradaAlmacen()
    {
        //Luego se sincroniza los detalles modificados por el usuario
        $this->sincronizarDetallesEntradaAlmacen();

        // Obtén el documento que se va a editar
        $documento = Documento::find($this->id);

        // Si el documento existe
        if ($documento) {
            // Actualiza los campos del documento
            $documento->clientes_id = $this->clientes_id;
            $documento->save();

            // Verifica si el documento tiene una remisión asociada
            if ($documento->entrada_almacen) {
                // Actualiza los campos de la remisión
                $documento->entrada_almacen->fecha = $this->fecha;
                $documento->entrada_almacen->users_id = $this->users_id;
                $documento->clientes_id = $this->clientes_id;
                $documento->entrada_almacen->name_cliente = $this->name_cliente;
                $documento->entrada_almacen->puesto_cliente = $this->puesto_cliente;
                $documento->entrada_almacen->empresa_cliente = $this->empresa_cliente;
                $documento->entrada_almacen->save();

                // Borra todos los detalles de la remisión actual
                $documento->entrada_almacen->detalles_entrada_almacen()->delete();

                // Guarda los nuevos detalles proporcionados por el usuario
                foreach ($this->new_detalles as $index => $detalle) {
                    $nuevoDetalle = new DetallesEntradaAlmacen();
                    $nuevoDetalle->cantidad = $detalle['cantidad_' . $index];
                    $nuevoDetalle->marca = $detalle['marca_' . $index];
                    $nuevoDetalle->modelo = $detalle['modelo_' . $index];
                    $nuevoDetalle->num_de_parte = $detalle['num_de_parte_' . $index];
                    $nuevoDetalle->descripcion = $detalle['descripcion_' . $index];
                    $documento->entrada_almacen->detalles_entrada_almacen()->save($nuevoDetalle);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.editar-entrada-almacen', [
            'id' => $this->id,
        ]);
    }
}
