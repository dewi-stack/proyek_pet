<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\GromingPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id){

        $item = Transaction::with(['details', 'groming_package', 'user'])->findOrFail($id);
        
        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $groming_package = GromingPackage::findOrFail($id);

        $transaction = Transaction::create([
            'groming_packages_id' => $id,
            'user_id' => Auth::user()->id,
            'type_animals' => 'groming', 
            'transaction_total' => $groming_package->price,
            'transaction_status' => 'IN_CARD',
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'animal' => 'kucing',
            'is_times' => false,
            'jam' => '08.00',
            'doe_date' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id){
        
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'groming_package'])
            ->findOrFail($item->transactions_id);

            if($item->is_times){
            $transaction->transaction_total -= 40000;
         
        }

            $transaction->transaction_total -= 
            $transaction->groming_package->price;
            $transaction->save();
            $item->delete();

            return redirect()->route('checkout', $item->transactions_id);

    }

    public function create(Request $request, $id){
        $request->validate([
            'username' => 'required|string',
            'is_times' => 'required|boolean',
            'doe_date' => 'required',
            'jam' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['groming_package'])->find($id);

        if($request->is_times){
            $transaction->transaction_total += 40000;
         
        }

        $transaction->transaction_total += 
            $transaction->groming_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);

    }


    public function success(Request $request, $id){
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages.success');
    }
}
