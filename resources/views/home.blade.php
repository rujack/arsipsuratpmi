@extends('layouts.main')

@section('title', 'Home')

@section('container')
    <h1>Selamat Datang {{ auth()->user()->name }}</h1>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h3> {{ count($datas->where('tipe_surat', 0)) }} </h3>
                    <p> Surat Keluar </p>
                </div>
                <div class="icon">
                    <i class="fas fa-upload" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> {{ count($datas->where('tipe_surat', 1)) }} </h3>
                    <p> Surat Masuk </p>
                </div>
                <div class="icon">
                    <i class="fas fa-download" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> {{ count($datas->where('pengajuan', 1)) }} </h3>
                    <p> Surat Pengajuan </p>
                </div>
                <div class="icon">
                    <i class="fas fa-inbox" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3> {{ $datas->count() }} </h3>
                    <p> Total surat </p>
                </div>
                <div class="icon">
                    <i class="fas fa-mail-bulk" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center text-uppercase">Status : {{ auth()->user()->role }}</h2>
@endsection
