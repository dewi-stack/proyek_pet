<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Http\Requests\Admin\TransferRequest;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\TransactionDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransaksiDoctorController extends Controller
{

    public function show($id)
    {
        $genre = TransactionDoctor::with([
            'details', 'doctor_package', 'user'
        ])->findOrFail($id);

        return view('pages.transaksi.details',[
            'genre' => $genre
        ]);
    }

    public function create()
    {
        return view('pages.transaksi.transfers');
    }

}

