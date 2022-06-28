<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorPackageRequest;
use App\Models\DoctorPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DoctorPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = DoctorPackage::all();

        return view('pages.admin.doctor-package.index',[
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
        return view('pages.admin.doctor-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        DoctorPackage::create($data);
        return redirect()->route('doctor-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = DoctorPackage::findOrFail($id);

        return view('pages.admin.doctor-package.edit',[
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
    public function update(DoctorPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $genre = DoctorPackage::findOrFail($id);

        $genre->update($data);

        return redirect()->route('doctor-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = DoctorPackage::findOrFail($id);
        $genre->delete();

        return redirect()->route('doctor-package.index');
    }
}
