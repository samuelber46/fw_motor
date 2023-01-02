@extends('layouts.app')
<style>
  .explore {
    margin-top: 120px;
  }

  .keterangan {
    margin-top: 40px;
  }

  .keterangan h3 {
    font-size: 72px;
    font-weight: 200;
    text-transform: uppercase;
  }

  .keterangan .gambar {
    width: 480px;
    border-radius: 10%;
  }

  .keterangan .logo {
    width: 100px;
  }


  .keterangan p {
    font-size: 28px;
    font-weight: 200;
    color: #acacac;
  }

  .keterangan h3 span {
    font-weight: 500;
  }

  .quote {
    margin-top: 120px;
  }

  .quote h3 {
    font-size: 48px;
    text-align: right;
    font-weight: 800;
    text-transform: uppercase;
  }

  .quote h5 {
    font-size: 24px;
    text-align: left;
    font-weight: 500;
    color: #00C569;
  }

  .explore hr {
    width: 180px;
    margin: 0 auto;
    align-content: center;
    border: 3px solid black;
  }

  .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: contain;
    padding: 10px;
  }
</style>
@section('content')
  <div class="container keterangan">
    <div class="row d-flex align-items-center">
      <div class="col-md-6">
        <img class="img-fluid gambar" src="{{ url('images') }}/motor_keren.jpg" alt="">
      </div>
      <div class="col-md-5">
        <img class="logo" src="{{ url('images') }}/logo_green.png" alt="">
        <h3>Motornya <span>keren</span> kita pun <span>senang</span></h3>
        <p>Kami menyediakan motor-motor terbaik yang anda inginkan dan apa yang anda butuhkan</p>
      </div>
    </div>
  </div>

  <div class="container quote">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-5">
        <h3>Motosam siap <br> membantu</h3>
      </div>
      <div class="col-md-6">
        <h5>Puaskan keinginan anda berkendara</h5>
      </div>
    </div>
  </div>

  <div class="container explore">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h2 align="center"><strong>Explore</strong></h2>
        <hr>
      </div>
      @foreach ($motors as $motor)
        <div class="col-md-4 mt-5 mb-3 d-flex">
          <div class="card p-3" style="border-radius: 10%">
            <img src="{{ Storage::url($motor->image) }}" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $motor->nama_motor }}</h5>
              <p>{{ $motor->silinder }} CC</p>
              <p style="color: #00C569"><strong>Rp.{{ number_format($motor->harga) }}</strong></p>
              <p class="card-text">{{ $motor->details }}</p>
              @if (Auth::check())
                @if (!Auth::user()->is_admin)
                  <a href="{{ url('order') }}/{{ $motor->id }}" class="btn btn-success">Detail</a>
                @endif
              @else
                <a href="{{ url('order') }}/{{ $motor->id }}" class="btn btn-success">Detail</a>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="d-flex justify-content-center">
    {{ $motors->links() }}
  </div>
@endsection
