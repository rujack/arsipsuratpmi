@extends('layouts.login')

@section('container')
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black shadow border-0">
                        <div class="row g-0">
                            <div class="col-lg-4 d-none d-lg-block m-auto ">
                                <div class="text-center px-1 py-4 p-md-2 mx-md-4">
                                    <img src="/img/pmi.png" alt="Logo PMI" class="w-100">
                                </div>
                            </div>
                            <div class="col-lg-8 py-lg-5">
                                <div class="card-body p-5 mx-md-3">
                                    <div class="text-center">
                                        <img src="/img/logopmi_b.png" style="width: 130px;" alt="logo"
                                            class="d-none d-md-block d-sm-block d-lg-none  m-auto">
                                        <img src="/img/logopmi_b.png" style="width: 130px;" alt="logo"
                                            class="d-block d-sm-none m-auto">
                                        <h4 class="mt-1 mb-5 pb-1 text-uppercase"><span class="d-none d-lg-block">PMI</span>
                                            Kota Pasuruan</h4>
                                    </div>
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form action="/login" method="post">
                                        @csrf
                                        <p>Please login to your account</p>

                                        <div class="form-floating mb-4 ">
                                            <input type="email" id="email"
                                                class="form-control shadow-sm @error('email') is-invalid @enderror"
                                                name="email" placeholder="email address" />
                                            <label class="form-label" for="email">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="password" id="password"
                                                class="form-control shadow-sm @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" />
                                            <label class="form-label" for="password">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1 col-lg-5 col-md-6 mx-auto">
                                            <button class="btn btn-outline-danger w-100 btn-block fa-lg mb-3 shadow"
                                                type="submit">Log
                                                in</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
