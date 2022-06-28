@extends('layouts.app')
@section('title', 'Boking Groming')



@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page">
      Adobsi Hewan
    </li>
    <li class="breadcrumb-item " aria-current="page">
      Details
    </li>
  </ol>
</nav>
    <div class="row">
      @foreach ($items as $item)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="{{ Storage::url($item->image) }}" 
            style="overflow: hidden; padding: 0;"  alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">{{ $item->nama }}</a>
            </h4>
            <h5>{{ $item->email }}</h5>
            <p class="card-text">{{ $item->deskripsi }}</p>

            <p class="card-text">alamat :  {{ $item->alamat }}</p>
          </div>
          <div class="card-footer">
            <h5>{{ $item->jenis }}</h2>
          </div>
        </div>
      </div>
      @endforeach
        </div>



@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/dist/xzoom.css')}}" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/dist/xzoom.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 500,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
@endpush





