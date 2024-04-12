<?php

namespace App\Http\Controllers;


use App\Models\Documento;
use Barryvdh\Snappy\Facades\SnappyPdf;

use Illuminate\Routing\Controller;

class PdfController extends Controller
{

    public function pdfRemision(string $id)
    {
        $documento = Documento::find($id);

        // Paginar los detalles de la remisión
        $detallesRemision = $documento->remision->detalles_remision->chunk(6); // Mostrar 6 registros por página

        $pdf = SnappyPdf::loadView('pdf.remision', [
            'documento' => $documento,
            'detallesRemision' => $detallesRemision
        ]);


        return $pdf->inline('document.pdf');
    }
}
