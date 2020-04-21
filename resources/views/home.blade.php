@extends('layouts.body')

@section('content')
<body>
    @foreach ($books as $book)
        <div class="border mb-3">
            <p>Judul: {{ $book->title }}</p>
            <button class="btn btn-primary btn-sm">Keranjang</button>
        </div>
    @endforeach
</body>
@endsection