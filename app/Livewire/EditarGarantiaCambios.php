<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\DetallesGarantiaCambio;
use App\Models\Empresa;
use Livewire\Component;
use App\Models\Documento;

class EditarGarantiaCambios extends Component
{
    public $id; //id del documento
    public $documento; //Hace referencia a la instancia de Documento
    public $clientes; //Hace referencia a la instancia de Clientes
    public $empresas; //Hace referencia a la instancia de Empresas

    //Campos del formulario
    public $fecha;
    public $clientes_id;
    public $empresas_id;
    public $users_id;

    // Variable donde almacena los objetos en un array
    public $detalles;

    // Variablae donde almacenará los datos editados
    public $new_detalles;

    public function mount($id)
    {
        $this->id = $id;
        $this->documento = Documento::find($id); //Realizamos la búsqueda del documento por medio del id
        // Colección de modelos (Mostrar todo en la vista)
        $this->clientes = Cliente::all();
        $this->empresas = Empresa::all();

        // Sincronizamos los datos de la base de datos con el formulario de edit-garantia-cambios
        $this->fecha = $this->documento->garantia_cambio->fecha;
        $this->clientes_id = $this->documento->clientes_id;
        $this->empresas_id = $this->documento->garantia_cambio->empresas_id;
        $this->users_id =  $this->documento->users_id;
        $this->detalles = $this->documento->garantia_cambio->detalles_garantia_cambio;

        // Inicializamos los valores en new_detalles usando los datos del detalle 
        // (Los datos de la base de datos de la tabla detalles_garantias_cambios)
        foreach ($this->detalles as $index => $detalle) {
            $this->initializeDatos(
                $index,
                $detalle->marca,
                $detalle->modelo,
                $detalle->num_serie_danado,
                $detalle->num_serie_reemplazo,
                $detalle->num_inventario
            );
        }
    }
    public function initializeDatos($index, $marca, $modelo, $num_serie_danado, $num_serie_reemplazo, $num_inventario)
    {
        $this->new_detalles[$index]['marca_' . $index] = $marca;
        $this->new_detalles[$index]['modelo_' . $index] = $modelo;
        $this->new_detalles[$index]['num_serie_danado_' . $index] = $num_serie_danado;
        $this->new_detalles[$index]['num_serie_reemplazo_' . $index] = $num_serie_reemplazo;
        $this->new_detalles[$index]['num_inventario_' . $index] = $num_inventario;
    }

    // Método para sincronizar los detalles modificados por el user con $new_detalles
    public function sincronizarDetallesGarantia()
    {
        foreach ($this->detalles as $index => $detalle) {
            //Verificar si se ha modificado el detalle en el input correspondiente
            if (isset($this->new_detalles[$index])) {
                //Si se ha  modificado el dato, se actualiza el detalle en $new_detalles
                $this->new_detalles[$index]['marca'] = $this->new_detalles[$index]['marca_' . $index];
                $this->new_detalles[$index]['modelo'] = $this->new_detalles[$index]['modelo_' . $index];
                $this->new_detalles[$index]['num_serie_danado'] = $this->new_detalles[$index]['num_serie_danado_' . $index];
                $this->new_detalles[$index]['num_serie_reemplazo'] = $this->new_detalles[$index]['num_serie_reemplazo_' . $index];
                $this->new_detalles[$index]['num_inventario'] = $this->new_detalles[$index]['num_inventario_' . $index];
            } else {
                // Si no se ha modificado, conserva el valor original del detalle
                $this->new_detalles[$index]['marca'] = $detalle['marca'];
            }
        }
    }

    public function editarGarantiaCambios()
    {
        // Después de sincronizar los detalles modificaciones por el usuario
        $this->sincronizarDetallesGarantia();

        // Se obtiene el documento que se va a editar
        $documento = Documento::find($this->id);

        //Si el documento existe 
        if ($documento) {
            // Actualiza los campos del documento
            $documento->clientes_id = $this->clientes_id;
            $documento->save();

            // Verificar si el documento tiene una garantia y/o cambio asociado
            if ($documento->garantia_cambio) {
                // Actualiza los campos del documento: garantia_cambios
                $documento->garantia_cambio->fecha = $this->fecha;
                $documento->garantia_cambio->empresas_id = $this->empresas_id;
                $documento->garantia_cambio->users_id = $this->users_id;
                $documento->garantia_cambio->save();

                // Borrado de todos los detalles de la garantia_cambios actual
                $documento->garantia_cambio->detalles_garantia_cambio()->delete();

                //Guardar los nuevos detalles proporcionados por el user
                foreach($this->new_detalles as $index => $detalle){
                    $nuevoDetalle = new DetallesGarantiaCambio();
                    $nuevoDetalle->marca = $detalle['marca_' . $index];
                    $nuevoDetalle->modelo = $detalle['modelo_' . $index];
                    $nuevoDetalle->num_serie_danado = $detalle['num_serie_danado_' . $index];
                    $nuevoDetalle->num_serie_reemplazo = $detalle['num_serie_reemplazo_' . $index];
                    $nuevoDetalle->num_inventario = $detalle['num_inventario_' . $index];
                    $documento->garantia_cambio->detalles_garantia_cambio()->save($nuevoDetalle);
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.editar-garantia-cambios', [
            'id' => $this->id,
        ]);
    }
}
