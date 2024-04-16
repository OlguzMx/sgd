<?php

namespace App\Livewire;

use Livewire\Component;

class EditarOrdenCompra extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.editar-orden-compra');
    }
}
