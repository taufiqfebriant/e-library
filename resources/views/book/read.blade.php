@extends('layouts.body')
@section('title', "Baca {$book->title}")

@section('content')
    <div class="container-fluid px-0 h-100">
        <div class="row h-100 no-gutters">
            <div class="col-lg-3 p-3 my-auto">
                <h6 class="text-muted">Anda sedang membaca</h6>
                <h2>{{ $book->title }}</h2>
                <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Kembali</a>
            </div>
            <div class="col-lg-9">
                <object data="{{ $book->inTheLoanPeriod() ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="text/html" class="w-100 h-100">
                    <embed src="{{ $book->inTheLoanPeriod() ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="text/html">
                </object>
            </div>
        </div>
    </div>
@endsection