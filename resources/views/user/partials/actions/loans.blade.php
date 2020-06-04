@if ($loan->returned_at)
    -
@else
    <form method="POST" action="{{ route('loans.update', array_merge(['user' => auth()->user()->id], compact('loan'))) }}" class="d-flex">
        @method('PATCH')
        @csrf
        <a href="{{ $loan->book->readPath() }}" class="btn btn-primary mr-2">
            <i class="fas fa-book-open"></i>
        </a>
        <button class="btn btn-primary">
            <i class="fas fa-undo-alt"></i>
        </button>
    </form>
@endif