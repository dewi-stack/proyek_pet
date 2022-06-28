<?php

namespace App\Http\Controllers;

use App\Models\DoctorPackage;
use Illuminate\Http\Request;

class DetailDoctorController extends Controller
{
    public function index(Request $request, $slug)
    {
        $genre = DoctorPackage::with(['gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.detail_doctor',[
            'genre' => $genre
        ]);
    }
}
