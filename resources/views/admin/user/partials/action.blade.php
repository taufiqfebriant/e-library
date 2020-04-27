<div class="d-flex justify-content-center">
    @can('edit-users')
        <a class="btn btn-warning btn-sm mr-2" href="{{ route('admin.users.edit', $id) }}">
            <i class="fas fa-edit fa-sm"></i>
        </a>
    @endcan
    @if ($id !== auth()->user()->id)
        @can('delete-users', Model::class)
            <form method="POST" action="{{ route('admin.users.destroy', $id) }}">
                @csrf
                @method('DELETE')
                <button class="delete btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt fa-sm"></i>
                </button>
            </form>
        @endcan
    @endif
</div>