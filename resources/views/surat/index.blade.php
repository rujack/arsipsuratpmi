@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/datatables.min.css" />
@endpush

@section('container')
    <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3 class="text-white text-uppercase">Surat</h3>
                </div>
                <div class="col text-end">
                    <a href="/export/surats" class="btn btn-outline-success btn-sm px-5">Export</a>
                    <a href="/surat/create" class="btn btn-outline-primary btn-sm px-5">Tambah</a>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                {{ session('success') }}
            </div>
        @endif
        <div class="col pt-3">
            <table class="table table-striped table-bordered w-100 display " id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No. Surat</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Tipe Surat</th>
                        <th scope="col">Pengirim</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Pengajuan</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/datatables.min.js">
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "scrollX": true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('getSurat') !!}',
                bAutoWidth: false,
                fixedColumns: true,
                columnDefs: [{
                    targets: [1],
                    class: "wrapok",
                    orderable: false
                }, {
                    targets: [3],
                    class: "wrapok",
                    orderable: false
                }, {
                    targets: [4],
                    class: "wrapok",
                    orderable: false
                }, {
                    targets: [6],
                    orderable: false,
                    class:"file"
                }, {
                    targets: [7],
                    class: "action",
                    orderable: false
                }, ],
                columns: [{
                        data: 'no_surat',
                        name: 'no_surat',
                    },
                    {
                        data: 'perihal',
                        name: 'perihal'
                    },
                    {
                        data: 'tipe_surat',
                        name: 'tipe_surat',
                        render: function(data, type, row) {
                            return (row.tipe_surat == 1) ?
                                'Masuk' : 'keluar'
                        },

                    },
                    {
                        data: 'pengirim',
                        name: 'pengirim'
                    },
                    {
                        data: 'penerima',
                        name: 'penerima'
                    },
                    {
                        data: 'pengajuan',
                        name: 'pengajuan',
                        render: function(data, type, row) {
                            return (row.pengajuan == 1) ?
                                '<p class="text-center text-success"><i class="fas fa-check"></i></p>' :
                                '<p class="text-center text-danger"><i class="fas fa-times"></i></p>'
                        },
                    },
                    {
                        data: 'file',
                        name: 'file',
                        render: function(url, type, row) {
                            return '<a href="/file/' + row.file +
                                ' " target="_blank" class="fs-4"><i class="fas fa-file-pdf"></i></a>'
                        },
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });
    </script>
@endpush
