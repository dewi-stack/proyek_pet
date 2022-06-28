@extends('layouts.app')
@section('title', 'petshop')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bukti Transfer</h1>   
                    </div>
                <form action="{{ route('transaksi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <label>masukkan id boking anda</label>
                    <select name="transfer_id" class="form-control">
                    @foreach ($transfer as $transfers)
                    <option value="{{ $transfers->id}}">{{ $transfers->id}}</option>    
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control"  name="image" placeholder="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" name="bank" placeholder="bank" value="{{old('bank')}}">
                </div>
                
                
                <div class="form-group">
                    <label for="nama">nama pemilik</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama account bank" value="{{old('nama')}}">
                </div>
             
        
                <div class="form-group">
                    <label for="nomor">nomor akun bank</label>
                    <input type="text" class="form-control" name="nomor" placeholder="nomor account bank" value="{{old('nomor')}}">
                </div>

                <div class="form-group">
                    <label for="total">Total Transfer</label>
                    <input type="text" class="form-control" name="total" placeholder="nomor account bank" value="{{old('total')}}">
                </div>
            
                <button type="submit" class="btn btn-primary btn-block">
                    simpan
                </button>      
                
                </form>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection

<script src="jquery.min.js"></script>
<script src="jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        // Format mata uang.
        $( '.uang' ).mask('000.000.000', {reverse: true});

    })
</script>










