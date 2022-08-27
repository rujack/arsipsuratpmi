@extends('layouts.main')

@section('container')
    {{-- @dd($user) --}}
    <main class="form-signin">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/profile/password" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Ubah Password</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('old_password') is-invalid @enderror"
                            name="old_password" placeholder="id_anggota">
                        <label>Password Lama</label>
                        @error('old_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="name" >
                        <label>Password Baru</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm"
                            placeholder="email" >
                        <label>Konfirmasi Password Baru</label>
                        @error('password_confirm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <button class="mb-4 w-100 btn btn-lg btn-primary" type="submit">Ubah</button>

                </form>
            </div>
        </div>
    </main>

    <div class="text-center">
        <h1>{{ Auth::user()->role }}</h1>
    </div>
@endsection
