@extends('layouts.body')
@section('title', 'Keranjang')

@section('content')
    @include('partials.navbar')
    <main class="space-top-2 space-bottom-5">
        <div class="container">
            <h3 class="mt-4 mb-3">Keranjang</h3>
            <div class="row">
                @forelse ($cart as $item)
                    <div class="col-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ asset("storage/{$item->attributes->cover}") }}" alt="Book cover" class="img-fluid">
                                    </div>
                                    <div class="col-9 pl-0">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <form action="{{ route("cart.destroy", ['cart' => $item->id]) }}" method="post">
                                            class="col-3">
                                            <img src="{{ asset("storage/{$item->attributes->cover}") }}" alt="Book cover" class="img-fluid">
                                        </div>
                                        <div class="col-9">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <form action="{{ route("cart.destroy", ['cart' => $item->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-link">Hapus</button>
                                            </form>
                                        </di          @method('DELETE')
                                            @csrf
                                            <button class="btn btn-link px-0">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center">Tidak ada buku.</p>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div class="col-12 text-right mt-3">
                    <form action="{{ route('loans.cart') }}" method="post">
                        @csrf
                        <button class="btn btn-primary">Pinjam</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection