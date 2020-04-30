@extends('layouts.body')
@section('title', 'Detail Buku')

@push('scripts')
    <script src="{{ asset('vendors/star-rating-svg/jquery.star-rating-svg.min.js') }}" defer></script>
@endpush

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/star-rating-svg/css/star-rating-svg.css') }}">
@endsection

@section('content')
    @include('partials.navbar')
    <div class="container pt-5">
        <div class="row mt-5 mb-4">
            <div class="col-md-3">
                <img src="{{ asset("storage/{$book->cover}") }}" class="img-thumbnail border-0 bg-transparent p-0">
            </div>
            <div class="col-md-9">
                <h3 class="font-weight-bold mt-2">{{ $book->title }}</h3>
                {{-- <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i> --}}
                <table class="mb-5">
                    <tr>
                        <td>Penulis</td>
                        @foreach ($book->authors as $author)
                            <td>{{ $author->name . ($loop->last ? '' : ', ') }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Penerbit </td>
                        <td>{{ $book->publisher->name }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Halaman</td>
                        <td>{{ $book->countPages($book->file) }} halaman</td>
                    </tr>
                </table>
                @if (auth()->check() && $book->users->contains(auth()->user()->id))
                    <a href="{{ route('books.read', compact('book')) }}" class="btn btn-primary">Baca</a>
                @else
                    <div class="d-flex">
                        <form action="{{ route('books.update', compact('book')) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-primary shadow-lg btn-flat mr-2">Pinjam</button>
                        </form>
                        <a href="{{ route('books.read', compact('book')) }}" class="btn btn-darkslategray">Lihat Cuplikan</a>
                    </div>
                @endif
                <p class="mt-5">Kategori :  
                    <span class="badge badge-dark">
                        {{ $book->category->name }}
                    </span>
                </p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Review</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>
                    {{ $book->synopsis }}
                    </p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if (auth()->check() && $book->users->contains(auth()->user()->id))
                        <form action="{{ route('reviews.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <h4 class="my-3">Beri buku ini penilaian</h4>
                            <div class="row align-items-center">
                                <div class="rating col-auto"></div>
                                <input type="hidden" name="rating" id="rating" value="2">
                                <div class="col">
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Komentar Anda tentang buku ini ..."></textarea>
                                </div>
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary mt-3 float-right">Kirim Ulasan</button>
                            </div>
                        </form>
                    @endif
                    <h4 class="my-3">Penilaian</h4>
                    <hr>
                    @forelse ($book->reviews as $review)
                        <h5>{{ $review->user->name }}</h5>
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-{{ $i <= $review->rating ? 'warning' : 'lightgray' }}">
                                    <i class="fas fa-star"></i>
                                </span>
                            @endfor
                        </div>
                        <p class="mt-2">{{ $review->comment }}</p>
                    @empty
                        <p>Tidak ada penilaian</p>
                    @endforelse
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <h3 class="text-center py-5">Buku yang serupa</h3>
                        <!-- Set up your HTML -->
                <div class="owl-carousel">
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div>
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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
                <div> 
                    <div class="card">
                    <img class="card-img-top" src="./images/pinokio.jpg" alt="Card image cap">
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

                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

