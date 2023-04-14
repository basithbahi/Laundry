@extends('layouts.app')

@section('title', 'Form Metode Pembayaran')

@section('contents')
  <form action="{{ isset($metode_pembayaran) ? route('metode_pembayaran.tambah.update', $metode_pembayaran->id) : route('metode_pembayaran.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($metode_pembayaran) ? 'Form Edit Metode Pembayaran' : 'Form Tambah Metode Pembayaran' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_metode_pembayaran">ID Metode Pembayaran</label>
              <input type="text" class="form-control" id="id_metode_pembayaran" name="id_metode_pembayaran" value="{{ isset($metode_pembayaran) ? $metode_pembayaran->id_metode_pembayaran : '' }}">
            </div>
            <div class="form-group">
              <label for="metode_pembayaran">Metode Pembayaran</label>
              <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran" value="{{ isset($metode_pembayaran) ? $metode_pembayaran->metode_pembayaran : '' }}">
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
