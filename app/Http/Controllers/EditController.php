<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    //
    public function editRemision(string $id)
    {
        return view('documentos.editRemision', compact('id'));
    }

    public function editGarantiaCambio(string $id)
    {
        return view('documentos.editGarantiaCambio', compact('id'));
    }
    public function editEntradaAlmacen(string $id)
    {
        return view('documentos.editEntradaAlmacen', compact('id'));
    }
    public function editSalidaAlmacen(string $id)
    {
        return view('documentos.editSalidaAlmacen', compact('id'));
    }
}
