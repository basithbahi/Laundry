@extends('layouts.app')

@section('title', 'Data Metode Pembayaran')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('metode_pembayaran.search') }}" method="GET">
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
      <a href="{{ route('metode_pembayaran.tambah') }}" class="btn btn-primary mb-3">Tambah Metode Pembayaran</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>ID Metode Pembayaran</th>
              <th>Metode Pembayaran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($metode_pembayaran as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->id_metode_pembayaran }}</td>
                <td>{{ $row->metode_pembayaran }}</td>
                <td>
                  <a href="{{ route('metode_pembayaran.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                  <a href="{{ route('metode_pembayaran.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
