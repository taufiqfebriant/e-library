@extends('admin.layouts.body')

@section('title', 'Buku')
@section('body-class', 'sidebar-mini')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
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
                    <div class="row mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1>Buku</h1>
                        </div>
                        <div class="col-auto">
                            <a href={{ route('admin.books.create') }} class="btn btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {{ $dataTable->table() }}
                                </div>
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
    <!-- DataTables -->
    <script src="{{ asset('vendors/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush