@extends('layouts.main')

@section('title','User - View')

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-light">Detail User</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card bg-light pt-3 rounded-0 rounded-bottom shadow-none">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control shadow-sm"
                                    placeholder="No. Surat" value="{{ $user->id_anggota }}" readonly />
                                <label class="form-label">Id Anggota</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control shadow-sm" value="{{ $user->name }}" readonly />
                                <label class="form-label">Nama</label>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control shadow-sm" value="{{ $user->email }}" readonly />
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" class="form-control shadow-sm" value="{{ $user->role }}" readonly />
                                <label class="form-label">Level</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
