@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">detail transaksi {{ $genre->user->name}}</h1>   
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
                        <td>{{ $genre->id}}</td>
                    </tr>
                    <tr>
                        <th>Paket Doctor</th>
                        <td>{{ $genre->doctor_package->title}}</td>
                    </tr>

                    <tr>
                        <th>user</th>
                        <td>{{ $genre->user->name}}</td>
                    </tr>

                    <tr>
                        <th>Jenis </th>
                        <td>{{ $genre->type_doctor}}</td>
                    </tr>

                    <tr>
                        <th>Total transaksi </th>
                        <td>{{ $genre->transaction_total}}</td>
                    </tr>

                    <tr>
                        <th>status transaksi </th>
                        <td>{{ $genre->transaction_status}}</td>
                    </tr>
                    <tr>
                        <th>hewan boking</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>nama</th>
                                    <th>tipe berobat</th>
                                    <th>tipe dokter</th>
                                    <th>tipe hewan</th>
                                    <th>waktu</th>
                                    <th>tanggal</th>
                                </tr>
                                @foreach ($genre->details as $detail)
                                    <tr>
                                    <td>{{ $detail->id}}</td>
                                    <td>{{ $detail->username}}</td>
                                    <td>{{ $detail->genre}}</td>
                                    <td>{{ $detail->animal}}</td>
                                    <td>{{ $detail->is_times ? 'bu dian' : 'pak lutfi' }}</td>
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
