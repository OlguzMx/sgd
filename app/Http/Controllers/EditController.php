<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    //EDIT DE REMISIÓN
    public function editRemision(string $id)
    {
        return view('documentos.editRemision', compact('id'));
    }

    //EDIT DE COTIZACIÓN
    public function editCotizacion(string $id)
    {
        return view('documentos.editCotizacion', compact('id'));
    }

    //EDIT DE ORDEN DE COMPRA
    public function editOrdenCompra(string $id)
    {
        return view('documentos.editOrdenCompra', compact('id'));
    }
    
    //EDIT DE GARANTÍA Y/O CAMBIO DE EQUIPOS
    public function editGarantiaCambio(string $id)
    {
        return view('documentos.editGarantiaCambio', compact('id'));
    }
    
    //EDIT DE ENTRADA DE MAT/EQ A BODEGA
    public function editEntradaAlmacen(string $id)
    {
        return view('documentos.editEntradaAlmacen', compact('id'));
    }
    
    //EDIT DE SALIDA DE MAT/EQ A BODEGA
    public function editSalidaAlmacen(string $id)
    {
        return view('documentos.editSalidaAlmacen', compact('id'));
    }
}
