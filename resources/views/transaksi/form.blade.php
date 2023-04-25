@extends('layouts.app')

@section('title', 'Form Gerbong')

@section('contents')

    <form
        action="{{ isset($transaksi) ? route('transaksi.tambah.update', $transaksi->id) : route('transaksi.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($transaksi) ? 'Form Edit Gerbong' : 'Form Tambah Gerbong' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                                value="{{ isset($transaksi) ? $transaksi->id_transaksi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="id_user">Rute</label>
                            <select name="id_user" id="id_user" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih User--</option>
                                @foreach ($user as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_user == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_cucian">Jenis Cucian</label>
                            <select name="id_jenis_cucian" id="id_jenis_cucian" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jenis Cucian --</option>
                                @foreach ($jenis_cucian as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_jenis_cucian == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->jenis_cucian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_tipe_laundry">Tipe Laundry</label>
                            <select name="id_tipe_laundry" id="id_tipe_laundry" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Tipe Laundry --</option>
                                @foreach ($tipe_laundry as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_tipe_laundry == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->tipe_laundry }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_pencuci">Jenis Pencuci</label>
                            <select name="id_jenis_pencuci" id="id_jenis_pencuci" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Jenis Pencuci --</option>
                                @foreach ($jenis_pencuci as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_jenis_pencuci == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->jenis_pencuci }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berat_cucian">Berat Cucian (Kg)</label>
                            <input type="text" class="form-control" id="berat_cucian" name="berat_cucian"
                                value="{{ isset($transaksi) ? $transaksi->berat_cucian : '' }}">
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
