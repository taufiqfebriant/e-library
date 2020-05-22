@extends('layouts.app')

@section('head')
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('links')
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('body')
    <body>
        <div id="app" class="vh-100">
            @includeWhen(session('message'), 'partials.toast', ['message' => session('message'), 'type' => session('type')])
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/a0e3cdff18.js" crossorigin="anonymous"></script>
        @stack('scripts')
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
@endsection