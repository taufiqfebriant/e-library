@extends('layouts.body')

@section('title', 'Paket')

@section('content')
<body>
    @foreach ($plans as $plan)
        <form action="{{ route('transactions.store') }}" method="post">
            @csrf
            
            <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
            {{ $plan->name }}
            <ul>
                <li>{{ $plan->description }}</li>
                <li>{{ $plan->price }}</li>
            </ul>
            <button class="btn btn-primary d-block mb-3">Langganan</button>
        </form>
    @endforeach
</body>
@endsection