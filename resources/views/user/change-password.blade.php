@extends('layouts.body')
@section('title', 'Ubah Kata Sandi')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/intl-tel-input/build/css/intlTelInput.css') }}">
@endsection

@section('content')
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row pt-5 pb-2">
            <div class="col-3">
                @include('user.partials.sidenav')
            </div>
            <div class="col-9">
                <h3 class="mb-0">Ubah Kata Sandi</h3>
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

@push('scripts')
    <script src="{{ asset('vendors/intl-tel-input/build/js/intlTelInput-jquery.min.js') }}"></script>
    <script>
        $(function () {
            var options = {
                preferredCountries: ["id"],
                separateDialCode: true,
                utilsScript: '{{ asset("vendors/intl-tel-input/build/js/utils.js") }}'
            }
            $('#phone_number').intlTelInput({...options, hiddenInput: 'phone_number'})
            $('#whatsapp').intlTelInput({...options, hiddenInput: 'whatsapp'})
        })
    </script>
@endpush