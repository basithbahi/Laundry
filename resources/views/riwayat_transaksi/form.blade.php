@extends('layouts.app')

@section('title', 'Form Riwayat Transaksi')

@section('contents')

    <form
        action="{{ isset($riwayat_transaksi) ? route('riwayat_transaksi.tambah.update', $riwayat_transaksi->id) : route('riwayat_transaksi.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($riwayat_transaksi) ? 'Form Edit riwayat_transaksi' : 'Form Tambah riwayat_transaksi' }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_riwayat_transaksi">ID Riwayat Transaksi</label>
                            <input type="text" class="form-control" id="id_riwayat_transaksi" name="id_riwayat_transaksi"
                                value="{{ isset($transaksi) ? $transaksi->id_riwayat_transaksi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="id_transaksi">ID Transaksi</label>
                            <input type="text" class="form-control" id="id_transaksi" name="id_transaksi"
                                value="{{ isset($transaksi) ? $transaksi->id_transaksi : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="id_metode_pembayaran">Metode Pembayaran</label>
                            <select name="id_metode_pembayaran" id="id_metode_pembayaran" class="custom-select">
                                <option value="" selected disabled hidden>-- Pilih Metode Pembayaran --</option>
                                @foreach ($metode_pembayaran as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($transaksi) ? ($transaksi->id_metode_pembayaran == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->metode_pembayaran }}
                                    </option>
                                @endforeach
                            </select>
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
                            <label for="total_bayar">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar"
                                value="{{ isset($transaksi) ? $transaksi->total_bayar : '' }}">
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
