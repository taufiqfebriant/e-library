@extends('admin.layouts.body')

@section('title', 'Detail Buku')
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
                        <h1>Detail Buku</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Judul</dt>
                                    <dd class="col-sm-10">{{ $book->title }}</dd>
                                    <dt class="col-sm-2">Sinopsis</dt>
                                    <dd class="col-sm-10">{{ $book->synopsis }}</dd>
                                    <dt class="col-sm-2">Sampul</dt>
                                    <dd class="col-sm-10">
                                        @if ($book->cover)
                                            <a href="{{ $book->file('cover') }}" data-toggle="lightbox">
                                                <img src="{{ $book->file('cover') }}" class="img-thumbnail" style="width: 150px">
                                            </a>
                                        @endif
                                    </dd>
                                    <dt class="col-sm-2">Penulis</dt>
                                    <dd class="col-sm-10">
                                        @foreach ($book->authors as $author)
                                            {{ $author->name . ($loop->last ? '' : ', ') }}
                                        @endforeach
                                    </dd>
                                    <dt class="col-sm-2">Kategori</dt>
                                    <dd class="col-sm-10">{{ $book->category->name }}</dd>
                                    <dt class="col-sm-2">Kategori</dt>
                                    <dd class="col-sm-10">{{ $book->publisher->name }}</dd>
                                    <dt class="col-sm-2">Jumlah halaman</dt>
                                    <dd class="col-sm-10">{{ $book->pages }} halaman</dd>
                                </dl>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.books.index') }}" class="btn btn-default">Kembali</a>
                                <div class="float-right">
                                    <a href="{{ route('admin.books.preview', compact('book')) }}" class="btn btn-primary d-flex align-items-center" target="_blank">
                                        <span class="mr-2">Lihat cuplikan</span>
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </div>
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