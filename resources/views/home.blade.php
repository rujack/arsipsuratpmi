@extends('layouts.main')

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
                    <i class="fa fa-users"></i>
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
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> {{ count($datas->where('pengajuan', 1))}} </h3>
                    <p> Surat Pengajuan </p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
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
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row my-3">
        <div class="col text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><img src="/img/smile.jpg" class="img-thumnail w-100" alt=""></div>
                        <div class="col">
                            <h2>MASUK (1)</h2>
                            <p class="text-center fs-3">{{ count($datas->where('tipe_surat', 1)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><img src="/img/smile.jpg" class="img-thumnail w-100" alt=""></div>
                        <div class="col">
                            <h2>KELUAR (0)</h2>
                            <p class="text-center fs-3">
                                {{ count($datas->where('tipe_surat', 0)) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col"><img src="/img/smile.jpg" class="img-thumnail w-100" alt=""></div>
                        <div class="col">
                            <h2>All</h2>
                            <p class="text-center fs-3">{{ $datas->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <h1>{{ Auth::user()->role }}</h1>
        <h1>Welcome {{auth()->user()->name  }}</h1>
    </div> --}}
@endsection
