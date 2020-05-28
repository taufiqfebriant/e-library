@extends('layouts.body')

@section('title', 'Lupa Password')
@section('content')
    <div class="row h-100 no-gutters">
        <div class="col-lg-7 h-100">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-8">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="mb-4">Atur Ulang Password</h4>
                        <form action="{{ route('password.email') }}" method="post">
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
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary btn-block btn-lg text-base">Kirim</button>
                            </div>
                        </form>
                        <div class="d-flex align-items-center justify-content-center pt-4 text-primary">
                            <i class="fas fa-arrow-left fa-xs mr-2"></i>
                            <a href="{{ route('login') }}" class="text-primary">Kembali</a>
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
