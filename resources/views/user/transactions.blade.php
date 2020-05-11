@extends('layouts.body')
@section('title', 'Riwayat Transaksi')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row pt-5">
            <div class="col-3">
                @include('user.partials.sidenav')
            </div>
            <div class="col-9">
                <h3 class="mb-0">Riwayat Transaksi</h3>
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