<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\Remision;
use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\SalidaAlmacen;
use App\Models\EntradaAlmacen;
use App\Models\GarantiaCambio;
use App\Models\OrdenCompra;

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

    public function showCotizacion($id)
    {
        $documento = Documento::find($id);
        $orden_compra = OrdenCompra::all();
        // dd($remision);
        return view('documentos.showCotizacion', [
            'Documentos' => $documento,
            'orden_compra' => $orden_compra
        ]);
    }

    public function showOrdenCompra($id)
    {
        $documento = Documento::find($id);
        $cotizacion = Cotizacion::all();
        // dd($remision);
        return view('documentos.showOrdenCompra', [
            'Documentos' => $documento,
            'cotizacion' => $cotizacion
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

    public function showEntradaAlmacen($id)
    {
        $documento = Documento::find($id);
        $entrada_almacen = EntradaAlmacen::all();
        return view('documentos.showEntradaAlmacen', [
            'Documentos' => $documento,
            'EntradaAlmacen' => $entrada_almacen,
        ]);
    }

    public function showSalidaAlmacen($id)
    {
        $documento = Documento::find($id);
        $salida_almacen = SalidaAlmacen::all();
        return view('documentos.showSalidaAlmacen', [
            'Documentos' => $documento,
            'SalidaAlmacen' => $salida_almacen,
        ]);
    }
}
