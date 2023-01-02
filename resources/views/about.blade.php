@extends('layouts.app')
<style>
  .card>img {
    float: left;
    width: 260px;
    height: 360px;
    object-fit: cover;
  }
</style>
@section('content')
  <div class="row text-center mb-3">
    <div class="col">
      <h2 style="letter-spacing: 10px; text-transform:uppercase;color:#a1a1a1">Meet Our Team</h2>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <img src="images/Assyifa Khalif2.jpg" class="card-img-top" alt="assyifa">
          <div class="card-body">
            <h5 class="card-title">ASSYIFA KHALIF</h5>
            <p class="card-text">2010631170058 | 5B Informatika</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/2010631170064.jpg" alt="diki">
          <div class="card-body">
            <h5 class="card-title text-truncate">Diki Candra Permana Yuda</h5>
            <p class="card-text">2010631170064 | 5B Informatika</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/2010631170065.jpg" class="card-img-top" alt="elvin">
          <div class="card-body">
            <h5 class="card-title">Elvin Alan Pratama</h5>
            <p class="card-text">2010631170065 | 5B Informatika</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <img src="images/2010631170119.png" class="card-img-top" alt="samuel">
          <div class="card-body">
            <h5 class="card-title">Samuel Beryl Enrico R.</h5>
            <p class="card-text">2010631170119 | 5B Informatika</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
