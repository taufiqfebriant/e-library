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
        {{-- <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Kembali</a> --}}
        <iframe src="https://docs.google.com/viewer?url=https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf&embedded=true" frameborder="0" class="w-100 h-100"></iframe>
    </div>
@endsection