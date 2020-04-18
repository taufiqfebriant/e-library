@extends('admin.layouts.body')

@section('title', 'Cuplikan Buku')
@section('body-class', 'vh-100')

@section('content')
    <object data="{{ asset("storage/{$book->preview}") }}" type="application/pdf" class="w-100 h-100">
        <embed src="{{ asset("storage/{$book->preview}") }}" type="application/pdf" />
    </object>
@endsection