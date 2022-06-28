@extends('layouts.app')
@section('title', 'transaction')

<!-- Custom fonts for this template-->
<link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">transaction</h1>
  
    </div>
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100" collspaccing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>jenis</th>
                            <th>total</th>
                            <th>status</th>
                            <th>metode</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        @method('PUT')
                        <tr>                        
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->groming_package->title }}</td>
                           
                            <td>Rp. {{ $item->transaction_total }}</td>
                            <td>{{ $item->transaction_status }}</td>
                            <td><button type="button" class="btn btn-success">transfer</button></td>
                        <td>
                            <a href="{{route ('transaksi.show', $item->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                             <a href="{{route ('transaksi.create')}}" class="btn btn-info">
                                 <i class="fa fa-pencil-alt"></i>
                              </a>
                                      <a href="{{route ('transaksi.edit', $item->id)}}" class="btn btn-danger">
                                <i class="fa fa-images"></i>
                            </a>
                           
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Transaksi groming kosong
                            </td>
                        </tr>
                        @endforelse         
                    </tbody>
                </table>
                <table class="table table-bordered" width="100" collspaccing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>jenis</th>
                            <th>total</th>
                            <th>status</th>
                            <th>metode</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $genre)
                        @method('PUT')
                        <tr>                        
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->doctor_package->title }}</td>
                           
                            <td>Rp. {{ $genre->transaction_total }}</td>
                            <td>{{ $genre->transaction_status }}</td>
                            <td><button type="button" class="btn btn-success">transfer</button></td>
                        <td>
                            <a href="{{route ('transaksidoctor.show',   $genre->id)}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                             <a href="{{route ('transaksidoctor.create')}}" class="btn btn-info">
                                 <i class="fa fa-pencil-alt"></i>
                              </a>
                              <a href="/printpdf" target="_blank" class="btn btn-danger"> <i class="fa fa-images"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                transaksi doktor kosong
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

<!-- Bootstrap core JavaScript-->
<script src="{{ url('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('backend/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ url('backend/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('backend/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ url('backend/js/demo/chart-pie-demo.js')}}"></script>










