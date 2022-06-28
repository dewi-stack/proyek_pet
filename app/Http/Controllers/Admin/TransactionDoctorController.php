<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequestDoctor;
use App\Models\TransactionDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = TransactionDoctor::with([
            'details', 'doctor_package', 'user'
        ])->get();

        return view('pages.admin.transaction-doctor.index',[
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequestDoctor $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TransactionDoctor::create($data);
        return redirect()->route('transaction-doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = TransactionDoctor::with([
            'details', 'doctor_package', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction-doctor.detail',[
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = TransactionDoctor::findOrFail($id);

        return view('pages.admin.transaction-doctor.edit',[
            'genre' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequestDoctor $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $genre = TransactionDoctor::findOrFail($id);

        $genre->update($data);

        return redirect()->route('transaction-doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = TransactionDoctor::findOrFail($id);
        $genre->delete();

        return redirect()->route('transaction-doctor.index');
    }
}
