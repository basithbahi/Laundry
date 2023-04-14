@extends('layouts.app')

@section('title', 'Form Tipe Laundry')

@section('contents')
  <form action="{{ isset($tipe_laundry) ? route('tipe_laundry.tambah.update', $tipe_laundry->id) : route('tipe_laundry.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($tipe_laundry) ? 'Form Edit Tipe Laundry' : 'Form Tambah Tipe Laundry ' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_tipe_laundry">ID Tipe Laundry</label>
              <input type="text" class="form-control" id="id_tipe_laundry" name="id_tipe_laundry" value="{{ isset($tipe_laundry) ? $tipe_laundry->id_tipe_laundry : '' }}">
            </div>
            <div class="form-group">
                <label for="tipe_laundry">Tipe Laundry</label>
                <select class="form-control" id="tipe_laundry" name="tipe_laundry">
                  <option value="">-- Pilih Tipe Laundry --</option>
                  <option value="Cuci Basah" {{ isset($tipe_laundry) && $tipe_laundry->tipe_laundry == 'Cuci Basah' ? 'selected' : '' }}>Cuci Basah</option>
                  <option value="Cuci Kering" {{ isset($tipe_laundry) && $tipe_laundry->tipe_laundry == 'Cuci Kering' ? 'selected' : '' }}>Cuci Kering</option>
                  <option value="Cuci Setrika" {{ isset($tipe_laundry) && $tipe_laundry->tipe_laundry == 'Cuci Setrika' ? 'selected' : '' }}>Cuci Setrika</option>
                </select>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($tipe_laundry) ? $tipe_laundry->harga : '' }}">
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
