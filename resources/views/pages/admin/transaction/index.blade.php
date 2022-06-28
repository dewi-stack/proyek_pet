@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">transaction groming</h1>
  
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspaccing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>groming</th>
                            <th>user</th>
                            <th>jenis</th>
                            <th>total</th>
                            <th>status</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>                        
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->groming_package->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->type_animals }}</td>
                            <td>{{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                        <td>
                            <a href="{{route ('transaction.show',   $item->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                             <a href="{{route ('transaction.edit',   $item->id)}}" class="btn btn-info">
                                 <i class="fa fa-pencil-alt"></i>
                              </a>
                                <form action="{{route('transaction.destroy',  $item->id)}}" method="post" class="d-inline">
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
