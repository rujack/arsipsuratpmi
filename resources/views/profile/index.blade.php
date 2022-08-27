@extends('layouts.main')

@section('container')
    <div class="row justify-content-center mt-5">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-white text-uppercase">Profile</h3>
                </div>
            </div>
        </div>
        <div class="card pt-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-6 ps-5">
                    <form action="/profile" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-sm @error('id_anggota') is-invalid @enderror"
                                name="id_anggota" placeholder="id_anggota" value="{{ $user->id_anggota }}">
                            <label>id_anggota</label>
                            @error('id_anggota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-sm @error('name') is-invalid @enderror" name="name"
                                placeholder="name" value="{{ $user->name }}">
                            <label>name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control shadow-sm @error('email') is-invalid @enderror" name="email"
                                placeholder="email" value="{{ $user->email }}">
                            <label>Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-4 m-auto">

                            <button class="mb-4 w-100 btn btn-outline-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-6 pe-5">
                    <form action="/profile/password" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">Ubah Password</h1>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control shadow-sm @error('old_password') is-invalid @enderror"
                                name="old_password" placeholder="id_anggota">
                            <label>Password Lama</label>
                            @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control shadow-sm @error('password') is-invalid @enderror"
                                name="password" placeholder="name">
                            <label>Password Baru</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control shadow-sm @error('password_confirm') is-invalid @enderror"
                                name="password_confirm" placeholder="email">
                            <label>Konfirmasi Password Baru</label>
                            @error('password_confirm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="col-4 m-auto">

                            <button class="mb-4 w-100 btn btn-outline-primary" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h1>{{ Auth::user()->role }}</h1>
    </div>
@endsection
