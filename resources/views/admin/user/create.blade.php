@extends('admin.layouts.body')

@section('title', 'Tambah Pengguna')
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
                        <h1>Tambah Pengguna</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <form class="form-horizontal" method="post" action="{{ route('admin.users.store') }}">
                                @include('admin.user.partials.form')
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