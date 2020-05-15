@extends('layouts.body')
@section('title', 'Tinjauan akun')

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
        <div class="row pt-5 pb-3">
            <div class="col-lg-3 d-none d-lg-block">
                @include('user.partials.sidenav')
            </div>
            <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Tinjauan Akun</h3>
                    <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#userNavModal">
                        <i class="fas fa-ellipsis-h fa-lg"></i>
                    </button>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="card flex-row align-items-center p-3">
                                    <i class="fas fa-book fa-3x"></i>
                                    <div class="pl-3">
                                        <h4>{{ auth()->user()->loans()->count() }}</h4>
                                        <span>Buku dipinjam</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="card flex-row align-items-center p-3">
                                    <i class="fas fa-exchange-alt fa-3x"></i>
                                    <div class="pl-3">
                                        <h4>{{ auth()->user()->transactions()->count() }}</h4>
                                        <span>Transaksi</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="card flex-row align-items-center p-3">
                                    <i class="fas fa-star fa-3x"></i>
                                    <div class="pl-3">
                                        <h4>{{ auth()->user()->reviews()->count() }}</h4>
                                        <span>Penilaian</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="card p-3">
                                    <h4>Langganan</h4>
                                    <div class="row align-items-center mt-3">
                                        @if (auth()->user()->subscription)
                                            <div class="col-lg-4 text-uppercase tracking-widest small font-weight-bold">Tanggal berlangganan</div>
                                            <div class="col-lg-8">{{ auth()->user()->subscription->created_at }}</div>
                                            <div class="col-12 px-2">
                                                <hr>
                                            </div>
                                            <div class="col-lg-4 text-uppercase tracking-widest small font-weight-bold">Diperbarui pada</div>
                                            <div class="col-lg-8">{{ auth()->user()->subscription->updated_at }}</div>
                                            <div class="col-12 px-2">
                                                <hr>
                                            </div>
                                            <div class="col-lg-4 text-uppercase tracking-widest small font-weight-bold">Berakhir pada</div>
                                            <div class="col-lg-8">{{ auth()->user()->subscription->ends_at }}</div>
                                        @else
                                            <div class="col-12">
                                                <p>Anda belum berlangganan.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection