@extends('layouts.body')
@section('title', 'Ubah Kata Sandi')

@section('content')
    <div class="modal fade" id="userNavModal" tabindex="-1" role="dialog" aria-labelledby="userNavModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @include('user.partials.sidenav')
                </div>
            </div>
        </div>
    </div>
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row pt-5 pb-2">
            <div class="col-lg-3 d-none d-lg-block">
                @include('user.partials.sidenav')
            </div>
            <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Ubah Kata Sandi</h3>
                    <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#userNavModal">
                        <i class="fas fa-ellipsis-h fa-lg"></i>
                    </button>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <form method="post" action="{{ route('users.update-password', compact('user')) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row align-items-center">
                                <label for="current_password" class="col-sm-2 col-form-label">Kata sandi lama</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" required>
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="password" class="col-sm-2 col-form-label">Kata sandi baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi kata sandi baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" required>
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-darkslategray float-right">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection