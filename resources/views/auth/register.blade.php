@extends('layouts.body')
@section('title', 'Daftar')

@section('links')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/util.css">  --}}
@endsection

@section('content')
    {{-- <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-color: darkcyan;">
                    <span class="login100-form-title-1">
                        {{ __('Register') }}
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">{{ __('Name') }}</span>
                        <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <span class="focus-input100"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">{{ __('E-Mail Address') }}</span>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">{{ __('Password') }}</span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">{{ __('Confirm Password') }}</span>
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                    </div>
                    
                    
                        <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                        {{ __('Register') }}
                        </button>
                    </div>
                    <div class="container-goto-register">
                        <br>
                        <p>Already have Account? <a href="{{ route('login') }}">SignUp!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="row h-100 no-gutters">
        <div class="col-lg-7 h-100">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-8">
                        <h4 class="mb-4">Daftar</h4>
                        <form action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Kategori yang Anda sukai</label>
                                <select class="form-control select2bs4 @error('category_id') is-invalid @enderror" name="category_id[]" id="category_id" multiple="multiple" style="width: 100%" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary btn-block btn-lg text-base">Daftar</button>
                            </div>
                        </form>
                        <p class="text-center mb-0 mt-4">Sudah mempunyai akun? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Masuk</a></p>
                        <div class="d-flex align-items-center justify-content-center pt-4 text-primary">
                            <i class="fas fa-arrow-left fa-xs mr-2"></i>
                            <a href="{{ route('home.index') }}" class="text-primary">Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block h-100">
            <img src="{{ asset('images/pexels/photo-of-person-s-hand-holding-ipad-3806168.webp') }}" alt="Photo of person's hand holding ipad" class="w-100 h-100 object-cover">
            <span class="position-absolute text-white font-weight-bold image-creator">Foto oleh <a class="text-white" href="https://www.pexels.com/@fotios-photos" target="_blank" rel="noopener noreferrer">Lisa Fotios</a> dari <a class="text-white" href="https://www.pexels.com" target="_blank" rel="noopener noreferrer">Pexels</a></span>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('vendors/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4"
            });
        })
    </script>
@endpush