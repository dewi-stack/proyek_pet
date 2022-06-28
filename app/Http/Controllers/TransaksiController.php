<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use App\Models\Transfer;
use App\Http\Requests\Admin\TransferRequest;
use App\Models\Transaction;
use App\Models\TransactionDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\AdobsiRequest;


class TransaksiController extends Controller
{
    public function index()
    {
        $items = Transaction::whereHas('user', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        $genres = TransactionDoctor::whereHas('user', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('pages.transaksi.index',[
            'items' => $items,
            'genres' => $genres,
        ]);
    }


    public function show($id)
    {
        $item = Transaction::with([
            'details', 'groming_package', 'user'
        ])->findOrFail($id);

        return view('pages.transaksi.detail',[
            'item' => $item

        ]);
    }

    public function edit($id)
    {
        $item = Transaction::with([
            'details', 'groming_package', 'user'
        ])->findOrFail($id);

        $html = view('pages.transaksi.printpdf',[
            'item' => $item

        ]);

                // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

    public function create()
    {
       
        $transfer = Transaction::all();
        return view('pages.transaksi.transfer',[

            'transfer' => $transfer,
        ]);
    }

}

