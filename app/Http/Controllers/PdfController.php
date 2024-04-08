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

        $pdf = SnappyPdf::loadView('pdf.remision', [
            'documento' => $documento
        ]);

        return $pdf->inline('document.pdf');
    }


}
