<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GromingPackage;
use App\Models\DoctorPackage;


class HomeController extends Controller
{
    public function index(Request $request){
        $items = GromingPackage::with(['galleries'])->get();
         $genres = DoctorPackage::with(['gallery'])->get();
        
        return view('pages.home',[
            'items' => $items,
            'genres' => $genres
        ]);
    }

}
