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
                            <h1>Pengaturan</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <form class="card" action="{{ route('admin.settings.update') }}" method="post">
                        <div class="card-body">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="bankName" class="col-sm-2 col-form-label">Nama Bank</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" id="bankName" value="{{ old('bank_name', settings()->get('bank_name')) }}" required>
                                    @error('bank_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bankAccountNumber" class="col-sm-2 col-form-label">Nomor Rekening</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('bank_account_number') is-invalid @enderror" name="bank_account_number" min="0" id="bankAccountNumber" value="{{ old('bank_account_number', settings()->get('bank_account_number')) }}" required>
                                    @error('bank_account_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        @include('admin.partials.footer')
    </div>
@endsection