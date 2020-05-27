@extends('layouts.body')
@section('title', 'Akun saya')

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
                    <h3 class="mb-0">Data Pribadi</h3>
                    <div>
                        <a href="{{ route('users.edit', compact('user')) }}" class="btn btn-primary">Ubah</a>
                        <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#userNavModal">
                            <i class="fas fa-ellipsis-h fa-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Nama</div>
                            <div class="col-lg-10">{{ $user->name }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Usia</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->age ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Alamat</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->address ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Email</div>
                            <div class="col-lg-10 mb-0">{{ $user->email }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Nomor ponsel</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->phone_number ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">WhatsApp</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->whatsapp ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Instagram</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->instagram ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Facebook</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->facebook ?? '-' }}</div>
                            <div class="col-12 px-2">
                                <hr>
                            </div>
                            <div class="col-lg-2 text-uppercase tracking-widest small font-weight-bold">Twitter</div>
                            <div class="col-lg-10 mb-0">{{ $user->profile->twitter ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection