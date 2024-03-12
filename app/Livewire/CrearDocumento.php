<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\Documento;
use App\Models\TipoDocumento;
use Livewire\Attributes\Validate;

class CrearDocumento extends Component
{
    public $selectedOption;

    #[Validate('required')]
    public $titulo;

    public $users_id;

    #[Validate('required')]
    public $clientes_id;

    #[Validate('required')]
    public $tipo_documento_id;

    public function mount() {
        $this->users_id = auth()->user()->id;
    }

    public function save() {

        $this->validate();

        // Remisión
        if($this->validate()['tipo_documento_id'] === '1') {
            Documento::create([
                'titulo' => $this->titulo,
                'users_id' => $this->users_id,
                'tipo_documento_id' => $this->tipo_documento_id,
                'clientes_id' => $this->clientes_id
            ]);
            return;
        }
        dd('Este no es remision');
        // Crear elseif para cada tipo
    }


    public function render()
    {

       
        $clientes = Cliente::orderBy('name', 'asc')->get();
        $tiposDocumentos = TipoDocumento::orderBy('name', 'asc')->get();

        return view('livewire.crear-documento', [
            'clientes' => $clientes,
            'tiposDocumentos' => $tiposDocumentos
        ]);
    }
}
