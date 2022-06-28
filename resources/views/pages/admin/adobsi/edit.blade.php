@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">edit Gallery</h1>   
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
        <form action="{{ route('adobsi.update', $item->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nama">nama</label>
            <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ $item->nama}}">
        </div>

        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" name="email" placeholder="email" value="{{ $item->email}}">
        </div>

        <div class="form-group">
            <label for="deskripsi">deskripsi</label>
           <textarea name="deskripsi" rows="10" class="d-block w-100 form-control">{{ $item->deskripsi}}</textarea>
        </div>

        <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ $item->alamat}}">
        </div>
   
        <div class="form-group">
            <label for="jenis">jenis</label>
            <input type="text" class="form-control" name="jenis" placeholder="jenis" value="{{ $item->jenis}}">
        </div>

       
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control"  name="image" placeholder="image" value="{{ $item->image}}">
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
