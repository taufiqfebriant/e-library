@extends('layouts.body')
@section('title', 'Kategori')

@section('content')
    @include('partials.navbar')
    <main class="space-2">
        <div class="container">
            <h1 class="mt-4">Kategori</h1>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-4 py-4">
                        <a class="h3 text-body text-decoration-none" href="{{ route('search.show', Str::slug($category->name)) }}">{{ $category->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection