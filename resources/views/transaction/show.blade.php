@extends('layouts.body')

@yield('link')
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


@section('title', 'Transaksi')


@include('partials.navbar')


@section('content')
    <body>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <i class="fas fa-wallet" style="font-size: 128px;"></i>
                        <p>Transaksi nomor {{ $transaction->id }}</p>
                            <p>Silahkan transfer tepat sebesar</p>
                            <h4>Rp 152.258</h4>
                        <p>Pembayaran dapat dilakukan ke rekening Berikut</p>

                    <hr>
                        Rek BCA : 321654354684354
                    <hr>
                        <div class="alert alert-warning" >
                        Sudah membayar? <label for="receipt">Unggah bukti pembayaran di bawah ini.</label>
                        </div>

                    <form action="{{ route('transactions.update', compact('transaction')) }}" method="post" class="p-3" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file"  id="receipt" name="receipt">
                        <button class="btn btn-primary btn-flat" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- <p>Transaksi nomor {{ $transaction->id }}</p>
        Paket: {{ $transaction->plan->name }}
        <form action="{{ route('transactions.update', compact('transaction')) }}" method="post" class="p-3" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="receipt">Unggah bukti pembayaran</label>
                <input type="file" class="form-control" id="receipt" name="receipt">
            </div>
            <button class="btn btn-primary">Kirim</button>
        </form> -->

        @include('partials.footer')
    </body>
@endsection