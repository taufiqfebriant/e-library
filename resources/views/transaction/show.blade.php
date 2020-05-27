@extends('layouts.body')
@section('title', 'Transaksi')

@section('content')
    @include('partials.navbar')
    <div class="container space-top-3 space-bottom-2">
        <div class="row">
            <div class="col-12 text-center pb-4">
                <h1 class="text-uppercase font-weight-bold text-primary">Transaksi</h1>
            </div>
            <div class="col-lg-auto py-4 pr-4 border-lg-right">
                <h5 class="text-black-50">Nomor Transaksi</h5>
                <h3 class="mb-4">#{{ $transaction->id }}</h3>
                <h5 class="text-black-50">Tanggal transaksi</h5>
                <h3 class="mb-4">{{ $transaction->created_at }}</h3>
                <h5 class="text-black-50">Paket</h5>
                <h3 class="mb-4">{{ $transaction->plan->name }}</h3>
                <h5 class="text-black-50">Harga</h5>
                <h3 class="mb-4">@money($transaction->plan->price, 'IDR', true)</h3>
            </div>
            <div class="col pl-4 my-auto">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h5>Transfer ke nomor rekening</h5>
                        <h3 class="mb-0">BCA 0123456789</h3>
                    </div>
                    <span class="text-primary">
                        <i class="fas fa-exchange-alt fa-4x"></i>
                    </span>
                </div>
                <hr>
                <h5>Sudah transfer? Unggah bukti pembayaran di bawah ini</h5>
                <form action="{{ route('transactions.update', compact('transaction')) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input @error('receipt') is-invalid @enderror" id="receipt" name="receipt">
                        <label class="custom-file-label" for="receipt">Pilih file</label>
                        @error('receipt')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="clearfix mt-3">
                        <button class="btn btn-primary float-right" type="submit">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection

@push('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('vendors/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        })
    </script>
@endpush