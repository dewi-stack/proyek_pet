@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">transaction doctor</h1>
  
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspaccing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>doctor</th>
                            <th>user</th>
                            <th>jenis</th>
                            <th>total</th>
                            <th>status</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                        <tr>                        
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->doctor_package->title }}</td>
                            <td>{{ $genre->user->name }}</td>
                            <td>{{ $genre->type_doctor }}</td>
                            <td>{{ $genre->transaction_total }}</td>
                            <td>{{ $genre->transaction_status }}</td>
                        <td>
                            <a href="{{route ('transaction-doctor.show',   $genre->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                             <a href="{{route ('transaction-doctor.edit',   $genre->id)}}" class="btn btn-info">
                                 <i class="fa fa-pencil-alt"></i>
                              </a>
                                <form action="{{route('transaction-doctor.destroy',  $genre->id)}}" method="post" class="d-inline">
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
