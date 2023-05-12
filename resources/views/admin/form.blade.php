@extends('layouts.app')

@section('title', 'Form Admin')

@section('contents')
    <form action="{{ isset($admin) ? route('admin.tambah.update', $admin->id) : route('admin.tambah.simpan') }}"
        method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($admin) ? 'Form Edit Admin' : 'Form Tambah Admin' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ isset($admin) ? $admin->nik : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ isset($admin) ? $admin->nama : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ isset($admin) ? $admin->alamat : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ttl">TTL</label>
                            <input name="ttl" type="date"
                                class="form-control form-control-user @error('ttl')is-invalid @enderror"
                                id="exampleInputTtl" placeholder="Tanggal Lahir"
                                value="{{ isset($admin) ? $admin->ttl : '' }}">
                            @error('ttl')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jk">JK</label>
                            <div class="form-control form-control-user" style="font-size: 14px;">
                                <input class="form-control-input" type="radio" name="jk" id="inlineRadio1"
                                    value="Pria" {{ isset($admin) && $admin->jk == 'Pria' ? 'checked' : '' }}>
                                <label class="form-control-label" for="inlineRadio1">Pria</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-control-input" type="radio" name="jk" id="inlineRadio2"
                                    value="Wanita" {{ isset($admin) && $admin->jk == 'Wanita' ? 'checked' : '' }}>
                                <label class="form-control-label" for="inlineRadio2">Wanita</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ isset($admin) ? $admin->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                value="{{ isset($admin) ? $admin->password : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Foto Profil</label>
                            <input type="file" class="form-control" name="image"
                                value="{{ isset($admin) ? $admin->image : '' }}"><br>
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
