<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use App\Models\TipoDocumento;

class CrearDocumento extends Component
{


    public function render()
    {
       
        $clientes = Cliente::orderBy('name', 'asc')->get();
        return view('livewire.crear-documento', [
            'clientes' => $clientes
        ]);
    }
}
