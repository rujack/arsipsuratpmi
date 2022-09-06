@extends('layouts.main')

@section('title', 'Log Activity')

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-white text-uppercase">Log Activity</h3>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="card bg-light pt-3 rounded-0 rounded-bottom shadow-none">
                <div class="card-body ">
                    <textarea class="w-100 form-control shadow-sm" rows="20">
@foreach ($logs as $log)
{{ $log->email . ' => ' . $log->url . ' [' . $log->method . '] ' . ' TIME => ' . $log->created_at }}
@endforeach
</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
