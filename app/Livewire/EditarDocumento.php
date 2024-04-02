<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Documento;

class EditarDocumento extends Component
{
    public $id;
    public $documento; //Referencia de la instancia de Documento
    public $clientes; //Referencia de la instanicia Clientes

    // Atributos Formulario
    public $users_id;
    public $clientes_id;

    public function mount($id) {
        $this->id = $id;
        $this->documento = Documento::find($id);
        $this->clientes = Cliente::all();
        $this->users_id =  $this->documento->users_id;
        // Establecer el cliente seleccionado basado en el documento
        $this->clientes_id = $this->documento->clientes_id;


    }

    public function editarDocumento() {
        dd($this->users_id);
    }

    public function render()
    {
        return view('livewire.editar-documento', [
            'id' => $this->id,
        ]);
    }
}
