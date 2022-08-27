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
                    <h3 class="text-white text-uppercase">User</h3>
                </div>
                <div class="col text-end"><a href="/user/create" class="btn btn-outline-primary px-5">Tambah</a></div>
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
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
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
                ajax: '{!! route('getUser') !!}',
                bAutoWidth: false,
                fixedColumns: true,
                columnDefs: [{
                    targets: [1],
                    class: "wrapok",
                    orderable: false
                },  {
                    targets: [3],
                    class: "action",
                    orderable: false
                }],
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
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


{{-- <div class="row">
        <div class="col-12 bg-danger text-white p-3">
            <div class="row">
                <div class="col">
                    <h3>User</h3>
                </div>
                <div class="col text-end"><a href="/user/create" class="btn btn-primary btn-lg px-5">Tambah</a></div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-2"><a class="btn btn-sm bg-primary"
                                            href="/user/{{ $user->id }}">Lihat</a></div>
                                    <div class="col-2">
                                        {{-- <a class="btn btn-sm bg-warning"
                                            href="/user/{{ $user->id }}/edit">Edit</a> --}}

{{-- <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                                                @method('put')
                                                @csrf
                                                <button class="btn btn-sm bg-warning"
                                                    onclick="return confirm('are you sure ?');">Reset</button>
                                            </form></div>
                                    <div class="col-2"><a class="btn btn-sm bg-danger">
                                            <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm bg-danger text-white"
                                                    onclick="return confirm('are you sure ?');">Hapus</button>
                                            </form>
                                        </a></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
{{-- {{ $users->links() }} --}}
{{-- </div> --}}
{{-- </div> --}}
