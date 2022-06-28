<?php

namespace App\Http\Controllers;

use App\Models\GromingPackage;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = GromingPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
