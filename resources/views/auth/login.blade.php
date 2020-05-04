@extends('layouts.body')

{{-- @section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/util.css">
@endsection --}}

@section('title', 'Login')
@section('content')
    {{-- <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-form-title" style="background-color: darkcyan;">
                    <span class="login100-form-title-1">
                        <h3><a href="{{ url ('/')}}" class="text-white"> E-Library </a> |  Sign In</h3> 
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">{{ __('E-Mail Address') }}</span>
                        <input id="email" type="email" class=" input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">{{ __('Password') }}</span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <!-- <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <div>
                        <a href="#" class="txt1">
                                Forgot Password?

                            </a>
                        </div> -->
                    </div>
                        <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                        {{ __('Login') }}
                        </button>
                    </div>
                    <div class="container-goto-register">
                        <br>
                        <p>Have no E-library Account? <a href="{{ route('register') }}" class="register-text">Register!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row h-100 no-gutters">
        <div class="col-7 h-100">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-8">
                        <h4 class="mb-4">Masuk</h4>
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <div class="clearfix">
                                <button type="submit" class="btn btn-darkslategray btn-block btn-lg text-base">Masuk</button>
                            </div>
                        </form>
                        <p class="text-center mb-0 mt-4">Tidak punya akun? <a href="{{ route('register') }}" class="text-darkslategray font-weight-bold">Daftar</a></p>
                        <div class="d-flex align-items-center justify-content-center pt-4">
                            <a href="{{ route('home.index') }}" class="text-darkslategray">
                                <i class="fas fa-arrow-left fa-sm mr-2"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 h-100">
            <img src="{{ asset('images/pexels/photo-of-person-s-hand-holding-ipad-3806168.webp') }}" alt="Photo of person's hand holding ipad" class="w-100 h-100 object-cover">
            <span class="position-absolute text-white font-weight-bold image-creator">Foto oleh <a class="text-white" href="https://www.pexels.com/@fotios-photos" target="_blank" rel="noopener noreferrer">Lisa Fotios</a> dari <a class="text-white" href="https://www.pexels.com" target="_blank" rel="noopener noreferrer">Pexels</a></span>
        </div>
    </div>
@endsection
