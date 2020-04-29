@extends('layouts.body')
@section('title', "Baca {$book->title}")

@section('content')
    <object data="{{ $book->has_file ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="application/pdf" class="w-100 h-100">
        <embed src="{{ $book->has_file ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="application/pdf" />
    </object>
@endsection