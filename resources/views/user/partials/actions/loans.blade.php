@if ($loan->returned_at)
    -
@else
    <form method="POST" action="{{ route('loans.update', array_merge(['user' => auth()->user()->id], compact('loan'))) }}" class="d-flex">
        @method('PATCH')
        @csrf
        <a href="{{ $loan->book->readPath() }}" class="btn btn-primary mr-2" data-toggle="tooltip" data-placement="top" title="Baca">
            <i class="fas fa-book-open"></i>
        </a>
        <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Kembalikan">
            <i class="fas fa-undo-alt"></i>
        </button>
    </form>
@endif