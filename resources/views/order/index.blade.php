@extends('layouts.app')
<style>
  #rectangle {
    width: 24px;
    height: 24px;
    background: {{ $motor->warna }};
    margin-left: 10px;
    border-radius: 20%;
  }

  .mycustomcard {
    padding: 8px;
    border: 1px solid #EBEBEB;
    border-radius: 20px;
  }
</style>
@section('content')
  <div class="container">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2 align="center">Detail Motor</h2>
        </div>
        <div class="car-body">
          <div class="row">
            <div class="col-md-6 p-5 d-flex align-self-center">
              <img src="{{ Storage::url($motor->image) }}" class="rounded mx-auto d-block" width="80%" alt="">
            </div>
            <div class="col-md-6 p-5">
              <h3><strong>{{ $motor->nama_motor }}</strong></h3>
              <div class="container mt-4">
                <div class="row">
                  <div class="col-md-5 m-2">
                    <div class="mycustomcard d-flex justify-content-around">
                      <h6>Volume</h6>
                      <h6>{{ $motor->silinder }} CC</h6>
                    </div>
                  </div>
                  <div class="col-md-5 m-2">
                    <div class="mycustomcard d-flex justify-content-around">
                      <h6>Transmisi</h6>
                      <h6>{{ $motor->transmisi }}</h6>
                    </div>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-5 m-2">
                    <div class="mycustomcard d-flex justify-content-around">
                      <h6>Stok</h6>
                      <h6>{{ $motor->stok }}</h6>
                    </div>
                  </div>
                  <div class="col-md-5 m-2">
                    <div class="mycustomcard d-flex justify-content-around">
                      <h6>Warna</h6>
                      <div id="rectangle"></div>
                    </div>
                  </div>
                </div>
              </div>
              <p>Detail : <br> {{ $motor->details }}</p>
              <p style="color: green"><strong>Rp.{{ number_format($motor->harga) }}</strong></p>
              <form action="{{ url('order') }}/{{ $motor->id }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah Pesanan</label>
                  <input type="number" name="jumlah" class="form-control" id="jumlah" min="1" required="">
                </div>
                <div class="container mt-5">
                  <div class="row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-success d-inline-flex align-self-center"><i
                          class="material-icons">shopping_cart</i> Add to cart</button>
                    </div>
                    <div class="col-md-6">
                      <a href="{{ url('home') }}" class="btn btn-danger">Back</a>
                      <div>
                      </div>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
