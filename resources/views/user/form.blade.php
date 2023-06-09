@extends('layouts.app')

@section('title', 'Form user')

@section('contents')
    <form action="{{ isset($user) ? route('user.tambah.update', $user->id) : route('user.tambah.simpan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($user) ? 'Form Edit user' : 'Form Tambah user' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ isset($user) ? $user->nik : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ isset($user) ? $user->nama : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ isset($user) ? $user->alamat : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ttl">TTL</label>
                            <input name="ttl" type="date"
                                class="form-control form-control-user @error('ttl')is-invalid @enderror"
                                id="exampleInputTtl" placeholder="Tanggal Lahir"
                                value="{{ isset($user) ? $user->ttl : '' }}">
                            @error('ttl')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jk">JK</label>
                            <div class="form-control form-control-user" style="font-size: 14px;">
                                <input class="form-control-input" type="radio" name="jk" id="inlineRadio1"
                                    value="Pria" {{ isset($user) && $user->jk == 'Pria' ? 'checked' : '' }}>
                                <label class="form-control-label" for="inlineRadio1">Pria</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                <input class="form-control-input" type="radio" name="jk" id="inlineRadio2"
                                    value="Wanita" {{ isset($user) && $user->jk == 'Wanita' ? 'checked' : '' }}>
                                <label class="form-control-label" for="inlineRadio2">Wanita</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ isset($user) ? $user->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password"
                                value="{{ isset($user) ? $user->password : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="foto_profil">Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil" id="foto_profil" aria-describedby="foto_profil">
                                <!-- value="{{ isset($user) ? $user->image : '' }}"></br> -->
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
