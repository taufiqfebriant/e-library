@extends('admin.layouts.body')

@section('title', 'Detail Pengguna')
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
                        <h1>Detail Pengguna</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Nama</dt>
                                    <dd class="col-sm-10">{{ $user->name }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Email</dt>
                                    <dd class="col-sm-10">{{ $user->email }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Hak Akses</dt>
                                    <dd class="col-sm-10">{{ Str::ucfirst($user->roles->pluck('name')->implode(',')) }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Umur</dt>
                                    <dd class="col-sm-10">{{ $user->profile->age ?? '-' }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Nomor Ponsel</dt>
                                    <dd class="col-sm-10">{{ $user->profile->phone_number ?? '-' }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">WhatsApp</dt>
                                    <dd class="col-sm-10">{{ $user->profile->whatsapp ?? '-' }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Instagram</dt>
                                    <dd class="col-sm-10">{{ $user->profile->instagram ?? '-' }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Facebook</dt>
                                    <dd class="col-sm-10">{{ $user->profile->facebook ?? '-' }}</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-2">Twitter</dt>
                                    <dd class="col-sm-10">{{ $user->profile->twitter ?? '-' }}</dd>
                                </dl>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-default">Kembali</a>
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