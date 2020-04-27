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
    <body>
        @include('partials.navbar')
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
                            @foreach ($books as $book)
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
        @include('partials.footer')
    </body>
@endsection