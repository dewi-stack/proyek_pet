@extends('layouts.app')
@section('title', 'Boking Dokter')



@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
      <div class="container">
        <div class="row">
          <div class="col p-0 pl-3 pl-lg-0"">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                  Paket Petshope
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
            <h1>{{$genre->title}}</h1>
              <p>
                {{ $genre->location}}
              </p>
              @if ($genre->gallery->count())
              <div class="gallery">
                <div class="xzoom-container">
                  <img
                    class="xzoom"
                    id="xzoom-default"
                    src="{{ Storage::url($genre->gallery->first()->image)}}"
                    xoriginal="{{ Storage::url($genre->gallery->first()->image)}}"
                  />
                  <div class="xzoom-thumbs">
                    @foreach ($genre->gallery as $gallerys)
                    <a href="{{ Storage::url($gallerys->image)}}"
                    ><img
                      class="xzoom-gallery"
                      width="128"
                      src="{{ Storage::url($gallerys->image)}}"
                      xpreview="{{ Storage::url($gallerys->image)}}"/>
                    </a>
          
                    @endforeach
                  </div>
                </div>
              </div>
                  
              @endif

                <h2>Tentang Boking Dokter</h2>
                <p>
                  {!! $genre->about !!}
                </p>
            
                <div class="features row pt-3">
                  <div class="col-md-4">
                    <img
                      src="{{url('frontend/images/ic_event.png')}}"
                      alt=""
                      class="features-image"
                    />
                    <div class="description">
                      <h3>discont</h3>
                    <p>{{$genre->discount}}</p>
                    </div>
                  </div>
                  <div class="col-md-4 border-left">
                    <img
                  src="{{url('frontend/images/ic_bahasa.png')}}"
                      alt=""
                      class="features-image"
                    />
                    <div class="description">
                      <h3>tipe menu dokter</h3>
                      <p>{{$genre->type_doctor}}</p>
                    </div>
                  </div>
                  <div class="col-md-4 border-left">
                    <img
                  src="{{url('frontend/images/ic_foods.png')}}"
                      alt=""
                      class="features-image"
                    />
                    <div class="description">
                      <h3>melayani</h3>
                      <p>{{$genre->type_menu}} </p>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
          
              <hr />
              <h2>boking dokter informasi</h2>
              <table class="trip-informations">
                <tr>
                  <th width="50%">tanggal dokter</th>
                  <td width="50%" class="text-right">{{$genre->date_doctor}}</td>
                </tr>
                <tr>
                  <th width="50%">jam buka dokter</th>
                  <td width="50%" class="text-right">{{$genre->times}} sampai tutup</td>
                </tr>
                <tr>
                  <th width="50%">tipe hewan</th>
                  <td width="50%" class="text-right">{{$genre->type_doctor}}</td>
                </tr>
              

                <tr>
                  <th width="50%">harga</th>
                  <td width="50%" class="text-right">{{$genre->price}}/hewan</td>
                </tr>
              </table>
            </div>

            <div class="join-container">
            @auth
            <form action="{{ route('checkout-process-doctor', $genre->id)}}" method="post">
                  @csrf
                  <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                    join now
                  </button>
                </form>
            @endauth
            @guest
              <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                Login or Register to join
              </a>         
            @endguest
          </div>

          </div>
        </div>
      </div>
    </section>
</main>
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





