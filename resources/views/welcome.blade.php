@extends('layouts.masterFrontend')

@section('content')

    <section id="jumbotrons" class="jumbotron jumbotron-fluid mb-0">        
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-8 ">
                    <h4 class="text-white display-4">
                        <b>
                            Decorate your life by reading books
                        </b>
                    </h4>
                    <input type="search" class="form-control form-control-lg mt-5" placeholder="Find the book you like">
                </div>
            </div>
        </div>
    </section>

    <!-- buku -->
    <section id="buku" class="buku">
        <div class="container">
            <div class="row mt-5 mb-3">
                <div class="col-md-12">
                    <b>News Books</b>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme shadow">
                        <div class="item">
                            <div class="">
                                <div class="card border-0 shadow">
                                    <img class="card-img-top" src="/images/hp.jpg" alt="Card image cap">
                                    <div class="card-body"> Some more card content </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="">
                                <div class="card border-0 shadow">
                                    <img class="card-img-top" src="/images/hp.jpg" alt="Card image cap">
                                    <div class="card-body"> Some more card content </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="">
                                <div class="card border-0 shadow">
                                    <img class="card-img-top" src="/images/hp.jpg" alt="Card image cap">
                                    <div class="card-body"> Some more card content </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="">
                                <div class="card border-0 shadow">
                                    <img class="card-img-top" src="/images/hp.jpg" alt="Card image cap">
                                    <div class="card-body"> Some more card content </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /owl -->
                </div>
            <!-- /col-md-12 -->
            </div>
        </div>
    </section>

    <!-- 3 buku terbaik -->
    <section id="bukuTerbaik" class="bukuTerbaik">
        <div class="container">
            <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <b>3 of the best books</b>
                    </div>
            </div>
            <div class="row mb-5">

                <div class="col-md-4">
                    <div class="card bg-dark text-white border-0">
                        <img src="/images/bg-ui.png" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="card mb-3 border-0 mt-3" style="max-width: 300px;" id="card-non-bg">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img src="/images/hp.jpg" class="card-img align-items-center" alt="...">
                                    </div>
                                    <div class="col-md-8"">
                                    <div class="card-body">
                                        <h5 class="card-title"> <b>Harry Potter </b>
                                        </h5>
                                        <p class="card-text">By J.K. Rowling</p>
                                        <p class="card-text">Rating</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white border-0">
                        <img src="/images/bg-ui.png" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="card mb-3 border-0 mt-3" style="max-width: 300px;" id="card-non-bg">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img src="/images/hp.jpg" class="card-img align-items-center" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <b>Harry Potter </b>
                                        </h5>
                                        <p class="card-text">J.K. Rowling</p>
                                        <p class="card-text">Rating</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white border-0">
                        <img src="/images/bg-ui.png" class="card-img" alt="...">
                        <div class="card-img-overlay">
                            <div class="card mb-3 border-0 mt-3" style="max-width: 300px;" id="card-non-bg">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                    <img src="/images/hp.jpg" class="card-img align-items-center" alt="...">
                                    </div>
                                    <div class="col-md-8"">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Harry Potter </b></h5>
                                        <p class="card-text">J.K. Rowling</p>
                                        <p class="card-text">Rating</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- semua buku -->
    <section class="semuaBuku" id="semuaBuku">
        <div class="container">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <b>Browse</b>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Laskar Pelangi </h5>
                                    <p class="card-text">
                                        <small class="text-muted">Andrea Hirata</small><br>
                                        <b>Rating</b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold ">Laskar Pelangi </h5>
                                    <p class="card-text">.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Laskar Pelangi </h5>
                                    <p class="card-text">.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Laskar Pelangi </h5>
                                    <p class="card-text">.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Laskar Pelangi </h5>
                                    <p class="card-text">.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 " style="max-width: 310px;">
                        <div class="row no-gutters">
                            <div class="col-md-5 d-flex">
                            <img src="/images/Laskar_Pelangi.jpg" class="card-img align-items-center" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Laskar Pelangi </h5>
                                    <p class="card-text">.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection
