<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryDoctorRequest;
use App\Models\GalleryDoctor;
use App\Models\DoctorPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GalleryDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = GalleryDoctor::with(['doctor_package'])->get();

        return view('pages.admin.gallery-doctor.index',[
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
        $doctor_packages = DoctorPackage::all();
        return view('pages.admin.gallery-doctor.create',[
            'doctor_packages' => $doctor_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryDoctorRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
    );

        GalleryDoctor::create($data);
        return redirect()->route('gallery-doctor.index');
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
        $genre = GalleryDoctor::findOrFail($id);
        $doctor_packages = DoctorPackage::all();

        return view('pages.admin.gallery-doctor.edit',[
            'genre' => $genre,
            'doctor_packages' => $doctor_packages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryDoctorRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
       

        $genre = GalleryDoctor::findOrFail($id);

        $genre->update($data);

        return redirect()->route('gallery-doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = GalleryDoctor::findOrFail($id);
        $genre->delete();

        return redirect()->route('gallery-doctor.index');
    }
}
