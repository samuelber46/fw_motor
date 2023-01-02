@extends('layouts.app')

@section('content')
  <div class="card m-5">
    <div class="card-header d-flex justify-content-between align-items-center ">
      <h2>Daftar Motor</h2>
      <a href="{{ route('motor.create') }}" class="btn btn-primary ">Tambah Motor</a>
    </div>
    <div class="card-body">
      @if ($motors->count() > 0)
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th>No</th>
              <th>Nama Motor</th>
              <th>Gambar</th>
              <th>Stok</th>
              <th>Warna</th>
              <th>Silinder</th>
              <th>Transmisi</th>
              <th>Detail</th>
              <th>Harga</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($motors as $motor)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $motor->nama_motor }}</td>
                  <td>
                    <img src="{{ Storage::url($motor->image) }}" width="200" alt="">
                  </td>
                  <td>{{ $motor->stok }}</td>
                  <td>{{ $motor->warna }}</td>
                  <td>{{ $motor->silinder }} CC</td>
                  <td>{{ $motor->transmisi }}</td>
                  <td>{{ $motor->details }}</td>
                  <td>{{ 'Rp.' . number_format($motor->harga) }}</td>
                  <td>
                    {{-- <a href="{{ url('/motor/edit') }}" class="btn btn-sm btn-warning">Edit</a> --}}
                    <form onclick="return confirm('anda yakin data dihapus?');" class="d-inline"
                      action="{{ url('/motor/' . $motor->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger btn-sm">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <h3 class="text-center">Maaf datanya tidak ada :(</h3>
      @endif
    </div>
  </div>
@endsection
