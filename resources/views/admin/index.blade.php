@extends('layouts.app')

@section('title', 'Data Admin')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <form action="{{ route('admin.search') }}" method="GET">
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
        <a href="{{ route('admin.tambah') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Admin</a>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>TTL</th>
              <th>JK</th>
              <th>Email</th>
              <th>Password</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($admin as $row)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->ttl }}</td>
                <td>{{ $row->jk }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->password }}</td>
                <td>
                    <a href="{{ route('admin.edit', $row->id) }}" class="btn btn-warning">Edit &nbsp;&nbsp;&nbsp;<i class="fas fa-pen"></i></a>
                    <a href="{{ route('admin.hapus', $row->id) }}" class="btn btn-danger">Hapus &nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt "></i></a>
            </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
