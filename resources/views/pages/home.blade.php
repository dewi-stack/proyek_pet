@extends('layouts.app')

@section('title')
    Petshop
@endsection

@section('content')
<!-- header -->
<header class="text-center">
  <h1>
    Selamat datang di aplikasi
    <br />
    Petshop
  </h1>
  <p class="mt-3">
    Semoga dapat membantu anda
    <br />
    yang mempunyai hewan peliharan
  </p>
  <a href="#popular" class="btn btn-get-started px-4 mt-4">
    Get Start
  </a>
</header>


<main>
  <div class="container">
    <section class="section-stats row justify-content-center" id="stats">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Members</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>adobsi</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>3K</h2>
        <p>boking</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>
  <section class="section-popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading" id="popular">
          <h2>Deart Pets Bekasi</h2>
          <p>
            melayani boking groming dan dokter,
            <br />
            adobsi hewan
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="section-popular-content" id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">
        @foreach ($items as $item)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
        style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}')">
        <div class="travel-country">{{$item->location}}</div>
        <div class="travel-location">{{$item->title}}</div>
            <div class="travel-button mt-auto">
              <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                View Details
              </a>
            </div>
          </div>
        </div>
        @endforeach

        @forelse ($genres as $genre)

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
        style="background-image: url('{{ $genre->gallery->count() ? Storage::url($genre->gallery->first()->image) : ''}}')">
        <div class="travel-country">{{$genre->location}}</div>
        <div class="travel-location">{{$genre->title}}</div>
            <div class="travel-button mt-auto">
              <a href="{{route('detail-doctor', $genre->slug)}}" class="btn btn-travel-details px-4">
                View Details
              </a>
            </div>
          </div>
        </div>
        @endforeach


        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
            style="background-image: url({{url('frontend/images/travel-3.jpg')}});">
            <div class="travel-country">Adobsi</div>
            <div class="travel-location">DearPets Bekasi</div>
            <div class="travel-button mt-auto">
              <a href="{{route('adobsi')}}" class="btn btn-travel-details px-4">
                View Details
              </a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
            style="background-image: url({{url('frontend/images/travel-4.jpg')}});">
            <div class="travel-country">Konsultasi Dokter</div>
            <div class="travel-location">DearPets Bekasi</div>
            <div class="travel-button mt-auto">
              <a href="{{route('chat')}}" class="btn btn-travel-details px-4">
                View Details
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-testimonials-heading" id="testimonialsHeading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>Mereka mengasih tau kita</h2>
          <p>
            momen rawat hewan 
            <br />
            didear pets ini
          </p>
        </div>
      </div>
    </div>
  </section>
  <section class="section-testimonials-content" id="testimonialsContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center match-height">
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/avatar-1.png" alt="" class="mb-4 rounded-circle" />
              <h3 class="mb-4">khairul lutfi</h3>
              <p class="testimonials">
                “ sangat puas dengan pelayanannya “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">Petshop ku</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/avatar-2.png" alt="" class="mb-4 rounded-circle" />
              <h3 class="mb-4">Shayna</h3>
              <p class="testimonials">
                “ sangat ramah pelayanannya, jadi seneng deh ... “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">dokter groming</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content mb-auto">
              <img src="frontend/images/avatar-3.png" alt="" class="mb-4 rounded-circle" />
              <h3 class="mb-4">Shabrina</h3>
              <p class="testimonials">
                “ gak pernah kecewa dalam pelayanannya hehe ..  “
              </p>
            </div>
            <hr />
            <p class="trip-to mt-2">terima kasih</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
            I Need Help
          </a>
          <a href="#" class="btn btn-get-started px-4 mt-4 mx-1">
            Get Started
          </a>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection