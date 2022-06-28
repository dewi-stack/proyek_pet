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
        <form action="{{ route('gallery.update', $item->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="groming_packages_id">paket groming</label>
            <select name="groming_packages_id" required class="form-control">
            <option value="{{ $item->groming_packages_id}}">jangan diubah</option>
                @foreach ($groming_packages as $groming_package)
                <option value="{{ $groming_package->id}}">
                    {{$groming_package->title}}
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
