<?php

namespace App\Http\Controllers;

use App\Models\TransactionDoctor;
use App\Models\TransactionDetailDoctor;
use App\Models\DoctorPackage;

use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutDoctorController extends Controller
{
    public function index(Request $request, $id){

        $genre = TransactionDoctor::with(['details', 'doctor_package', 'user'])->findOrFail($id);
        
        return view('pages.checkout_doctor',[
            'genre' => $genre
        ]);
    }

    public function process(Request $request, $id)
    {
        $doctor_package = DoctorPackage::findOrFail($id);

        $transaction = TransactionDoctor::create([
            'doctor_packages_id' => $id,
            'user_id' => Auth::user()->id,
            'type_doctor' => 'dokter hewan', 
            'transaction_total' => $doctor_package->price,
            'transaction_status' => 'IN_CARD',
        ]);

        TransactionDetailDoctor::create([
            'transactions_doctor_id' => $transaction->id,
            'username' => Auth::user()->username,
            'genre' => 'faksin',
            'animal' => 'kucing',
            'is_times' => false,
            'jam' => '08.00',
            'doe_date' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout_doctor', $transaction->id);
    }

    public function remove(Request $request, $detail_id){
        
        $genre = TransactionDetailDoctor::findOrFail($detail_id);

        $transaction = TransactionDoctor::with(['details', 'doctor_package'])
            ->findOrFail($genre->transactions_doctor_id);

            if($genre->is_times){
            $transaction->transaction_total -= 120000;
         
        }

            $transaction->transaction_total -= 
            $transaction->doctor_package->price;
            $transaction->save();
            $genre->delete();

            return redirect()->route('checkout_doctor', $genre->transactions_doctor_id);

    }

    public function create(Request $request, $id){
        $request->validate([
            'username' => 'required|string',
            'is_times' => 'required|boolean',
            'genre' => 'required|string',
            'animal' => 'required|string',
            'doe_date' => 'required',
            'jam' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_doctor_id'] = $id;

        TransactionDetailDoctor::create($data);

        $transaction = TransactionDoctor::with(['doctor_package'])->find($id);

        if($request->is_times){
            $transaction->transaction_total += 120000;
         
        }

        $transaction->transaction_total += 
            $transaction->doctor_package->price;

        $transaction->save();

        return redirect()->route('checkout_doctor', $id);

    }


    public function success(Request $request, $id){
        $transaction = TransactionDoctor::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages.success');
    }
}
