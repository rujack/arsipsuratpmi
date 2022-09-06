@extends('layouts.main')

@section('title', 'Surat - View')

@section('container')
    {{-- @dd($surat) --}}
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-light text-center">Detail Surat</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card bg-light pt-3 rounded-0 rounded-bottom shadow-none">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" id="nosurat" class="form-control shadow-sm" name="no_surat"
                                    placeholder="No. Surat" value="{{ $surat->no_surat }}" readonly />
                                <label class="form-label" for="nosurat">No. Surat</label>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="date" id="tanggal" class="form-control shadow-sm" name="tanggal"
                                    placeholder="Tanggal" value="{{ $surat->tanggal }}" readonly />
                                <label class="form-label" for="nosurat">Tanggal</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow-sm" id="perihal" placeholder="Perihal"
                            name="perihal" value="{{ $surat->perihal }}" readonly />
                        <label for="perihal" class="form-label">Perihal</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" id="pengirim" class="form-control shadow-sm" name="pengirim"
                                    placeholder="Pengirim" value="{{ $surat->pengirim }}" readonly />
                                <label class="form-label" for="pengirim">Pengirim</label>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" id="penerima" class="form-control shadow-sm" name="penerima"
                                    placeholder="Penerima" value="{{ $surat->penerima }}" readonly />
                                <label class="form-label" for="penerima">Penerima</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="ratio ratio-16x9">
                            <iframe src="/file/{{ $surat->file }}" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 text-md-end ">
                            <div class="mb-3">
                                <label for="tipe_surat" class="form-label">Tipe Surat</label>
                                <div class="text-nowrap">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_surat"
                                            id="flexRadioDefault1" value="1"
                                            @if ($surat->tipe_surat) checked @endif disabled>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Masuk
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipe_surat"
                                            id="flexRadioDefault2" value="0"
                                            @if (!$surat->tipe_surat) checked @endif disabled>
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
                                        id="flexCheckDefault" @if ($surat->pengajuan) checked @endif disabled>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Pengajuan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
