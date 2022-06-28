@extends('layouts.print')
@section('title', 'transaction')

<!-- Custom fonts for this template-->
<link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ url('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css  ">
<style>
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }
</style>

@section('content')


<table>
    <tr>
        <td align="center">
            <span style="line-height: 1.6; font-weight: bold;">
            BUKTI DARI DEARPET PETSHOP
            </span>
        </td>
    </tr>
</table>
<hr class="line-title">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">detail transaksi {{ $item->user->name}}</h1>   
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
            <table class="table table-bordered">
                     <tr>
                        <th>ID</th>
                        <td>{{ $item->id}}</td>
                    </tr>
                    <tr>
                        <th>Paket Groming</th>
                        <td>{{ $item->groming_package->title}}</td>
                    </tr>

                    <tr>
                        <th>user</th>
                        <td>{{ $item->user->name}}</td>
                    </tr>

                    <tr>
                        <th>Jenis </th>
                        <td>{{ $item->type_animals}}</td>
                    </tr>

                    <tr>
                        <th>Total transaksi </th>
                        <td>{{ $item->transaction_total}}</td>
                    </tr>

                    <tr>
                        <th>status transaksi </th>
                        <td>{{ $item->transaction_status}}</td>
                    </tr>
                    <tr>
                        <th>hewan boking</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>nama</th>
                                    <th>tipe animal</th>
                                    <th>diskon</th>
                                    <th>waktu</th>
                                    <th>tanggal</th>
                                </tr>
                                @foreach ($item->details as $detail)
                                    <tr>
                                    <td>{{ $detail->id}}</td>
                                    <td>{{ $detail->username}}</td>
                                    <td>{{ $detail->animal}}</td>
                                    <td>{{ $detail->is_times ? '10%' : '5%' }}</td>
                                    <td>{{ $detail->jam }}</td>
                                    <td>{{ $detail->doe_date }}</td>                       
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                
            </table>

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










