<form method="POST" action="{{ route('admin.books.destroy', $id) }}" class="btn-group">
    <a class="btn btn-sm btn-info d-flex align-items-center" href="{{ route('admin.books.show', $id) }}">
        <i class="fas fa-info mr-2 fa-sm"></i>
        <span>Detail</span>
    </a>
    <a class="btn btn-sm btn-warning d-flex align-items-center" href="{{ route('admin.books.edit', $id) }}">
        <i class="fas fa-edit mr-2 fa-sm"></i>
        <span>Ubah</span>
    </a>
    @method('DELETE')
    @csrf
    <button class="delete btn btn-sm btn-danger d-flex align-items-center">
        <i class="fas fa-trash-alt mr-2 fa-sm"></i>
        <span>Hapus</span>
    </button>
</form>