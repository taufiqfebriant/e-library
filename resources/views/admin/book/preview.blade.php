@extends('admin.layouts.body')

@section('title', 'Cuplikan Buku')
@section('body-class', 'vh-100')

@section('content')
    <object data="{{ $book->file('preview') }}" type="application/pdf" class="w-100 h-100">
        <embed src="{{ $book->file('preview') }}" type="application/pdf" />
    </object>
@endsection