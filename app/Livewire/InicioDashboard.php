<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Cliente;
use Livewire\Component;
use App\Models\Documento;

class InicioDashboard extends Component
{
    public function render()
    {
        $user = User::count();
        $cliente = Cliente::count();
        $documento = Documento::count();
        return view('livewire.inicio-dashboard')->with(['User' => $user, 'Cliente' => $cliente, 'Documento' => $documento]);
    }
}
