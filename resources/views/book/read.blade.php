@extends('layouts.body')
@section('title', "Baca {$book->title}")

@section('content')
    <div class="container-fluid px-0 h-100">
        <div class="row no-gutters">
            <div class="col-auto border-right">
                <a href="{{ url()->previous() }}" class="btn btn-light m-0 rounded-0 h-100 px-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fas fa-chevron-left fa-2x"></i>
                    </div>
                </a>
            </div>
            <div class="col pl-3 py-2">
                <h6 class="text-muted">Anda sedang membaca</h6>
                <h3>{{ $book->title }}</h3>
            </div>
        </div>
        <object data="{{ $book->inTheLoanPeriod() ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="text/html" class="w-100 h-100">
            <embed src="{{ $book->inTheLoanPeriod() ? route('books.file', $book->id) : asset("storage/{$book->preview}") }}#toolbar=0" type="text/html">
        </object>
    </div>
@endsection