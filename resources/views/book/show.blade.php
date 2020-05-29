@extends('layouts.body')
@section('title', 'Detail Buku')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/star-rating-svg/css/star-rating-svg.css') }}">
@endsection

@section('content')
    @if ($authUserReview)
        <div class="modal fade" tabindex="-1" role="dialog" id="editReviewModal">
            <div class="modal-dialog modal-dialog-centered">
                <form method="post" action="{{ route('reviews.update', ['review' => $authUserReview]) }}" class="modal-content">
                    @method('PATCH')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="rating text-center"></div>
                        <input type="hidden" name="rating" id="rating" value="{{ $authUserReview->rating }}">
                        <textarea name="comment" id="comment" class="form-control mt-4" placeholder="Komentar Anda tentang buku ini...">{{ $authUserReview->comment }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    @include('partials.navbar')
    <div class="container pt-5">
        <div class="row mt-5 mb-4 no-gutters">
            <div class="col-5 col-md-3 pr-3 pr-md-4">
                <img src="{{ asset("storage/{$book->cover}") }}" class="mw-100 border-0 bg-transparent p-0 object-cover w-100">
            </div>
            <div class="col-7 col-md-8">
                <h2 class="mt-md-2 font-weight-bold">{{ $book->title }}</h2>
                <h5 class="text-muted my-3">
                    @foreach ($book->authors as $author)
                        {{ $author->name . ($loop->last ? '' : ', ') }}
                    @endforeach
                </h5>
                <div class="d-none d-md-block">
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
                </div>
                @if (auth()->check() && $book->inTheLoanPeriod())
                    <a href="{{ $book->readPath() }}" class="btn btn-primary font-weight-semibold px-3 py-2">Baca</a>
                @else
                    <div class="d-flex flex-column flex-md-row">
                        @if (auth()->check() && !$existsInCart && auth()->user()->loans()->active()->count() < 2)
                            <button class="btn btn-outline-primary font-weight-semibold px-3 py-2 mr-2 add-to-cart">
                                <i class="fas fa-cart-plus mr-2"></i>
                                <span>Masukkan Keranjang</span>
                            </button>
                        @endif
                        <a href="{{ $book->readPath() }}" class="btn btn-outline-primary font-weight-semibold px-3 py-2 mr-2 w-100 w-md-auto">Lihat Cuplikan</a>
                        <form action="{{ route('loans.store') }}" method="post" class="mt-2 mt-md-0">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button class="btn btn-primary font-weight-semibold px-3 py-2 w-100 w-md-auto">Pinjam</button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="col-12 d-md-none">
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
            </div>
        </div>
        @if (auth()->check() && $book->reviews()->where('user_id', auth()->user()->id)->exists())
            <section class="your-review">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Penilaian Anda</h3>
                    <div class="dropdown dropleft">
                        <button class="btn btn-light bg-transparent" type="button" id="yourReviewAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="yourReviewAction">
                            <button class="dropdown-item" data-toggle="modal" data-target="#editReviewModal" type="button">Ubah</button>
                            <a class="dropdown-item" href="#">Hapus</a>
                        </div>
                    </div>
                </div>
                <div class="review pt-3 pb-1">
                    <h5>{{ $authUserReview->user->name }}</h5>
                    <div class="stars">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="text-{{ $i <= $authUserReview->rating ? 'warning' : 'lightgray' }}">
                                <i class="fas fa-star"></i>
                            </span>
                        @endfor
                    </div>
                    <p class="mt-2">{{ $authUserReview->comment }}</p>
                </div>
            </section>
        @endif
        <section class="reviews">
            <h3 class="mt-4 mb-3">Penilaian</h3>
            @if (auth()->check() && $book->loans()->where('user_id', auth()->user()->id)->exists() && $book->reviews()->where('user_id', auth()->user()->id)->doesntExist())
                <form action="{{ route('reviews.store') }}" method="post" class="pb-3">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <h5 class="my-3">Beri buku ini penilaian</h5>
                    <div class="row align-items-center">
                        <div class="rating col-md-auto mb-3 mb-md-0"></div>
                        <input type="hidden" name="rating" id="rating">
                        <div class="col">
                            <textarea name="comment" id="comment" class="form-control" placeholder="Komentar Anda tentang buku ini..."></textarea>
                        </div>
                    </div>
                    <div class="clearfix">
                        <button class="btn btn-primary mt-3 float-right" name="submit">Kirim Penilaian</button>
                    </div>
                </form>
            @endif
            <div class="content">
                @include('book.partials.reviews')
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

            if (rating.length > 0) {
                rating.starRating({
                    starSize: 25,
                    useFullStars: true,
                    disableAfterRate: false,
                    callback: function(currentRating) {
                        rating.next('#rating').val(currentRating)
                    }
                });
    
                rating.starRating('setRating', $('#rating').val())
            }
        })
    </script>
@endpush

