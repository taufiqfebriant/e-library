@extends('layouts.body')

@section('title', 'Akun saya')

@section('content')
    <body>
        <section id="userProfile" class="userProfile">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-dataPribadi-tab" data-toggle="pill" href="#v-pills-dataPribadi" role="tab" aria-controls="v-pills-dataPribadi" aria-selected="true">Data Pribadi</a>
                            <a class="nav-link" id="v-pills-bukuSaya-tab" data-toggle="pill" href="#v-pills-bukuSaya" role="tab" aria-controls="v-pills-bukuSaya" aria-selected="false">Buku Saya</a>
                            <a class="nav-link" id="v-pills-gantiPassword-tab" data-toggle="pill" href="#v-pills-gantiPassword" role="tab" aria-controls="v-pills-gantiPassword" aria-selected="false">Ganti Password</a>

                        </div>
                    </div>
                    <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- data pribadi -->
                        <div class="tab-pane fade show active" id="v-pills-dataPribadi" role="tabpanel" aria-labelledby="v-pills-dataPribadi-tab">
                            <div class="container">
                                <div class="row text-center mt-4">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                    {{ session()->get('success') }}  
                                    </div><br />
                                @endif
                                    <div class="col-12">
                                        <h3>Data Pribadi</h3>
                                        <p>Info tentang saya sendiri seperti nama,kontak,No. telp,dll</p>
                                    </div>
                                </div>
                                <div class="row ml-5">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-body">
                                            <h4 class="card-title">  
                                                <h3>Profil</h3>
                                                <p> info terkait dengan data diri anda  </p>
                                            </h4>
                                            <div class="card-text">
                                                <table class="table table-light">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td> {{ $user->name }} </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <h4 class="card-title">  
                                                <h3>Info Kontak</h3>
                                            <div class="card-text">
                                                <table class="table table-light">
                                                    <tbody>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td> {{$user->email}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Whatsapp</td>
                                                            <td> {{$user->whatsapp}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Twitter</td>
                                                            <td> {{$user->twitter}} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Instagram</td>
                                                            <td>{{$user->instagram}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Facebook</td>
                                                            <td>{{$user->facebook}}</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit Profile</a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!-- buku saya -->
                        <div class="tab-pane fade" id="v-pills-bukuSaya" role="tabpanel" aria-labelledby="v-pills-bukuSaya-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="./images/binatang.jpg" alt="Card image cap">
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
                                    <div class="col-md-6">
                                        <div class="card h-100">
                                            <img class="card-img-top" src="./images/binatang.jpg" alt="Card image cap">
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
                        <!-- ganti password -->
                        <div class="tab-pane fade" id="v-pills-gantiPassword" role="tabpanel" aria-labelledby="v-pills-gantiPassword-tab">
                            <div class="container">
                                <div class="row mt-4 text-center">
                                    <div class="col-md-12 col-12">
                                        <h3>Ganti Password</h3>
                                    </div>
                                </div>
                                <div class="row ml-5">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-text">
                                                    <form action="{{ route('users.changepassword') }}" method="POST">
                                                        @csrf 
   
                                                        @foreach ($errors->all() as $error)
                                                            <p class="text-danger">{{ $error }}</p>
                                                        @endforeach 
                                                        <table class="table table-light">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Password Lama</td>
                                                                    <td><input type="password" name="current_password" id="" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Password Baru</td>
                                                                    <td><input type="password" name="new_password" id="" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Konfirmasi Password</td>
                                                                    <td><input type="password" name="new_confirm_password" id=" " class="form-control"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                   
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <input type="submit" class="btn btn-block btn-primary " value="Ubah">
                                            </div>

                                            </form>
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
    </body>
@endsection