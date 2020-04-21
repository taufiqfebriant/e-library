@extends('layouts.app')

@section('head')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    @yield('links')
@endsection

@section('body')
    @yield('content')
@endsection