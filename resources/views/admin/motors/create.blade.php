@extends('layouts.app')

@section('content')
  <div class="card m-5">
    <div class="card-header">
      <h2>Tambah Motor</h2>
    </div>
    <div class="card-body">
      <form action="{{ url('/motor') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="nama_motor">Nama Motor <span style="color:red">*</span></label>
          <input required type="text" name="nama_motor" id="nama_motor" class="form-control"
            value="{{ old('nama_mobil') }}">
        </div>
        <div class="form-group mb-3">
          <label for="harga">Harga <span style="color:red">*</span></label>
          <input required type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
        </div>
        <div class="form-group mb-3">
          <label for="stok">Stok <span style="color:red">*</span></label>
          <input required type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}">
        </div>
        <div class="form-group mb-3">
          <label for="silinder">Silinder (CC) <span style="color:red">*</span></label>
          <input required type="number" name="silinder" id="silinder" class="form-control"
            value="{{ old('silinder') }}">
        </div>
        <div class="form-group mb-3">
          <label for="warna">Warna Motor <span style="color:red">*</span></label>
          <input required style="width:100px" type="color" name="warna" id="warna" class="form-control"
            value="{{ old('warna') }}">
        </div>
        <div class="form-group mb-3">
          <label for="transmisi">Transmisi <span style="color:red">*</span></label>
          <select name="transmisi" id="transmisi" class="form-control">
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="details">Detail</label>
          <textarea name="details" id="details" cols="30" rows="5" class="form-control">{{ old('details') }}</textarea>
        </div>
        <div class="form-group mb-3">
          <label for="image">Gambar Motor <span style="color:red">*</span></label>
          <input required type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
  </div>
@endsection
