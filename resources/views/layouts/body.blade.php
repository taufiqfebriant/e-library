@extends('layouts.app')

@section('head')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<style>
		*{
			font-family: 'Poppins', sans-serif;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="/assets_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets_login/css/main.css">
	

@endsection

@section('body')
    @yield('content')
@endsection