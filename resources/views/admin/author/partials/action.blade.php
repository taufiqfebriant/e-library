<form method="POST" action="{{ route('admin.authors.destroy', $id) }}" class="btn-group">
    <a class="btn btn-warning" href="{{ route('admin.authors.edit', $id) }}">
        <i class="fas fa-edit"></i>
    </a>
    @method('DELETE')
    @csrf
    <button class="delete btn btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>