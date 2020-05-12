@extends('layouts.body')
@section('title', 'Detail Buku')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/star-rating-svg/css/star-rating-svg.css') }}">
@endsection

@section('content')
    @include('partials.navbar')
    <div class="container pt-5">
        <div class="row mt-5 mb-4">
            <div class="col-md-4">
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
                    <dd class="col-md-9">{{ $book->users_count ? "{$book->users_count} kali" : 'Belum ada peminjaman' }}</dd>
                </dl>
                @if (auth()->check() && $book->hasUser())
                    <a href="{{ route('books.read', compact('book')) }}" class="btn btn-primary btn-lg">Baca</a>
                @else
                    <div class="d-flex">
                        <form action="{{ route('books.update', compact('book')) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-primary btn-lg mr-2">Pinjam</button>
                        </form>
                        <a href="{{ route('books.read', compact('book')) }}" class="btn btn-darkslategray btn-lg">Lihat Cuplikan</a>
                    </div>
                @endif
            </div>
        </div>
        <h4 class="mt-5 mb-3">Penilaian</h4>
        <hr>
        <section class="reviews">
            @forelse ($book->reviews as $review)
                @if (auth()->check() && $book->users->contains(auth()->user()->id))
                <!-- <form action="{{ route('reviews.store') }}" method="post" class="pb-3">
                    @csrf

                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <h4 class="my-3">Beri buku ini penilaian</h4>
                    <div class="row align-items-center">
                        <div class="rating col-md-auto mb-3 mb-md-0"></div>
                        <input type="hidden" name="rating" id="rating">
                        <div class="col">
                            <textarea name="comment" id="comment" class="form-control" placeholder="Komentar Anda tentang buku ini ..."></textarea>
                        </div>
                    </div>
                    <div class="clearfix">
                        <button class="btn btn-primary mt-3 float-right">Kirim Penilaian</button>
                    </div>
                </form> -->
                @endif
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
                @if (auth()->check() && $book->users->contains(auth()->user()->id))
                <form action="{{ route('reviews.store') }}" method="post" class="pb-3">
                    @csrf

                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <h4 class="my-3">Beri buku ini penilaian</h4>
                    <div class="row align-items-center">
                        <div class="rating col-md-auto mb-3 mb-md-0"></div>
                        <input type="hidden" name="rating" id="rating">
                        <div class="col">
                            <textarea name="comment" id="comment" class="form-control" placeholder="Komentar Anda tentang buku ini ..."></textarea>
                        </div>
                    </div>
                    <div class="clearfix">
                        <button class="btn btn-primary mt-3 float-right">Kirim Penilaian</button>
                    </div>
                </form>
                @else
                    <p>Tidak ada penilaian</p>
                @endif
            @endforelse

            {{ $review->links() }}
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

