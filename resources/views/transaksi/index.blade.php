@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('transaksi.search') }}" method="GET">
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


    <div class="card-body">
			@if (auth()->user()->level == 'Admin')
      <a href="{{ route('transaksi.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Transaksi</a>
			@endif

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Transaksi</th>
              <th>User</th>
              <th>Jenis Cucian</th>
              <th>Tipe Laundry</th>
              <th>Jenis Pencuci</th>
              <th>Berat Cucian</th>
			    @if (auth()->user()->level == 'Admin')
                    <th>Aksi</th>
				@endif
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($data as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_transaksi }}</td>
                <td>{{ $row->User->nama }}</td>
                <td>{{ $row->JenisCucian->id_jenis_cucian }} - {{ $row->JenisCucian->jenis_cucian }}</td>
                <td>{{ $row->TipeLaundry->id_tipe_laundry }} - {{ $row->TipeLaundry->jenis_cucian }}</td>
                <td>{{ $row->JenisPencuci->id_jenis_pencuci }} - {{ $row->JenisPencuci->jenis_cucian }}</td>
                <td>{{ $row->berat_cucian }}</td>
				@if (auth()->user()->level == 'Admin')
                    <td>
                        <a href="{{ route('transaksi.edit', $row->id) }}" class="btn btn-warning">Edit &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                        <a href="{{ route('transaksi.hapus', $row->id) }}" class="btn btn-danger">Hapus &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
                    </td>
				@endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
