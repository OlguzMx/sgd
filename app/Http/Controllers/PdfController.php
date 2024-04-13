<?php

namespace App\Http\Controllers;


use App\Models\Documento;
use Illuminate\Support\Carbon;

use Illuminate\Routing\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;

class PdfController extends Controller
{


    public function pdfRemision(string $id)
    {
        $documento = Documento::find($id);
        // Paginar los detalles de la remisión
        $detallesRemision = $documento->remision->detalles_remision->chunk(15); // Mostrar 6 registros por página

        // Configurar la opción para el número de página en el pie de página
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
        
        return $pdf->download("remision-$fechaActual.pdf");
    }

    // Footers and Headers
    public function pdfFooter()
    {
        return view('pdf.pie-de-pagina');
    }

    public function pdfHeader() {
        return view('pdf.header');
    }
}
