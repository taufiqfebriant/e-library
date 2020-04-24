<form method="POST" action="{{ route('admin.transactions.update', $id) }}" class="btn-group">
    <a class="btn btn-sm btn-info d-flex align-items-center" href="{{ route('admin.transactions.show', $id) }}">
        <i class="fas fa-info mr-2 fa-sm"></i>
        <span>Detail</span>
    </a>
    @method('PATCH')
    @csrf
    <button class="delete btn btn-sm btn-primary d-flex align-items-center">
        <i class="fas fa-toggle-on mr-2 fa-sm"></i>
        <span>Aktifkan</span>
    </button>
</form>