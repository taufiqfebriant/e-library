@extends('layouts.body')
@section('title', 'Paket')

@section('content')
    @include('partials.navbar')
    <div class="container space-2">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="font-weight-semibold text-center">Paket</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            @forelse ($plans as $plan)
                <form class="col-lg-4 mb-3 mb-lg-0" action="{{ route('transactions.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                    <div class="card plan text-center h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $plan->name }}</h4>
                            <p class="card-text mt-4">{{ $plan->description }}</p>
                            <h5 class="d-block">@money($plan->price, 'IDR', true) - {{ $plan->months }} bulan</h5>
                            <button class="btn btn-primary mt-3">Langganan</button>
                        </div>
                    </div>
                </form>
            @empty
                <div class="col-12 text-center space-3">Tidak ada data.</div>
            @endforelse
        </div>
    </div>
    @include('partials.footer')
@endsection