@extends('layouts.masterFrontEnd')

@section('content')
<!-- <div class="container">
    <div class="row align-items-xl-start p-5">
        <div class="package__card-wrapper  col-12 col-md-4">
            <div class="package__card package">
                <p class="package__label package__label--bronze">Packet Member 1</p>
                <h5 class="package__package-title">Brownze Member</h5>
                <p class="package__discount-price">Rp 100.000</p>
                <div class="package__hr"></div>
                <a href="#" class="el-btn el-btn--orange no-gutters gtmProductView" data-product="Brownze" data-label="Section Table Price">Buy Now!</a>
                <p class="package__description">Suitable for anyone who just started reading books</p>
                    <ul class="package__feature">
                    <li>
                        <p class="package__feature-text">Lorem ipsum</p>
                        </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                </ul>
                <a class="package__see-detail" href="#">Lihat detail fitur</a>
            </div> 
        </div>
        <div class="package__card-wrapper  col-12 col-md-4 col">
            <div class="package__card package">
                <p class="package__label package__label--bronze">Packet Member 1</p>
                <h5 class="package__package-title">Brownze Member</h5>
                <p class="package__discount-price">Rp 100.000</p>
                <div class="package__hr"></div>
                <a href="#" class="el-btn el-btn--orange no-gutters gtmProductView" data-product="Brownze" data-label="Section Table Price">Buy Now!</a>
                <p class="package__description">Suitable for anyone who just started reading books</p>
                    <ul class="package__feature">
                    <li>
                        <p class="package__feature-text">Lorem ipsum</p>
                        </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                </ul>
                <a class="package__see-detail" href="#">Lihat detail fitur</a>
            </div> 
        </div>
        <div class="package__card-wrapper  col-12 col-md-4 col-xl-3">
            <div class="package__card package">
                <p class="package__label package__label--bronze">Packet Member 1</p>
                <h5 class="package__package-title">Brownze Member</h5>
                <p class="package__discount-price">Rp 100.000</p>
                <div class="package__hr"></div>
                <a href="#" class="el-btn el-btn--orange no-gutters gtmProductView" data-product="Brownze" data-label="Section Table Price">Buy Now!</a>
                <p class="package__description">Suitable for anyone who just started reading books</p>
                    <ul class="package__feature">
                    <li>
                        <p class="package__feature-text">Lorem ipsum</p>
                        </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                    <li>
                    <p class="package__feature-text">Lorem ipsum</p>
                    </li>
                </ul>
                <a class="package__see-detail" href="#">Lihat detail fitur</a>
            </div> 
        </div>
    </div>
</div> -->

<div class="container text-center">
    <div class="row mb-5 mt-5">
        <div class="col-12">
            <h3 class="text-uppercase font-weight-bold text-info">Take your subscription</h3>
            <p class="text-center my-3">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum minus, aut veniam dolores eum consequatur dolorem neque tempore, inventore ullam quam id commodi tenetur rerum nam blanditiis hic quisquam praesentium quis! Nulla omnis repudiandae quo quis rerum reprehenderit! Veniam blanditiis similique nam est, a cupiditate ipsa quaerat rerum ad laudantium quae excepturi fuga veritatis, aliquid eos. Rerum odio aliquam amet!
            </p>
        </div>
    </div>

    <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <div class="card-header bg-info text-white">
                            <p class="card-text font-weight-bold ">Paket 1</p>
                        </div>
                    </div>
                    <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" style="margin-left: 80px" width="50%">
                    <div class="card-body">
                        <p class="card-text my-5">
                            Hanya dapat menambahkan 4 hari saja dalam 1 minggu
                        </p>
                    </div>
                    <div class="card-text font-weight-bold p-4">
                        <button class="btn  btn-outline-info">Order Now! <i class="far fa-arrow-alt-circle-right"></i> </button>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body ">
                        <div class="card-header bg-info">
                            <p class="card-text font-weight-bold text-white">Paket 2</p>
                        </div>
                    </div>
                    <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" width="50%">
                    <div class="card-body">
                        <p class="card-text my-5">
                            Hanya dapat menambahkan 7 hari saja dalam 1 minggu
                        </p>
                    </div>
                    <div class="card-text font-weight-bold p-4">
                        <button class="btn  btn-outline-info">Order Now! <i class="far fa-arrow-alt-circle-right"></i> </button>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <div class="card-header bg-info">
                            <p class="card-text font-weight-bold text-white">Paket 3</p>
                        </div>
                    </div>
                    <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" width="50%">
                    <div class="card-body">
                        <p class="card-text my-5">
                            Hanya dapat menambahkan 14 hari 
                        </p>
                    </div>
                    <div class="card-text font-weight-bold p-4">
                        <button class="btn btn-outline-info">Order Now! <i class="far fa-arrow-alt-circle-right"></i> </button>
                    </div>
                </div>

            </div>
        </div>
    
</div>
@endsection