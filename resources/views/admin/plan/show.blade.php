@extends('admin.layouts.body')

@section('title', 'Detail Paket')
@section('body-class', 'sidebar-mini')

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
                        <h1>Detail Paket</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Nama</dt>
                                    <dd class="col-sm-10">{{ $plan->name }}</dd>
                                    <dt class="col-sm-2">Deskripsi</dt>
                                    <dd class="col-sm-10">{{ $plan->description }}</dd>
                                    <dt class="col-sm-2">Harga</dt>
                                    <dd class="col-sm-10">@money($plan->price, 'IDR', true)</dd>
                                    <dt class="col-sm-2">Durasi</dt>
                                    <dd class="col-sm-10">{{ $plan->months }} bulan</dd>
                                </dl>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.plans.index') }}" class="btn btn-default">Kembali</a>
                            </div>
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