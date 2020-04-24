@extends('layouts.body')
@section('title', 'Transaksi')

@section('content')
    <body>
        <p>Transaksi nomor {{ $transaction->id }}</p>
        Paket: {{ $transaction->plan->name }}
        <form action="{{ route('transactions.update', compact('transaction')) }}" method="post" class="p-3" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="receipt">Unggah bukti pembayaran</label>
                <input type="file" class="form-control" id="receipt" name="receipt">
            </div>
            <button class="btn btn-primary">Kirim</button>
        </form>
    </body>
@endsection