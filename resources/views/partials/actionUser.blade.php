<a class="btn btn-sm btn-outline-primary me-1" href="/user/{{ $model->id }}"><i class="fas fa-eye"></i></a>
<a class="btn btn-sm btn-outline-warning mx-1" href="/user/{{ $model->id }}/edit"><i class="fas fa-edit"></i></a>

<form action="/user/{{ $model->id }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-sm btn-outline-danger ms-1" onclick="return confirm('are you sure ?');"><i
            class="fas fa-trash"></i></button>
</form>
<form action="/user/reset/{{ $model->id }}" method="post" class="d-inline">
    @method('put')
    @csrf
    <button class="btn btn-sm btn-outline-warning text-danger ms-1" onclick="return confirm('are you sure ?');"><i class="fas fa-undo"></i></button>
</form>
