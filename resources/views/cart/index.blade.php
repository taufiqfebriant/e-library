@extends('layouts.body')
@section('title', 'Keranjang')

@section('content')
    @include('partials.navbar')
    <main class="space-2">
        <div class="container">
            <h3 class="mt-4 mb-3">Keranjang</h3>
            <div class="row">
                <div class="col-7">
                    @forelse ($cart as $item)
                        <div class="col-12 mb-3 px-0">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <img src="{{ asset("storage/{$item->attribute->cover}") }} alt="Book cover"> --}}
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <form action="{{ route("cart.destroy", ['cart' => $item->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-link">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p>Tidak ada buku.</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection