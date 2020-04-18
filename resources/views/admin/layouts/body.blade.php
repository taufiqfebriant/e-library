@extends('layouts.app')

@section('head')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @yield('links')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendors/admin-lte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('body')
    <body class="@yield('body-class')">
        @yield('content')
        <!-- jQuery -->
        <script src="{{ asset('vendors/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('vendors/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @stack('scripts')
        <!-- AdminLTE App -->
        <script src="{{ asset('vendors/admin-lte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
@endsection