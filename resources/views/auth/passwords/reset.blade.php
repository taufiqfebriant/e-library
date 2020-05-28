@extends('layouts.body')

@section('title', 'Atur Ulang Password')
@section('content')
    <div class="row h-100 no-gutters">
        <div class="col-lg-7 h-100">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-8">
                        <h4 class="mb-4">Atur Ulang Password</h4>
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Konfirmasi Password Baru</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary btn-block btn-lg text-base">Atur Ulang Password</button>
                            </div>
                        </form>
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
