@extends('layouts.body')

@section('content')

<body>
    @include('partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Categories
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
                    </ul>
                </div>
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active list-group-item-success">Authors
                    </a>
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
                    </ul>
                </div>
                <!-- /.div -->
 
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Category</a></li>
                        <li class="active">Mystery</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
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
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="img/books/Buku2 Rumah Cahaya Online1.jpg" alt="" />
                            <div class="caption">
                                <h3 class="text-center"><a href="#">Book 1 </a></h3>
                                <p>Author : <strong>Author 1</strong>  </p>
                                <p>Rating :</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vitae dignissimos   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
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
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="img/books/Buku2 Rumah Cahaya Online3.jpg" alt="" />
                            <div class="caption">
                                <h3 class="text-center"><a href="#">Book 3</a></h3>
                                <p>Author : <strong>Author 3</strong>  </p>
                                <p>Rating :</p>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illo vitae dignissimos   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    @include('partials.footer')
</body>

@endsection