@extends('layouts.body')
@section('title', 'Detail Buku')

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
            <div class="col-md-8">
                <h2 class="mt-2 font-weight-bold">{{ $book->title }}</h2>
                <h5 class="text-muted my-3">
                    @foreach ($book->authors as $author)
                        {{ $author->name . ($loop->last ? '' : ', ') }}
                    @endforeach
                </h5>
                <p class="mt-3">{{ $book->synopsis }}</p>
                <dl class="row mb-3 mt-4">
                    <dt class="col-md-3">Kategori</dt>
                    <dd class="col-md-9">{{ $book->category->name }}</dd>
                    <dt class="col-md-3">Penerbit</dt>
                    <dd class="col-md-9">{{ $book->publisher->name }}</dd>
                    <dt class="col-md-3">Jumlah halaman</dt>
                    <dd class="col-md-9">{{ $book->countPages($book->file) }} halaman</dd>
                    <dt class="col-md-3">Jumlah peminjaman</dt>
                    <dd class="col-md-9">{{ $book->loans_count ? "{$book->loans_count} kali" : 'Belum ada peminjaman' }}</dd>
                </dl>
                @if (auth()->check() && $book->inTheLoanPeriod())
                    <a href="{{ route('books.read', compact('book')) }}" class="btn btn-primary font-weight-semibold px-3 py-2">Baca</a>
                @else
                    <div class="d-flex">
                        @if (auth()->check() && !$existsInCart && auth()->user()->loans()->active()->count() < 2)
                            <button class="btn btn-outline-primary font-weight-semibold px-3 py-2 mr-2 add-to-cart">
                                <i class="fas fa-cart-plus mr-2"></i>
                                <span>Masukkan Keranjang</span>
                            </button>
                        @endif
                        <a href="{{ route('books.read', compact('book')) }}" class="btn btn-outline-primary font-weight-semibold px-3 py-2 mr-2">Lihat Cuplikan</a>
                        <form action="{{ route('loans.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button class="btn btn-primary font-weight-semibold px-3 py-2">Pinjam</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <h3 class="mt-5 mb-3">Penilaian</h3>
        <section class="reviews">
            @if (auth()->check() && $book->loans()->where('user_id', auth()->user()->id)->exists() && $book->reviews()->where('user_id', auth()->user()->id)->doesntExist())
                <form action="{{ route('reviews.store') }}" method="post" class="pb-3">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <h5 class="my-3">Beri buku ini penilaian</h5>
                    <div class="row align-items-center">
                        <div class="rating col-md-auto mb-3 mb-md-0"></div>
                        <input type="hidden" name="rating" id="rating">
                        <div class="col">
                            <textarea name="comment" id="comment" class="form-control" placeholder="Komentar Anda tentang buku ini ..."></textarea>
                        </div>
                    </div>
                    <div class="clearfix">
                        <button class="btn btn-primary mt-3 float-right" name="submit">Kirim Penilaian</button>
                    </div>
                </form>
            @endif
            @forelse ($rivi as $review)
                <div class="review pt-3 pb-1 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <h5>{{ $review->user->name }}</h5>
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="text-{{ $i <= $review->rating ? 'warning' : 'lightgray' }}">
                                <i class="fas fa-star"></i>
                            </span>
                        @endfor
                    </div>
                    <p class="mt-2">{{ $review->comment }}</p>
                </div>
            @empty
                <p>Tidak ada penilaian</p>
            @endforelse
            <div class="clearfix">
                <div class="float-right">
                    {{ $rivi->links() }}
                </div>
            </div>
        </section>
    </div>
    @include('partials.footer')
@endsection

@push('scripts')
    <script src="{{ asset('vendors/star-rating-svg/jquery.star-rating-svg.min.js') }}"></script>
    <script>
        $(function () {
            let rating = $('.rating')

            rating.starRating({
                starSize: 25,
                useFullStars: true,
                disableAfterRate: false,
                callback: function(currentRating) {
                    rating.next('#rating').val(currentRating)
                }
            });
        })
    </script>
@endpush

