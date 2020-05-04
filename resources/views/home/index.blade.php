@extends('layouts.body')

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0=" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/carousel.js') }}" defer></script>
@endpush

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha256-4hqlsNP9KM6+2eA8VUT0kk4RsMRTeS7QGHIM+MZ5sLY=" crossorigin="anonymous">
@endsection

@section('content')
    @include('partials.navbar')
    @guest
        <section class="hero-section bg-darkslategray vh-100 text-white">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-6">
                        <h1 class="display-4">Temukan <span class="text-primary">ribuan</span> buku.</h1>
                        <p class="text-base">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque provident natus hic, nobis, impedit, perferendis animi.</p>
                        <a href="{{ route('plans.index') }}" class="btn btn-primary text-uppercase tracking-widest">Berlangganan sekarang</a>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/undraw_reading_list_4boi.svg') }}" class="w-100" alt="Ilustrasi membaca">
                    </div>
                </div>
            </div>
        </section>

        <section class="why-us py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-4">
                        <h1>Kenapa kami?</h1>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="latest-books py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 pb-3">
                        <h1>Buku terbaru untuk Anda</h1>
                    </div>
                    <div class="col-12">
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
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="space-2">
            <section class="top-books bg-light py-5 text-center">
                <div class="container">
                    {{-- <div class="row top-books-carousel">
                        @foreach ($topBooks as $review)
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-5">
                                        <img src="{{ asset("storage/{$review->book->cover}") }}" alt="Book's cover" class="img-fluid">
                                    </div>
                                    <div class="col-7">
                                        <h5>{{ $review->book->title }}</h5>
                                        <div class="d-flex">
                                            <span class="bg-warning">
                                                <i class="fas-fa-star"></i>
                                            </span>
                                            <span>{{ $review->ratings }}</span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        @endforeach
                    </div> --}}
                </div>
            </section>
            <div class="container">
                <form action="" class="d-flex pt-4">
                    <input type="text" name="keyword" id="keyword" class="form-control form-control-lg w-75 mr-3">
                    <button class="btn btn-darkslategray w-25 text-base">
                        <i class="fas fa-search fa-sm mr-1"></i>
                        <span>Cari</span>
                    </button>
                </form>
            </div>
            <section class="liked-categories pt-5 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0">Berdasarkan kategori yang Anda sukai</h3>
                                <a href="{{ route('categories.index') }}" class="text-base text-decoration-none text-darkslategray">Lihat semua kategori</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="book-carousel">
                                @foreach ($likedBooks as $book)
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
                        </div>
                    </div>
                </div>
            </section>
            <section class="latest-books py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <h3>Buku terbaru</h3>
                        </div>
                        <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endguest
    @include('partials.footer')
@endsection