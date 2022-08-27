<a class="btn btn-sm btn-outline-primary" href="/surat/{{ $model->id }}"><i class="fas fa-eye"></i></a>
<a class="btn btn-sm btn-outline-warning mx-1" href="/surat/{{ $model->id }}/edit"><i class="fas fa-edit"></i></a>

<form action="/surat/{{ $model->id }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('are you sure ?');"><i class="fas fa-trash-alt"></i></button>
</form>
