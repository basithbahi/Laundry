@extends('layouts.app')

@section('title', 'Data Riwayat Transaksi')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('riwayat_transaksi.search') }}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="query" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            @if (auth()->user()->level == 'Admin')
            <tr>
              <th>No</th>
              <th>ID Riwayat Transaksi</th>
              <th>ID Transaksi</th>
              <th>ID Metode Pembayaran</th>
              <th>Total Harga</th>
              <th>Total Bayar</th>
              <th>Aksi</th>
				@endif
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_riwayat_transaksi }}</td>
                <td>{{ $row->id_transaksi}}</td>
                <td>{{ $row->id_metode_pembayaran}}</td>
                <td>Rp{{ number_format(($row->berat_cucian * $row->jenis_cucian->harga) + ($row->berat_cucian * $row->tipe_laundry->harga) + ($row->berat_cucian * $row->jenis_pencuci->harga)) }}</td>
                <td>{{ $row->total_bayar}}</td>
              @if (auth()->user()->level == 'Admin')
                    <td>
                        <a href="{{ route('riwayat_transaksi.hapus', $row->id) }}" class="btn btn-danger">Hapus</i></a>
                        <a href="{{ route('riwayat_transaksi.bayar', $row->id) }}" class="btn btn-info">Bayar</i></a>
                    </td>
				@endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
