@extends('layouts.body')
@section('title', 'Riwayat Peminjaman')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
        <div class="row pt-5 pb-3">
            <div class="col-lg-3 d-none d-lg-block">
                @include('user.partials.sidenav')
            </div>
            <div class="col-lg-9">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Riwayat Peminjaman</h3>
                    <button class="btn btn-lavender d-lg-none" data-toggle="modal" data-target="#userNavModal">
                        <i class="fas fa-ellipsis-h fa-lg"></i>
                    </button>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('vendors/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush