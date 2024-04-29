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

    // SHOW DE REMISIÓN
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

    // SHOW DE COTIZACIÓN
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

    // SHOW DE ORDEN DE COMPRA
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

    // SHOW DE GARANTÍA Y/O CAMBIOS DE EQUIPO
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

    // SHOW DE ENTRADA DE MAT/EQ A BODEGA
    public function showEntradaAlmacen($id)
    {
        $documento = Documento::find($id);
        $entrada_almacen = EntradaAlmacen::all();
        return view('documentos.showEntradaAlmacen', [
            'Documentos' => $documento,
            'EntradaAlmacen' => $entrada_almacen,
        ]);
    }

    // SHOW DE SALIDA DE MAT/EQ A BODEGA
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
