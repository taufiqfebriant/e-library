@extends('layouts.body')
@section('title', 'Pencarian Buku')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/star-rating-svg/css/star-rating-svg.css') }}">
@endsection

@section('content')
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row">
            <div class="col-12 py-4">
                <h3>Pencarian buku</h3>
            </div>
            <form class="col-md-3" method="get" action={{ route('search.index')}}>
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
                    {{-- <a href="#" class="list-group-item active">Categories
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">Horror
                        <span class="label label-primary pull-right">234</span>
                        </li>
                        <li class="list-group-item">Action
                        <span class="label label-success pull-right">34</span>
                        </li>
                        <li class="list-group-item">Mystery
                         <span class="label label-danger pull-right">4</span>
                        </li>
                        <li class="list-group-item">Comedy
                             <span class="label label-info pull-right">434</span>
                        </li>
                        <li class="list-group-item">Category
                             <span class="label label-success pull-right">34</span>
                        </li>
                    </ul> --}}
                </div>
                <div class="card mt-3">
                    <div class="card-header">Minimal Penilaian</div>
                    <div class="card-body">
                        <div class="rating"></div>
                    </div>
                    {{-- <p href="#" class="list-group-item active list-group-item-success">Authors
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">Author 1
                             <span class="label label-danger pull-right">300</span>
                        </li>
                        <li class="list-group-item">Author 2
                             <span class="label label-success pull-right">340</span>
                        </li>
                        <li class="list-group-item">Author 3
                             <span class="label label-info pull-right">735</span>
                        </li>
                    </ul> --}}
                </div>
                <button class="btn btn-darkslategray text-uppercase btn-block mt-3">Terapkan</button>
                {{-- <div>
                    <h2>Star Rating</h2>
                    <a href="#">
                        <div class="5-stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="4-stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </a>
                    <a href="#"> 
                        <div class="3-stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="2-stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="1-star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </a>
                </div> --}}
            </form>
            <div class="col-md-9">
                {{-- <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Category</a></li>
                        <li class="active">Mystery</li>
                    </ol>
                </div> --}}
                {{-- <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>1235  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
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
                            {{-- <div class="thumbnail book-box">
                                <img src="{{ asset("storage/{$book->cover}") }}" alt="Book's cover" class="img-fluid">
                                <div class="caption">
                                    <h3 class="text-center"><a href="#">Book 1 </a></h3>
                                    <p>Author : <strong>Author 1</strong>  </p>
                                    <p>Rating :</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vitae dignissimos   </p>
                                    <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                    {{-- <!-- /.col -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="thumbnail book-box">
                            <img src="img/books/Buku2 Rumah Cahaya Online2.jpg" alt="" />
                            <div class="caption">
                                <h3 class="text-center"><a href="#">Book 2 </a></h3>
                                <p>Author : <strong>Author 2</strong>  </p>
                                <p>Rating :</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vitae dignissimos   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="thumbnail book-box">
                            <img src="img/books/Buku2 Rumah Cahaya Online3.jpg" alt="" />
                            <div class="caption">
                                <h3 class="text-center"><a href="#">Book 3</a></h3>
                                <p>Author : <strong>Author 3</strong>  </p>
                                <p>Rating :</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vitae dignissimos   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> --}}
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