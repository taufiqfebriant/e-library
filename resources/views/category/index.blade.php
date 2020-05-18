@extends('layouts.body')
@section('title', 'Kategori')

@section('content')
    @include('partials.navbar')
    <main class="space-2">
        <div class="container">
            <h3 class="mt-4">Kategori</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-4 py-3">
                        <a href="{{ route('search.index', ['category_id' => $category->id]) }}" class="card text-decoration-none">
                            <div class="card-body">
                                <div class="card-title text-body mb-0">{{ $category->name }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection