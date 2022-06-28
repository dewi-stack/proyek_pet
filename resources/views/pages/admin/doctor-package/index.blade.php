@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">boking doctor</h1>
    <a href="{{route('doctor-package.create')}}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah boking doctor
    </a>
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspaccing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>lokasi</th>
                            <th>discount</th>
                            <th>type doctor</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                        <tr>                        
                        <td>{{ $genre->id }}</td>
                            <td>{{ $genre->title }}</td>
                            <td>{{ $genre->location }}</td>
                            <td>{{ $genre->discount }}</td>
                            <td>{{ $genre->type_doctor }}</td>

                            <td>
                                 <a href="{{route ('doctor-package.edit',   $genre->id)}}" class="btn btn-info">
                                 <i class="fa fa-pencil-alt"></i>
                                 </a>
                                <form action="{{route('doctor-package.destroy',  $genre->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse         
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

@endsection
