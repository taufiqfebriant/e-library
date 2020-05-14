@extends('layouts.body')
@section('title', "Baca {$book->title}")

@section('content')
    <div class="position-absolute w-100 h-75" style="opacity: 1"></div>
    <object data="{{ $book->has_file ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="application/pdf" class="w-100 h-75">
        <embed src="{{ $book->has_file ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="application/pdf" />
    </object>
@endsection