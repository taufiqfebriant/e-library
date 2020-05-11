@extends('admin.layouts.body')

@section('title', 'Detail Transaksi')
@section('body-class', 'sidebar-mini')

@section('links')
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endsection

@section('content')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.partials.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('admin.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-12">
                        <h1>Detail Transaksi</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Nama member</dt>
                                    <dd class="col-sm-10">{{ $transaction->user->name }}</dd>
                                    <dt class="col-sm-2">Paket</dt>
                                    <dd class="col-sm-10">{{ $transaction->plan->name }}</dd>
                                    <dt class="col-sm-2">Harga</dt>
                                    <dd class="col-sm-10">@money($transaction->plan->price, 'IDR', true)</dd>
                                    <dt class="col-sm-2">Bukti pembayaran</dt>
                                    <dd class="col-sm-10">
                                        @if ($transaction->paid_at && $transaction->receipt)
                                            <a href="{{ route('admin.transactions.receipt', $transaction->id) }}" data-toggle="lightbox" data-type="image">
                                                <img src="{{ route('admin.transactions.receipt', $transaction->id) }}" alt="Bukti pembayaran transaksi nomor {{ $transaction->id }}" style="width: 400px">
                                            </a>
                                        @else
                                            Member belum melakukan pembayaran.
                                        @endif
                                    </dd>
                                </dl>
                            </div>
                            <form class="card-footer" action="{{ route('admin.transactions.update', compact('transaction')) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.transactions.index') }}" class="btn btn-default">Kembali</a>
                                    @if ($transaction->paid_at && $transaction->receipt && !$transaction->confirmed_at && !$transaction->confirmed_by)
                                        <button class="btn btn-primary">Konfirmasi</button>
                                    @endif
                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
    @include('admin.partials.footer')
</div>
@endsection

@push('scripts')
<!-- Ekko Lightbox -->
<script src="{{ asset('vendors/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@endpush