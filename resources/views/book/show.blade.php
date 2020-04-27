@extends('layouts.body')
@section('links')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- owl carousel js -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:5,
                        nav:true,
                        loop:false
                    }
                }
            })
        })
    </script> 

@endsection

@section('title', 'Detail buku')


@include('partials.navbar')

@section('content')
    <body>
        <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-md-3">
            <img src="{{ asset("storage/{$book->cover}") }}" class="img-thumbnail">
            </div>
            <div class="col-md-9">

            <h3 class="text-uppercase"> {{ $book->title }} </h3>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            
            <table class="mb-5">
                <tr>
                    <td>Penulis  </td>
                    @foreach ($book->authors as $author)
                        <td>  {{ $author->name . ($loop->last ? '' : ', ') }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td>Penerbit </td>
                    <td>{{ $book->publisher->name }}</td>
                </tr>
                <tr>
                    <td>Jumlah Halaman  </td>
                    <td>{{$book->countPages($book->file)}} Halaman</td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary shadow-lg btn-flat"> Pinjam </button>
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
                <div class="media">
                    <img class="d-flex align-self-start mr-3" src="/images/user.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                    <h5 class="mt-0">Dafrin Maulana</h5>
                    <p>Wah buku ini sangat bagus sekali jadi saya memberi bintang 2</p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </div>
                </div>
                
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
    </body>
@endsection

