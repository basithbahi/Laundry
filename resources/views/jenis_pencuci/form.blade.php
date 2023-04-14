@extends('layouts.app')

@section('title', 'Form Jenis Pencuci')

@section('contents')
  <form action="{{ isset($jenis_pencuci) ? route('jenis_pencuci.tambah.update', $jenis_pencuci->id) : route('jenis_pencuci.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($jenis_pencuci) ? 'Form Edit Jenis Pencuci' : 'Form Tambah Jenis Pencuci' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_jenis_pencuci">ID Jenis Pencuci</label>
              <input type="text" class="form-control" id="id_jenis_pencuci" name="id_jenis_pencuci" value="{{ isset($jenis_pencuci) ? $jenis_pencuci->id_jenis_pencuci : '' }}">
            </div>
            <div class="form-group">
                <label for="jenis_pencuci">Jenis Pencuci</label>
                <select class="form-control" id="jenis_pencuci" name="jenis_pencuci">
                  <option value="">-- Pilih Jenis Pencuci --</option>
                  <option value="Detergen + Pewangi" {{ isset($jenis_pencuci) && $jenis_pencuci->jenis_pencuci == 'Detergen + Pewangi' ? 'selected' : '' }}>Detergen + Pewangi</option>
                  <option value="Detergen" {{ isset($jenis_pencuci) && $jenis_pencuci->jenis_pencuci == 'Detergen' ? 'selected' : '' }}>Detergen</option>
                  <option value="Bleach" {{ isset($jenis_pencuci) && $jenis_pencuci->jenis_pencuci == 'Bleach' ? 'selected' : '' }}>Bleach</option>
                </select>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($jenis_pencuci) ? $jenis_pencuci->harga : '' }}">
              </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
