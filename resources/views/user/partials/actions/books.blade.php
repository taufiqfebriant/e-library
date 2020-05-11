@if ($book->returned_at)
    -
@else
    <form method="POST" action="{{ route('users.return-book', array_merge(['user' => auth()->user()->id], compact('book'))) }}">
        @method('PATCH')
        @csrf
        <button class="btn btn-primary">Kembalikan</button>
    </form>
@endif