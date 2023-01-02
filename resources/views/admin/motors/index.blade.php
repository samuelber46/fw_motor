@extends('layouts.app')

@section('content')
  <div class="card ">
    <div class="card-header d-flex justify-content-between align-items-center ">
      <h3>Daftar Motor</h3>
      <a href="{{ route('motor.create') }}" class="btn btn-primary ">Tambah Motor</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
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
            @forelse ($motors as $motor)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $motor->nama_motor }}</td>
                <td>
                  <img src="{{ Storage::url($motor->image) }}" width="200" alt="">
                </td>
                <td>{{ $motor->stok }}</td>
                <td>{{ $motor->warna }}</td>
                <td>{{ $motor->silinder }}</td>
                <td>{{ $motor->transmisi }}</td>
                <td>{{ $motor->detail }}</td>
                <td>{{ $motor->harga }}</td>
                <td>
                  <a href="#" class="btn btn-sm btn-warning">Edit</a>
                  <form onclick="return confirm('anda yakin data dihapus?');" class="d-inline" action="#"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
