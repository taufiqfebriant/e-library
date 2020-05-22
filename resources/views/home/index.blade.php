@extends('layouts.body')

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha256-4hqlsNP9KM6+2eA8VUT0kk4RsMRTeS7QGHIM+MZ5sLY=" crossorigin="anonymous">
@endsection

@section('content')
    @include('partials.navbar')
    @guest
        <section class="hero-mrsection vh-100">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 font-weight-semibold">Temukan <span class="text-primary">ribuan</span> buku</h1>
                        <p class="text-base">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque provident natus hic, nobis, impedit, perferendis animi.</p>
                        <a href="{{ route('plans.index') }}" class="btn btn-primary text-uppercase font-weight-semibold px-3 py-2 tracking-wide">Langganan sekarang</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{ asset('images/undraw_reading_list_4boi.svg') }}" class="w-100" alt="Ilustrasi membaca">
                    </div>
                </div>
            </div>
        </section>
        <section class="why-us space-bottom-2 border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-4">
                        <h2>Cara kerja e-library</h2>
                    </div>
                    <div class="col-lg-4 pb-3 pb-lg-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <h5 class="card-title">Temukan buku</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pb-3 pb-lg-0">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <h5 class="card-title">Berlangganan</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <h5 class="card-title">Mulai membaca</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="latest-books pt-5 space-bottom-2">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-3">
                        <h2>Buku terbaru untuk Anda</h2>
                    </div>
                    <div class="col-12">
                        @if ($latestBooks->isEmpty())
                            <p class="text-center my-3">Tidak ada buku.</p>
                        @else
                            <div class="book-carousel">
                                @foreach ($latestBooks as $book)
                                    <a href="{{ route('books.show', compact('book')) }}" class="p-2 text-decoration-none transition-3d-hover">
                                        <img src="{{ asset("storage/{$book->cover}") }}" alt="Sampul {{ $book->cover }}" class="img-fluid">
                                        <h6 class="text-base text-body mt-2 mb-1">{{ Str::words($book->title, 5, '...') }}</h6>
                                        <p class="text-muted">
                                            @foreach ($book->authors as $author)
                                                {{ $author->name . ($loop->last ? '' : ', ') }}
                                            @endforeach
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        @if ($featuredBooks->isNotEmpty())
            <section id="featuredBooks" class="carousel slide space-top-2 space-bottom-1 bg-dark" data-ride="carousel">
                <div class="container h-100 mt-3">
                    <div class="carousel-inner h-100">
                        @foreach ($featuredBooks as $book)
                            <a href="{{ route('books.show', compact('book')) }}" class="carousel-item h-100 text-decoration-none {{ $loop->first ? 'active' : '' }}">
                                <div class="row justify-content-center no-gutters">
                                    <div class="col-md-3 h-64 text-center mb-3 mb-md-0">
                                        <img src="{{ asset("storage/{$book->cover}") }}" class="w-auto h-100" alt="Book's cover">
                                    </div>
                                    <div class="col-md-6 text-white my-auto pl-md-3 pl-lg-0">
                                        <h4>{{ $book->title }}</h4>
                                        <h6 class="mb-lg-3">{{ $book->getCommaSeparatedAuthors() }}</h6>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#featuredBooks" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#featuredBooks" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        @endif
        <div class="space-bottom-2 {{ $featuredBooks->isEmpty() ? 'space-top-2' : '' }}">
            <section class="top-books bg-light pt-4 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="pl-2">Buku yang sering dipinjam</h3>
                        </div>
                        <div class="col-12">
                            @if ($top10Books->isNotEmpty())
                                <div class="book-carousel">
                                    @foreach ($top10Books as $book)
                                        <a href="{{ route('books.show', compact('book')) }}" class="p-2 text-decoration-none transition-3d-hover">
                                            <img src="{{ asset("storage/{$book->cover}") }}" alt="Sampul {{ $book->cover }}" class="img-fluid">
                                            <h6 class="text-base text-body mt-2 mb-1">{{ Str::words($book->title, 5, '...') }}</h6>
                                            <p class="text-muted mb-0">
                                                @foreach ($book->authors as $author)
                                                    {{ $author->name . ($loop->last ? '' : ', ') }}
                                                @endforeach
                                            </p>
                                            <small class="text-body">{{ $book->loans_count }}x</small>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center mt-3 mb-5">Tidak ada data.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="liked-categories pt-4 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0 pl-2">Saran buku</h3>
                            </div>
                        </div>
                        <div class="col-12">
                            @if ($recommendedBooks->isNotEmpty())
                                <div class="book-carousel">
                                    @foreach ($recommendedBooks as $book)
                                        <a href="{{ route('books.show', compact('book')) }}" class="p-2 text-decoration-none transition-3d-hover">
                                            <img src="{{ asset("storage/{$book->cover}") }}" alt="Sampul {{ $book->cover }}" class="img-fluid">
                                            <h6 class="text-base text-body mt-2 mb-1">{{ Str::words($book->title, 5, '...') }}</h6>
                                            <p class="text-muted">
                                                @foreach ($book->authors as $author)
                                                    {{ $author->name . ($loop->last ? '' : ', ') }}
                                                @endforeach
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center my-5">Tidak ada data.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="latest-books pt-4 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <h3 class="pl-2">Buku terbaru</h3>
                        </div>
                        <div class="col-12">
                            @if ($latestBooks->isNotEmpty())
                                <div class="book-carousel">
                                    @foreach ($latestBooks as $book)
                                        <a href="{{ route('books.show', compact('book')) }}" class="p-2 text-decoration-none transition-3d-hover">
                                            <img src="{{ asset("storage/{$book->cover}") }}" alt="Sampul {{ $book->cover }}" class="img-fluid">
                                            <h6 class="text-base text-body mt-2 mb-1">{{ Str::words($book->title, 5, '...') }}</h6>
                                            <p class="text-muted">
                                                @foreach ($book->authors as $author)
                                                    {{ $author->name . ($loop->last ? '' : ', ') }}
                                                @endforeach
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center my-5">Tidak ada data.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endguest
    @include('partials.footer')
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
@endpush