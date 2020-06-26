<form method="POST" action="{{ route('admin.users.destroy', $id) }}" class="btn-group">
    <a class="btn btn-sm btn-info d-flex align-items-center" href="{{ route('admin.users.show', $id) }}">
        <i class="fas fa-info mr-2 fa-sm"></i>
        <span>Detail</span>
    </a>
    <a class="btn btn-warning btn-sm d-flex align-items-center" href="{{ route('admin.users.edit', $id) }}">
        <i class="fas fa-edit fa-sm mr-2"></i>
        <span>Ubah</span>
    </a>
    @method('DELETE')
    @csrf
    <button class="delete btn btn-danger btn-sm d-flex align-items-center">
        <i class="fas fa-trash-alt fa-sm mr-2"></i>
        <span>Hapus</span>
    </button>
</form>