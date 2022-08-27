@extends('layouts.main')

@section('container')
    <main class="form-signin">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5">
                <form action="/register" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('id_anggota') is-invalid @enderror" name="id_anggota"
                            placeholder="id_anggota" value="{{ old('id_anggota') }}" required>
                        <label>id_anggota</label>
                        @error('id_anggota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="name" value="{{ old('name') }}" required>
                        <label>name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email"
                            placeholder="email" value="{{ old('email') }}" required>
                        <label>Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password" required>
                        <label>Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                    <small class="d-block text-center mt-3">Already registered? <a href="/login">login</a>. &copy;
                        2017–2021</small>
                </form>
            </div>
        </div>
    </main>

@endsection
