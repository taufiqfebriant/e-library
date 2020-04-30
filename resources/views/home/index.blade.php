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

        @else
        <section id="bukuTerbaik" class="bukuTerbaik mb-5">
        <div class="container">
            <div class="row p-4">
                <div class="col-md-12">
                    <h1 class="text-center">Buku terbaik</h1>
                </div>
            </div>
            <div class="row">

            @foreach($bestBooks as $bbook)
            
               <div class="col-md-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                        <div class="card-body"> 
                        <h5>{{$bbook->title}}</h5>
                        <p class="card-text">
                            Carlo Collodi <br>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- <div class="col-md-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="./images/binatang.jpg" alt="Card image cap">
                        <div class="card-body"> 
                        <h5>Pinocio</h5>
                        <p class="card-text">
                            Carlo Collodi <br>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                        <div class="card-body"> 
                        <h5>Pinocio</h5>
                        <p class="card-text">
                            Carlo Collodi <br>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <section id="bukuDisukai" class="bukuDisukai">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12 col-12">
                    <h4>Buku yang anda sukai</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"> 
                    <div class="autoplay">
                        <div>your content1</div>
                        <div>your content2</div>
                        <div>your content3</div>
                        <div>your content4</div>
                        <div>your content5</div>
                        <div>your content6</div>
                    </div>
                    <!-- <div class="owl-carousel">
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Pinocio</h5>
                                
                                <p class="card-text">
                                    Carlo Collodi 
                                    <p class="text-muted">- Dongeng</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <section id="bukuTerbaru" class="bukuTerbaru">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12 col-12">
                    <h4>Buku Terbaru hadir untuk anda</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel">
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                        <div class="card h-100">
                            <img class="card-img-top" src="./images/hp.png" alt="Card image cap">
                            <div class="card-body"> 
                                <h5>Harry potter</h5>
                                
                                <p class="card-text">
                                    J.K Rowling
                                    <p class="text-muted">- Mistis</p>
                                </p>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @endguest

        @include('partials.footer')
    </body>
@endsection