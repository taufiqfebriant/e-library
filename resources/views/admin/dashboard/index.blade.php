@extends('admin.layouts.body')

@section('title', 'Dashboard (Admin)')
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
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalBukudiPinjam }}</h3>

                                <p>Buku terpinjam</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalSemuaBuku }}</h3>

                                <p>Total Buku</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Kategori terlaris bulan ini</h3>

                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="display: block;">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kategori</th>
                                                    <th>Jumlah pinjaman</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($kategoriTerfavorit as $kl)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kl->name }}</td>
                                                    <td>{{ $kl->loans_count }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Buku terlaris bulan ini</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="display: block;">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Buku</th>
                                                    <th>Jumlah pinjaman</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($judulBukuTerfavorit as $jbt)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $jbt->title }}</td>
                                                        <td>{{ $jbt->loans_count }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        @include('admin.partials.footer')
    </div>
@endsection