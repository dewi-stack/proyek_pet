<?php

namespace App\Http\Controllers;

use App\Models\AdobsiHewan;
use Illuminate\Http\Request;



class AdobsiController extends Controller
{
    public function index(Request $request){
        $items = AdobsiHewan::all();
         
        
        return view('pages.adobsi',[
            'items' => $items,
        ]);
    }

}
