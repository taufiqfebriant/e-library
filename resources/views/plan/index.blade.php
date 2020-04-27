@extends('layouts.body')

@section('title', 'Paket')

@section('content')
<body>
    <div class="container text-center">
        <div class="row mb-5 mt-5">
            <div class="col-12">
                <h3 class="text-uppercase font-weight-bold text-info">Take your subscription</h3>
                <p class="text-center my-3">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum minus, aut veniam dolores eum consequatur dolorem neque tempore, inventore ullam quam id commodi tenetur rerum nam blanditiis hic quisquam praesentium quis! Nulla omnis repudiandae quo quis rerum reprehenderit! Veniam blanditiis similique nam est, a cupiditate ipsa quaerat rerum ad laudantium quae excepturi fuga veritatis, aliquid eos. Rerum odio aliquam amet!
                </p>
            </div>
        </div>

        <div class="row mt-5 mb-5">

        
    <!-- @foreach ($plans as $plan)
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
    @endforeach -->

        @foreach ($plans as $plan)
            <form class="col-md-4" action="{{ route('transactions.store') }}" method="post">
                @csrf
                
                <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <div class="card-header bg-info text-white">
                            <p class="card-text font-weight-bold ">{{ $plan->name }}</p>
                        </div>
                    </div>
                    <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" style="margin-left: 80px" width="50%">
                    <div class="card-body">
                        <p class="card-text my-5">
                        {{ $plan->description }}
                        </p>
                        <p class="card-text my-5">
                        Rp{{ $plan->price }}
                        <br>{{ $plan->months }} bulan
                        </p>
                    </div>
                    <div class="card-text font-weight-bold p-4">
                        <button class="btn  btn-outline-info">Langganan <i class="far fa-arrow-alt-circle-right"></i> </button>
                    </div>
                </div>
            </form>
        @endforeach
                <!-- <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body ">
                            <div class="card-header bg-info">
                                <p class="card-text font-weight-bold text-white">Paket 2</p>
                            </div>
                        </div>
                        <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" width="50%">
                        <div class="card-body">
                            <p class="card-text my-5">
                                Hanya dapat menambahkan 7 hari saja dalam 1 minggu
                            </p>
                        </div>
                        <div class="card-text font-weight-bold p-4">
                            <button class="btn  btn-outline-info">Order Now! <i class="far fa-arrow-alt-circle-right"></i> </button>
                        </div>
                    </div>
    
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0 h-100">
                        <div class="card-body">
                            <div class="card-header bg-info">
                                <p class="card-text font-weight-bold text-white">Paket 3</p>
                            </div>
                        </div>
                        <img src="/images/coins2.png" alt="Card image" class="p-3 marginLeft" width="50%">
                        <div class="card-body">
                            <p class="card-text my-5">
                                Hanya dapat menambahkan 14 hari 
                            </p>
                        </div>
                        <div class="card-text font-weight-bold p-4">
                            <button class="btn btn-outline-info">Order Now! <i class="far fa-arrow-alt-circle-right"></i> </button>
                        </div>
                    </div>
    
                </div> -->
        </div>
    </div>
</body>
@endsection