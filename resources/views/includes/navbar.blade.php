<!-- Semantic elements -->
<!-- https://www.w3schools.com/html/html5_semantic_elements.asp -->

<!-- Bootstrap navbar example -->
<!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->

<!-- Navbars -->
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{url ('frontend/images/logo.png')}}" alt="" />
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item mx-md-2">
          <a class="nav-link active" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item mx-md-2">
          <a class="nav-link" href="#popular">Menu </a>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           halo, {{ Auth::user()->name }}
          </a>
       
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Profil</a>
          <a class="dropdown-item" href="#">Edit profil</a>
        <a class="dropdown-item" href="{{route('transaksi.index')}}">Transaksi saya</a>
        </div>
        
        </li>
        @endauth

        <li class="nav-item mx-md-2">
          <a class="nav-link" href="#">Testimonial</a>
        </li>
      </ul>

      @guest
           <!-- Mobile button -->
      <form class="form-inline d-sm-block d-md-none">
       
      <button class="btn btn-login my-2 my-sm-0" type="button" onclick="event.preventDefault(); location.href='{{url('login')}}';" >
           Masuk
         </button>
       </form>
       <!-- Desktop Button -->
     <form class="form-inline my-2 my-lg-0 d-none d-md-block">
      
     <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{url('admin')}}';">
           Masuk
         </button>
       </form>
      @endguest

     @auth
          <!-- Mobile button -->
      <form class="form-inline d-sm-block d-md-none" action="{{ url('logout')}}"  method="POST">
        @csrf
         <button class="btn btn-login my-2 my-sm-0"type="submit">
           keluar
         </button>
       </form>
       <!-- Desktop Button -->
     <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout')}}"  method="POST">
       @csrf
         <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
           keluar
         </button>
       </form>
     @endauth
    </div>
  </nav>
</div>