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
                                    <dt class="col-sm-3">Judul</dt>
                                    <dd class="col-sm-9">{{ $book->title }}</dd>
                                    <dt class="col-sm-3">Sinopsis</dt>
                                    <dd class="col-sm-9">{{ $book->synopsis }}</dd>
                                    <dt class="col-sm-3">Sampul</dt>
                                    <dd class="col-sm-9">
                                        @if ($book->cover)
                                        <a href="{{ asset("storage/{$book->cover}") }}" data-toggle="lightbox">
                                            <img src="{{ asset("storage/{$book->cover}") }}" class="img-thumbnail"
                                                style="width: 150px">
                                        </a>
                                        @else
                                        Tidak ada sampul
                                        @endif
                                    </dd>
                                    <dt class="col-sm-3">Penulis</dt>
                                    <dd class="col-sm-9">
                                        @foreach ($book->authors as $author)
                                        {{ $author->name . ($loop->last ? '' : ', ') }}
                                        @endforeach
                                    </dd>
                                    <dt class="col-sm-3">Kategori</dt>
                                    <dd class="col-sm-9">{{ $book->category->name }}</dd>
                                    <dt class="col-sm-3">Penerbit</dt>
                                    <dd class="col-sm-9">{{ $book->publisher->name }}</dd>
                                    <dt class="col-sm-3">Jumlah halaman</dt>
                                    <dd class="col-sm-9">{{ $book->countPages($book->file) }} halaman</dd>
                                    <dt class="col-sm-3">Jumlah halaman cuplikan</dt>
                                    <dd class="col-sm-9">{{ $book->preview }} halaman</dd>
                                    <dt class="col-sm-3">Tampilkan sebagai buku unggulan</dt>
                                    <dd class="col-sm-9">{{ $book->featured ? 'Ya' : 'Tidak' }}</dd>
                                </dl>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.books.index') }}" class="btn btn-default">Kembali</a>
                                    <a href="{{ $book->readPath() }}" class="btn btn-primary">Lihat buku</a>
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