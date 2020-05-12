@if ($book->returned_at)
    -
@else
    <form method="POST" action="{{ route('users.return-book', array_merge(['user' => auth()->user()->id], compact('book'))) }}" class="d-flex">
        @method('PATCH')
        @csrf
        <a href="{{ route('books.read', compact('book')) }}" class="btn btn-primary mr-2">
            <i class="fas fa-book-open"></i>
        </a>
        <button class="btn btn-primary">
            <i class="fas fa-undo-alt"></i>
        </button>
    </form>
@endif