@extends('layouts.body')
@section('title', 'Ubah Data Pribadi')

@section('links')
    <link rel="stylesheet" href="{{ asset('vendors/intl-tel-input/build/css/intlTelInput.css') }}">
@endsection

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
        <div class="row pt-5">
            <div class="col-lg-3 d-none d-lg-block">
                @include('user.partials.sidenav')
            </div>
            <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Ubah Data Pribadi</h3>
                    <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#userNavModal">
                        <i class="fas fa-ellipsis-h fa-lg"></i>
                    </button>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <form method="post" action="{{ route('users.update', compact('user')) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama" name="name" id="name" required value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-sm-2 col-form-label">Usia</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" class="form-control" placeholder="Usia" name="age" id="age" value="{{ old('age', $user->profile->age ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Alamat" name="address" id="address" rows="4">{{ old('address', $user->profile->address ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone_number" class="col-sm-2 col-form-label">Nomor ponsel</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="phone_number" class="form-control" value="{{ old('phone_number', $user->profile->phone_number ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="whatsapp" class="col-sm-2 col-form-label">WhatsApp</label>
                                <div class="col-sm-10">
                                    <input type="tel" id="whatsapp" class="form-control" value="{{ old('whatsapp', $user->profile->whatsapp ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="instagram-addon">instagram.com/</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Pengguna Instagram" aria-label="Nama Pengguna Instagram" aria-describedby="instagram-addon" id="instagram" name="instagram" value="{{ old('instagram', $user->profile->instagram ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="facebook-addon">facebook.com/</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Pengguna Facebook" aria-label="Nama Pengguna Facebook" aria-describedby="facebook-addon" id="facebook" value="{{ old('facebook', $user->profile->facebook ?? '') }}" name="facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="twitter-addon">twitter.com/</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nama Pengguna Twitter" aria-label="Nama Pengguna Twitter" aria-describedby="twitter-addon" id="twitter" name="twitter" {{ old('twitter', $user->profile->twitter ?? '') }}>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <button class="btn btn-primary float-right">Perbarui</button>
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