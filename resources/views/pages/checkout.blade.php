@extends('layouts.checkout')
@section('title', 'CheckOut Doctor')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
      <div class="container">
        <div class="row">
          <div class="col p-0 pl-3 pl-lg-0">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                  Paket Groming
                </li>
                <li class="breadcrumb-item" aria-current="page">
                  Details
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Checkout
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details mb-3">
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              <h1>Siap melakukan boking groming</h1>
              <p>
               {{ $item->groming_package->title}}
              </p>
              <div class="attendee">
                <table class="table table-responsive-sm text-center">
                  <thead>
                    <tr>
                      <td>Picture</td>
                      <td>Name</td>
                      <td>hewan</td>
                      <td>Diskon</td>
                      <td>tanggal</td>
                      <td></td>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($item->details as $detail)
                   <tr>
                    <td>
                      <img
                        src="https://ui-avatars.com/api/?name={{ $detail->username}}"
                        height="60" class="rounded-cicle"/>
                    </td>
                    <td class="align-middle">
                      {{ $detail->username}}
                    </td>
                    <td class="align-middle">
                      {{$detail->animal}}
                    </td>
                    <td class="align-middle">
                      {{ $detail->is_times ? '10%' : '5%'}}
                    </td>
                    
                    <td class="align-middle">
                      {{\Carbon\Carbon::createFromDate($detail->doe_date) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}
                    </td>
                    <td class="align-middle">
                    <a href="{{ route('checkout-remove', $detail->id)}}">
                    <img src="{{url('frontend/images/ic_remove.png')}}" alt="" />
                      </a>
                    </td>
                  </tr>
                   @empty
                       <tr>
                         <td colspan="6" class="text-center">
                           No Groming
                         </td>
                       </tr>
                   @endforelse
                    
                  </tbody>
                </table>
              </div>
              <div class="member mt-3">
                <h2>tambah hewan groming</h2>
              <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id )}}">
                @csrf
                  <label class="sr-only" for="username">Name</label>
                  <input
                    type="text"
                    name="username"
                    class="form-control mb-2 mr-sm-2"
                    id="username"
                    placeholder="nama hewan"
                    required
                  />


                  <label class="sr-only" for="animal">jenis</label>
                  <input
                    type="text"
                    name="animal"
                    class="form-control mb-2 mr-sm-2"
                    style="width: 110px"
                    required
                    id="animal"
                    placeholder="jenis hewan"
                  />

                  <label
                    class="sr-only"
                    class="mr-2"
                    for="inlineFormCustomSelectPref"
                    >Diskon</label
                  >
                  <select
                    class="custom-select mb-2 mr-sm-2"
                    id="is_times"
                    name="is_times"
                    required
                  >
                    <option selected value="">Diskon</option>
                    <option value="1">10%</option>
                    <option value="0">5%</option>
                  </select>

                  <label class="sr-only" for="doe_date"
                    >tanggal boking </label
                  >
                  <div class="input-group mb-2 mr-sm-2">
                    <input
                      type="text"
                      class="form-control datepicker"
                      id="doe_date"
                      name="doe_date"
                      placeholder="tangal boking"
                    />
                  </div>

                  <div class="input-group mb-2 mr-sm-2">
                    <input
                      type="time"
                      id="jam"
                      name="jam"
                      placeholder="jam boking"
                    />
                  </div>
                  
                  <button type="submit" class="btn btn-add-now mb-2 px-4">
                    Add Now
                  </button>
                </form>
                <h3 class="mt-2 mb-0">Note</h3>
                <p class="disclaimer mb-0">
                  pastikan anda sudah transfer ke rekening yang sudah tertera di sini.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>transaksi groming</h2>
              <table class="trip-informations">
                <tr>
                  <th width="50%">total hewan</th>
                <td width="50%" class="text-right">{{ $item->details->count() }} hewan</td>
                </tr>
                <tr>
                  <th width="50%">tanggal boking</th>
                <td width="50%" class="text-right"> {{ $detail->doe_date }} </td>
                </tr>
                <tr>
                  <th width="50%">jam boking</th>
                <td width="50%" class="text-right"> {{ $detail->jam }} </td>
                </tr>
                <tr>
                  <th width="50%">harga groming</th>
                <td width="50%" class="text-right">{{$item->groming_package->price}} / hewan</td>
                </tr>
                <tr>
                  <th width="50%">status harga</th>
                  <td width="50%" class="text-right"> {{ $item->transaction_total }}</td>
                </tr>
                <tr>
                  <th width="50%">Total Semua</th>
                  <td width="50%" class="text-right text-total">
                  <span class="text-blue">{{ $item->transaction_total}}</span
                    ><span class="text-orange"> rupiah</span>
                  </td>
                </tr>
              </table>

              <hr />
              <h2>Payment intruksi</h2>
              <p class="payment-instructions">
                tolong selesaikan pembayaran sebelum memulai melakukan groming, trima kasih
              </p>
              <div class="bank">
                <div class="bank-item pb-3">
                  <img
                    src="{{url('frontend/images/ic_bank.png')}}"
                    alt=""
                    class="bank-image"
                  />
                  <div class="description">
                    <h3>PT PETSHOP ID</h3>
                    <p>
                      0881 8829 8800
                      <br />
                      Bank Central Asia
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="bank-item">
                  <img
                    src="{{url('frontend/images/ic_bank.png')}}"
                    alt=""
                    class="bank-image"
                  />
                  <div class="description">
                    <h3>KHAIRUL LUTFI</h3>
                    <p>
                      0899 8501 7888
                      <br />
                      Bank HSBC
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="join-container">
              <a
                href="{{ route('checkout-success', $item->id)}}"
                class="btn btn-block btn-join-now mt-3 py-2"
                >I Have Made Payment</a>
            </div>
            <div class="text-center mt-3">
            <a href="{{ route('detail', $item->groming_package->slug)}}" class="text-muted">Cancel Booking</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url ('frontend/libraries/gijgo/css/gijgo.min.css')}}" />
@endpush

@push('addon-script')
<script src="{{url ('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
      icons: {
        rightIcon: '<img src="{{url ('frontend/images/ic_doe.png')}}" alt="" />'
      }
    });
  });
</script>
@endpush
