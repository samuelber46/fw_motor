@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<style>
    .card-img-top{
        width: 100%;
        height: 15vw;
        object-fit: contain;
        padding: 10px;
    }
</style>
@section('content')

<div class="container keterangan" >
    <div class="row d-flex align-items-center">
        <div class="col-md-7" data-aos="zoom-in-up" data-aos-duration="1000">
            <img class="img-fluid gambar" src="{{ url('images') }}/motor_keren3.png" alt="">
        </div>
        <div class="col-md-5" data-aos="zoom-in-up" data-aos-duration="1000">
            <img class="logo" src="{{ url('images') }}/logo_green.png" alt="">
            <h3><span>Wujudkan</span> kendaraan impianmu bersama <span>FW MOTORS</span></h3>
            <p>Dapatkan berbagai kendaraan terbaik dengan penawaran yang menarik </p>
        </div>
    </div>
</div>

<div class="container quote" >
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5"data-aos="fade-down-right" data-aos-duration="1000">
            <h3>FW <br> Motors</h3>
        </div>
        <div class="col-md-6"data-aos="fade-down-left" data-aos-duration="1000">
            <h5>Solusi Impian Berkendara</h5>
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
                <img src="{{url('uploads')}}/{{$motor->image}}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $motor->nama_motor }}</h5>
                    <p>{{ $motor->silinder }}</p>
                    <p style="color: #00C569"><strong>Rp.{{ number_format($motor->harga) }}</strong></p>
                    <p class="card-text">{{$motor->details}}</p>
                    <a href="{{ url('order') }}/{{ $motor->id }}" class="btn btn-success">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $motors->links() }}
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
@endsection
