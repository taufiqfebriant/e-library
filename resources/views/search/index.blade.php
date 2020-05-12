@extends('layouts.body')
@section('title', 'Pencarian Buku')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/star-rating-svg/css/star-rating-svg.css') }}">
@endsection

@section('content')
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mb-3">Saring data</h5>
                    <form method="get" action={{ route('search.index')}}>
                        <input type="text" name="q" value="{{ request()->q }}" class="form-control" placeholder="Ketik judul buku...">
                        <div class="card mt-3">
                            <div class="card-header">Kategori</div>
                            <div class="card-body">
                                @foreach ($categories as $category)
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="category{{ $category->id }}" name="category_id" value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">Minimal Penilaian</div>
                            <div class="card-body">
                                <div class="rating"></div>
                            </div>
                        </div>
                        <button class="btn btn-darkslategray text-uppercase btn-block mt-3">Terapkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row">
            <div class="col-12 pt-5 pt-lg-4 pb-4">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Pencarian buku</h3>
                    <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#filterModal">
                        <i class="fas fa-sliders-h fa-lg"></i>
                    </button>
                </div>
            </div>
            <form class="col-lg-3 d-none d-lg-block" method="get" action={{ route('search.index')}}>
                <input type="text" name="q" value="{{ request()->q }}" class="form-control" placeholder="Ketik judul buku...">
                <div class="card mt-3">
                    <div class="card-header">Kategori</div>
                    <div class="card-body">
                        @foreach ($categories as $category)
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="category{{ $category->id }}" name="category_id" value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'checked' : '' }}>
                                <label class="custom-control-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Minimal Penilaian</div>
                    <div class="card-body">
                        <div class="rating"></div>
                    </div>
                </div>
                <button class="btn btn-darkslategray text-uppercase btn-block mt-3">Terapkan</button>
            </form>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a href="{{ route('books.show', compact('book')) }}" class="text-decoration-none transition-3d-hover">
                                <img src="{{ asset("storage/{$book->cover}") }}" alt="Sampul {{ $book->cover }}" class="img-fluid rounded">
                                <h6 class="text-base text-body mt-2 mb-1">{{ Str::words($book->title, 5, '...') }}</h6>
                                <p class="text-muted mb-0">
                                    @foreach ($book->authors as $author)
                                        {{ $author->name . ($loop->last ? '' : ', ') }}
                                    @endforeach
                                </p>
                                <div class="stars">
                                    @if ($book->reviews_count)
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="text-{{ $i <= $book->reviews->sum('rating') / $book->reviews_count ? 'warning' : 'lightgray' }}">
                                                <i class="fas fa-star"></i>
                                            </span>
                                        @endfor
                                    @else
                                        <span class="text-body">Belum ada penilaian</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

@push('scripts')
    <script src="{{ asset('vendors/star-rating-svg/jquery.star-rating-svg.min.js') }}"></script>
    <script>
        $(function () {
            const urlParams = new URLSearchParams(window.location.search);
            const ratingParam = urlParams.get('rating');
            let rating = $('.rating')

            rating.starRating({
                starSize: 25,
                useFullStars: true,
                disableAfterRate: false,
                callback: function(currentRating) {
                    if ($('#rating').length > 0) {
                        $('#rating').val(currentRating)                        
                    } else {
                        rating.parent().append(`<input type="hidden" name="rating" id="rating" value="${currentRating}">`)
                    }
                }
            });

            if (ratingParam) {
                rating.starRating('setRating', ratingParam)
            }
        })
    </script>
@endpush