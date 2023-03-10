@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 align="center">Cart</h3>
                </div>
                <div class="car-body">
                    <table class="table table-border text-center mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama Motor</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @if (!empty($orderDetails))
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ url('uploads') }}/{{ $orderDetail->motor->image }}" width="100"></td>
                                <td>{{ $orderDetail->motor->nama_motor }}</td>
                                <td>{{ $orderDetail->jumlah }}</td>
                                <td>Rp. {{ number_format($orderDetail->motor->harga) }}</td>
                                <td>Rp. {{ number_format($orderDetail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('removecart') }}/{{ $orderDetail->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Anda yakin ingin menghapus pesanan?');" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"></td>
                                <td><strong>Rp. {{ number_format($order->jumlah_harga) }}<strong></td>
                                <td>
                                    <a href="{{ url('confirm_checkout') }}" class="btn btn-success d-inline-flex align-self-center" onclick="return confirm('Anda yakin ingin melanjutkan pembayaran?');"><i class="material-icons">shopping_cart</i> Checkout</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection