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
    public $users_id;
    #[Validate('required')]
    public $clientes_id;
    #[Validate('required')]
    public $tipo_documento_id;

    // Remision
    public $fecha;
    public $empresas_id;
    public $cantidad;
    public $unidad;
    public $descripcion;

    public function mount() {
        $this->users_id = auth()->user()->id;
    }

    public function save() {

        $this->validate();

        // Remisión
        if($this->validate()['tipo_documento_id'] === '1') {
            // Validar campos de remision
            $this->validate([
                'fecha' => 'required',
                'empresas_id' => 'required',
                'cantidad' => 'required',
                'unidad' => 'required',
                'descripcion' => 'required'
            ]);

            // Guardar en Documento
            Documento::create([
                'users_id' => $this->users_id,
                'tipo_documento_id' => $this->tipo_documento_id,
                'clientes_id' => $this->clientes_id
            ]);

            // Guardar campos en tabla de remision
            
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
