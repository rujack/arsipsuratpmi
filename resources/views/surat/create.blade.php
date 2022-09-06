@extends('layouts.main')

@section('title','Surat - Create')

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-light text-center">Tambah Surat</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card bg-light pt-3 rounded-0 rounded-bottom shadow-none">
                <div class="card-body ">
                    <form action="/surat" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3 ">
                                    <input type="text" id="nosurat"
                                        class="form-control shadow-sm @error('no_surat') is-invalid @enderror"
                                        name="no_surat" placeholder="No. Surat" value="{{ old('no_surat') }}"/>
                                    <label class="form-label" for="nosurat">No. Surat</label>
                                    @error('no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-floating mb-3 ">
                                    <input type="date" id="tanggal"
                                        class="form-control shadow-sm @error('tanggal') is-invalid @enderror" name="tanggal"
                                        placeholder="Tanggal" value="{{ old('tanggal') }}"/>
                                    <label class="form-label" for="nosurat">Tanggal</label>
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-sm @error('perihal') is-invalid @enderror"
                                id="perihal" placeholder="Perihal" name="perihal" value="{{ old('perihal') }}"/>
                            <label for="perihal" class="form-label">Perihal</label>
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3 ">
                                    <input type="text" id="pengirim"
                                        class="form-control shadow-sm @error('pengirim') is-invalid @enderror"
                                        name="pengirim" placeholder="Pengirim" value="{{ old('pengirim') }}"/>
                                    <label class="form-label" for="pengirim">Pengirim</label>
                                    @error('pengirim')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-floating mb-3 ">
                                    <input type="text" id="penerima"
                                        class="form-control shadow-sm @error('penerima') is-invalid @enderror"
                                        name="penerima" placeholder="Penerima" value="{{ old('penerima') }}"/>
                                    <label class="form-label" for="penerima">Penerima</label>
                                    @error('penerima')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control shadow-sm @error('file') is-invalid @enderror" type="file" id="formFile"
                                accept="application/pdf" name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 text-md-end ">
                                <div class="mb-3">
                                    <label for="tipe_surat" class="form-label">Tipe Surat</label>
                                    <div class="text-nowrap">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipe_surat"
                                                id="flexRadioDefault1" value="1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Masuk
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipe_surat"
                                                id="flexRadioDefault2" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Keluar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="mb-3">
                                    <label for="tipe_surat" class="form-label">Option</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="pengajuan"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Pengajuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 m-auto">
                            <button class="btn btn-outline-primary w-100 " type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
