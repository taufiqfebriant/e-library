@extends('admin.layouts.body')

@section('title', 'Ubah Buku')
@section('body-class', 'sidebar-mini')

@section('links')
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/ekko-lightbox/ekko-lightbox.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                        <h1>Ubah Buku</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <form class="form-horizontal" method="post" action="{{ route('admin.books.update', compact('book')) }}" enctype="multipart/form-data">
                                @method('PATCH')

                                @include('admin.book.partials.form')
                            </form>
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('vendors/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendors/admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();

            //Initialize Select2 Elements
            $(".select2bs4").select2({
                theme: "bootstrap4"
            });
        })
    </script>
@endpush