@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-light text-center">Edit Surat</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card pt-3  bg-light">
                <div class="card-body ">
                    <form action="/surat/{{$surat->id}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3 ">
                                    <input type="text" id="nosurat"
                                        class="form-control shadow-sm @error('no_surat') is-invalid @enderror"
                                        name="no_surat" placeholder="No. Surat"
                                        value="{{ old('no_surat', $surat->no_surat) }}" />
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
                                        placeholder="Tanggal" value="{{ old('tanggal', $surat->tanggal) }}" />
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
                                id="perihal" placeholder="Perihal" name="perihal"
                                value="{{ old('perihal', $surat->perihal) }}" />
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
                                        name="pengirim" placeholder="Pengirim"
                                        value="{{ old('pengirim', $surat->pengirim) }}" />
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
                                        name="penerima" placeholder="Penerima"
                                        value="{{ old('penerima', $surat->penerima) }}" />
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
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile"
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
                                                id="flexRadioDefault1" value="1"
                                                @if ($surat->tipe_surat) checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Masuk
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipe_surat"
                                                id="flexRadioDefault2" value="0"
                                                @if (!$surat->tipe_surat) checked @endif>
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
                                            id="flexCheckDefault" @if ($surat->pengajuan) checked @endif>
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


{{-- <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3>Edit Surat</h3>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="/surat/{{ $surat->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="tipeSurat" class="form-label">Nosurat</label>
                            <input type="text" class="form-control @error('tipe_surat') is-invalid @enderror"
                                id="tipe_surat" placeholder="tipe" name="no_surat"
                                value="{{ old('no_surat', $surat->no_surat) }}">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noSurat" class="form-label">Tipe Surat</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_surat" id="flexRadioDefault1"
                                    value="1" @if ($surat->tipe_surat) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Masuk
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipe_surat" id="flexRadioDefault2"
                                    value="0" @if (!$surat->tipe_surat) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Keluar
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="perihal" class="form-label">perihal</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                                placeholder="Perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}">
                            @error('perihal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                placeholder="tanggal" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pengirim" class="form-label">Pengirim</label>
                            <input type="text" class="form-control @error('pengirim') is-invalid @enderror"
                                id="pengirim" placeholder="Pengirim" name="pengirim"
                                value="{{ old('pengirim', $surat->pengirim) }}">
                            @error('pengirim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="penerima" class="form-label">penerima</label>
                            <input type="text" class="form-control @error('penerima') is-invalid @enderror"
                                id="penerima" name="penerima" value="{{ old('penerima', $surat->penerima) }}">
                            @error('penerima')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile"
                                accept="application/pdf" name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
