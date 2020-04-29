@extends('layouts.app')

@section('head')
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Library | Home</title>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"           integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>

    <!-- jquery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>
    <!-- jquey ui css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font dari google -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <!-- css master frontend -->

    <!-- 
            Ada 2 cara pemanggilan file css dan js 
            
            note : filenya di taruh di public
     -->

    <!-- cara 1 memanggil file css dan cara ke 2 ada di footer.js-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- owlcarausel -->
    <link rel="stylesheet" href="{{ asset('assets/Owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Owl/assets/owl.theme.default.min.css') }}">
    
    <!-- fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script> --}}
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/a0e3cdff18.js" crossorigin="anonymous" defer></script>
    @stack('scripts')
    <script src="{{ asset('js/script.js') }}" defer></script>
	<!-- Styles -->
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
    </body>
@endsection