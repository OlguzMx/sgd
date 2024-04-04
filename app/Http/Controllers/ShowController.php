<?php

namespace App\Http\Controllers;

use App\Models\GarantiaCambio;
use App\Models\Remision;
use App\Models\Documento;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    // CONTROLADOR EXCLUSIVAMENTE PARA LOS SHOW DE CADA TIPO DE DOCUMENTO
    public function showRemision($id)
    {
        $documento = Documento::find($id);
        $remision = Remision::all();
        // dd($remision);
        return view('documentos.showRemision', [
            'Documentos' => $documento,
            'remision' => $remision
        ]);
    }

    public function showGarantiaCambios($id)
    {
        $documento = Documento::find($id);
        $garantia = GarantiaCambio::all();
        // dd($remision);
        return view('documentos.showGarantiasCambios', [
            'Documentos' => $documento,
            'garantia' => $garantia
        ]);
    }
}
