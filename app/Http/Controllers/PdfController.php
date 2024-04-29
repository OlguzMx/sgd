<?php

namespace App\Http\Controllers;


use App\Models\Documento;
use Illuminate\Support\Carbon;

use Illuminate\Routing\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PdfController extends Controller
{

    // PDF DE REMISIÓN
    public function pdfRemision(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la remisión
        $detallesRemision = $documento->remision->detalles_remision->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/remision/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
            'footer-html' => config('app.url') . '/documentos/remision/pdf/footer',
        ];

        $pdf = SnappyPdf::loadView('pdf.remision', [
            'documento' => $documento,
            'detallesRemision' => $detallesRemision
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("remision-$fechaActual.pdf");
    }

    // PDF DE COTIZACIÓN
    public function pdfCotizacion(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la cotización
        $detallesCotizacion = $documento->cotizacion->detalles_cotizacion->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/cotizacion/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
            'footer-html' => config('app.url') . '/documentos/cotizacion/pdf/footer',
            // 'footer-center' => config('app.url') . '/documentos/cotizacion/pdf/footer',

        ];

        $pdf = SnappyPdf::loadView('pdf.cotizacion', [
            'documento' => $documento,
            'detallesCotizacion' => $detallesCotizacion
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("cotizacion-$fechaActual.pdf");
    }

    // PDF DE ORDEN DE COMPRA
    public function pdfOrden(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la orden de compra
        $detallesOrden = $documento->orden_compra->detalles_orden_compra->chunk(60); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/orden_compra/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
        ];

        $pdf = SnappyPdf::loadView('pdf.orden', [
            'documento' => $documento,
            'detallesOrden' => $detallesOrden
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("orden_compra-$fechaActual.pdf");
    }

    // PDF DE GARANTÍA Y/O CAMBIO DE EQUIPO
    public function pdfGarantia(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la garantía y/o cambio de equipo
        $detallesGarantia = $documento->garantia_cambio->detalles_garantia_cambio->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/garantia_cambio/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
            'footer-html' => config('app.url') . '/documentos/garantia_cambio/pdf/footer',
        ];

        $pdf = SnappyPdf::loadView('pdf.garantia', [
            'documento' => $documento,
            'detallesGarantia' => $detallesGarantia
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("garantia_cambio-$fechaActual.pdf");
    }

    // PDF DE ENTRADA DE EQ/MAT A BODEGA
    public function pdfEntrada(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la entrada mat/eq a bodega
        $detallesEntrada = $documento->entrada_almacen->detalles_entrada_almacen->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/entrada_almacen/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
            'footer-html' => config('app.url') . '/documentos/entrada_almacen/pdf/footer',
        ];

        $pdf = SnappyPdf::loadView('pdf.entrada', [
            'documento' => $documento,
            'detallesEntrada' => $detallesEntrada
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("entrada_almacen-$fechaActual.pdf");
    }

    // PDF DE SALIDA DE EQ/MAT A BODEGA
    public function pdfSalida(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la salida mat/eq a bodega
        $detallesSalida = $documento->salida_almacen->detalles_salida_almacen->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página. 
        $options = [
            'header-html' => config('app.url') . '/documentos/salida_almacen/pdf/header',
            'footer-right' => '[page]', // Agrega el número de página en el lado derecho del pie de página
            'footer-font-name' => 'Arial Narrow', // Fuente del pie de página
            'footer-font-size' => 7, // Tamaño de fuente del pie de página
            'footer-html' => config('app.url') . '/documentos/salida_almacen/pdf/footer',
        ];

        $pdf = SnappyPdf::loadView('pdf.salida', [
            'documento' => $documento,
            'detallesSalida' => $detallesSalida
        ])->setOptions($options);

        // Obtener fecha actual en el formato deseado
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $pdf->inline("salida_almacen-$fechaActual.pdf");
    }

    // Footers and Headers
    public function pdfFooter()
    {
        return view('pdf.pie-de-pagina');
    }

    public function pdfFooterCenter()
    {
        return view('pdf.footer-center-cotizacion');
    }

    public function pdfFooterCotizacion()
    {
        return view('pdf.pie-de-pagina-cotizacion');
    }
    public function pdfHeader()
    {
        return view('pdf.header');
    }
}
