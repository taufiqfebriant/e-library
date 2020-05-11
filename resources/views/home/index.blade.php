@extends('layouts.body')

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
                    <div class="col-md-4 py-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/undraw_Books_l33t.svg') }}" alt="Ilustrasi bagian kenapa kami" class="rounded-circle">
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, facilis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 py-2">
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
            <section class="top-books bg-light pt-5 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="pl-2">Buku yang sering dipinjam</h3>
                        </div>
                        <div class="col-12">
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
                                        <small class="text-body">{{ $book->users_count }}x</small>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <form action="{{ route('search.index') }}" class="d-flex pt-4" method="get">
                    <input type="text" name="q" id="q" class="form-control form-control-lg w-75 mr-3" placeholder="Ketik judul buku..." required>
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
                                <h3 class="mb-0 pl-2">Saran buku</h3>
                            </div>
                        </div>
                        <div class="col-12">
                            @if (auth()->user()->categories()->exists())
                                <div class="book-carousel">
                                    @foreach (auth()->user()->categories->take(5) as $category)
                                        @foreach ($category->books as $book)
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
                                    @endforeach
                                        @if($bukucategori)
                                            @foreach($bukucategori as $book)
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
                                        @endif
                                </div>
                            @else
                                <h5 class="text-center my-5">Tidak ada buku yang disukai.</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="latest-books py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <h3 class="pl-2">Buku terbaru</h3>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
@endpush