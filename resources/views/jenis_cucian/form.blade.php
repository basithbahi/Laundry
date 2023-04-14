@extends('layouts.app')

@section('title', 'Form Jenis Pencuci')

@section('contents')
  <form action="{{ isset($jenis_cucian) ? route('jenis_cucian.tambah.update', $jenis_cucian->id) : route('jenis_cucian.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($jenis_cucian) ? 'Form Edit Jenis Cucian' : 'Form Tambah Jenis Cucian' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_jenis_cucian">ID Jenis Cucian</label>
              <input type="text" class="form-control" id="id_jenis_cucian" name="id_jenis_cucian" value="{{ isset($jenis_cucian) ? $jenis_cucian->id_jenis_cucian : '' }}">
            </div>
            <div class="form-group">
                <label for="jenis_cucian">Jenis Pencuci</label>
                <select class="form-control" id="jenis_cucian" name="jenis_cucian">
                  <option value="">-- Pilih Jenis Cucian --</option>
                  <option value="Selimut" {{ isset($jenis_cucian) && $jenis_cucian->jenis_cucian == 'Selimut' ? 'selected' : '' }}>Selimut</option>
                  <option value="Pakaian" {{ isset($jenis_cucian) && $jenis_cucian->jenis_cucian == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                  <option value="Sprai" {{ isset($jenis_cucian) && $jenis_cucian->jenis_cucian == 'Sprai' ? 'selected' : '' }}>Sprai</option>
                </select>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($jenis_cucian) ? $jenis_cucian->harga : '' }}">
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
