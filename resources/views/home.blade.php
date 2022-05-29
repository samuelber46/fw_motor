@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .card-img-top{
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


@endsection
