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
        <form action="{{ route('gallery-doctor.update', $genre->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="doctor_packages_id">paket doctor</label>
            <select name="doctor_packages_id" required class="form-control">
            <option value="{{ $genre->doctor_packages_id}}">jangan diubah</option>
                @foreach ($doctor_packages as $doctor_package)
                <option value="{{ $doctor_package->id}}">
                    {{$doctor_package->title}}
                </option>            
                @endforeach
            </select>
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
