@extends('layouts.main')

@section('title','User - Edit')

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-light text-center">Edit User</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card bg-light pt-3 rounded-0 rounded-bottom shadow-none">
                <div class="card-body ">
                    <form action="/user/{{$user->id}}" method="post">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-floating mb-3 ">
                                    <input type="text"
                                        class="form-control shadow-sm @error('id_anggota') is-invalid @enderror"
                                        name="id_anggota" value="{{ old('id_anggota', $user->id_anggota) }}" id="id_anggota"
                                        placeholder="Id Anggota" />
                                    <label class="form-label" for="id_anggota">Id Anggota</label>
                                    @error('id_anggota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-floating mb-3 ">
                                    <input type="text"
                                        class="form-control shadow-sm @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name', $user->name) }}" name="name" placeholder="Nama" />
                                    <label class="form-label" for="">Nama</label>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-floating mb-3 ">
                                    <input type="text"
                                        class="form-control shadow-sm @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email', $user->email) }}" name="email" placeholder="Email" />
                                    <label class="form-label" for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 text-center">
                            <label for="role" class="form-label">Level</label>
                            <div class=" text-nowrap">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1"
                                        value="pegawai" @if ($user->role == 'pegawai') checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pegawai
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2"
                                        value="pengurus" @if ($user->role == 'pengurus') checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pengurus
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3"
                                        value="admin" @if ($user->role == 'admin') checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 m-auto">
                            <button class="btn btn-outline-primary w-100 " type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
