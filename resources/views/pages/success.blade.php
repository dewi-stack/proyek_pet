@extends('layouts.success')
@section('title', 'success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
      <div class="col text-center">
        <img src="{{url('frontend/images/ic_mail.png')}}" alt="">
        <h1>Yey, sukses bro</h1>
        <p>
          Silahkan datang ke petshop
          <br />
          Untuk melakukan groming
        </p>
        <a href="{{url ('/')}}" class="btn btn-home-page mt-3 px-5">
          Home Page
        </a>
      </div>
    </div>
  </main>
@endsection


