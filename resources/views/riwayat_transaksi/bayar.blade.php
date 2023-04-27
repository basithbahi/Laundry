@extends('layouts.app')

@section('title', 'Form Bayar')

@section('contents')

    <form
        action="{{ isset($transaksi) ? route('riwayat_transaksi.tambah.update', $transaksi->id) : route('riwayat_transaksi.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($transaksi) ? 'Form Edit Transaksi' : 'Form Tambah Transaksi' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_riwayat_transaksi">ID Riwayat Transaksi</label>
                            <input type="text" class="form-control" id="id_riwayat_transaksi"
                                name="id_riwayat_transaksi">
                        </div>
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                                value="{{ isset($transaksi) ? $transaksi->id_transaksi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="id_user">User</label>
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
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            @php
                                $harga_jenis_cucian = isset($transaksi) ? $transaksi->jenis_cucian->harga : 0;
                                $harga_tipe_laundry = isset($transaksi) ? $transaksi->tipe_laundry->harga : 0;
                                $harga_jenis_pencuci = isset($transaksi) ? $transaksi->jenis_pencuci->harga : 0;
                                $berat_cucian = isset($transaksi) ? $transaksi->berat_cucian : 0;
                                $total_harga = $berat_cucian * $harga_jenis_cucian + $berat_cucian * $harga_tipe_laundry + $berat_cucian * $harga_jenis_pencuci;
                            @endphp
                            <input type="text" class="form-control" id="total_harga" name="total_harga"
                                value="Rp{{ number_format($total_harga) }}">
                        </div>
                        <div class="form-group">
                            <label for="id_total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="id_total_bayar" name="id_total_bayar">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"
                            onclick="
                                if (document.getElementById('id_total_bayar').value < {{ $total_harga }}) {
                                    alert('Pembayaran Kurang!');
                                } else {
                                    alert('Pembayaran Berhasil!');
                                    window.location.href = '{{ route('riwayat_transaksi.index') }}';
                                }
                            ">
                            Bayar
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
