@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Adobsi</h1>   
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
        <form action="{{ route('adobsi.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" class="form-control" name="nama" placeholder="nama" value="{{old('nama')}}">
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" placeholder="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="deskripsi">deskirpsi</label>
           <textarea name="deskripsi" rows="10" class="d-block w-100 form-control">{{old('deskripsi')}}</textarea>
        </div>

        <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{old('alamat')}}">
        </div>

        <div class="form-group">
            <label for="jenis">jenis</label>
            <input type="text" class="form-control" name="jenis" placeholder="jenis" value="{{old('jenis')}}">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control"  name="image" placeholder="image" class="form-control">
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
