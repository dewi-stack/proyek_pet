<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function pdf()
    {
        $data['judul'] = "Laporan Pdf";
        $html = $data;
        $pdf = new Dompdf();
        $pdf->load_html($html);
        $pdf->setPaper('A4', 'landscape');

        $pdf->render();

        $pdf->stream();
    }

}