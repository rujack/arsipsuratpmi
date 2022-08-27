<a class="btn btn-sm btn-outline-primary" href="/surat/{{ $model->id }}"><i class="fas fa-eye"></i></a>
<form action="/pengajuan/terima/{{ $model->id }}" method="post" class="d-inline">
    @csrf
    <button class="btn btn-sm btn-outline-success mx-1"><i class="fas fa-check"></i></button>
</form>
<form action="/pengajuan/tolak/{{ $model->id }}" method="post" class="d-inline">
    @csrf
    <button class="btn btn-sm btn-outline-danger"><i class="fas fa-archive"></i></button>
</form>
