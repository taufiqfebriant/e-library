<form method="POST" action="{{ route('admin.books.destroy', $id) }}" class="btn-group">
    <a class="btn btn-info" href="{{ route('admin.books.show', $id) }}">
        <i class="fas fa-info"></i>
    </a>
    <a class="btn btn-warning" href="{{ route('admin.books.edit', $id) }}">
        <i class="fas fa-edit"></i>
    </a>
    @method('DELETE')
    @csrf
    <button class="delete btn btn-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>