@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">edit {{ $genre->title}}</h1>   
    </div>

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="card shadow">
        <div class="card-body">
        <form action="{{ route('doctor-package.update', $genre->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">    
            <label for="title">judul</label>
            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $genre->title}}">
        </div>

        <div class="form-group">
            <label for="location">lokasi</label>
            <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $genre->location}}">
        </div>

        <div class="form-group">
            <label for="about">tentang</label>
           <textarea name="about" rows="10" class="d-block w-100 form-control">{{ $genre->about}}</textarea>
        </div>

        <div class="form-group">
            <label for="discount">diskon</label>
            <input type="text" class="form-control" name="discount" placeholder="discount" value="{{ $genre->discount}}">
        </div>
   
        <div class="form-group">
            <label for="type_doctor">tipe doktor</label>
            <input type="text" class="form-control" name="type_doctor" placeholder="type doctor" value="{{ $genre->type_doctor}}">
        </div>
  
        <div class="form-group">
            <label for="type_menu">tipe menu</label>
            <input type="text" class="form-control" name="type_menu" placeholder="type_menu" value="{{ $genre->type_menu}}">
        </div>

        <div class="form-group">
            <label for="date_doctor">tanggal dokter</label>
            <input type="date" class="form-control" name="date_doctor" placeholder="date dokter" value="{{ $genre->date_doctor}}">
        </div>

        <div class="form-group">
            <label for="times">Select a time:</label>
            <input type="time" class="form-control" name="times" value="{{ $genre->times}}">
        </div>
        
        <div class="form-group">
            <label for="type_rawat">tipe rawat</label>
            <input type="text" class="form-control" name="type_rawat" placeholder="type rawat" value="{{ $genre->type_rawat}}">
        </div>

          
        <div class="form-group">
            <label for="price">harga</label>
            <input type="number" class="form-control" name="price" placeholder="price" value="{{ $genre->price}}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            simpan
        </button>
        


        
        </form>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

@endsection
