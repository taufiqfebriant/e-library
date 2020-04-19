<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.partials.header')
    <body>

    <section id="navigation" class="navigation">
        <!-- navigation -->
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/satubuku" class="nav-link">Tapai</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    @can('manage-users')
                                    <a href="{{ route('admin.users.index') }}" class="dropdown-item">
                                        User Management
                                    </a>
                                    @endcan

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

  
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">
        <div class="navbar-header d-flex col">
            <a class="navbar-brand" href="/"><b>E-Library</b></a>  		
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle navbar-toggler ml-auto">
                <span class="navbar-toggler-icon"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>			
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu">					
                        <li><a href="#" class="dropdown-item">Web Design</a></li>
                        <li><a href="#" class="dropdown-item">Web Development</a></li>
                        <li><a href="#" class="dropdown-item">Graphic Design</a></li>
                        <li><a href="#" class="dropdown-item">Digital Marketing</a></li>
                    </ul>
                </li>
                <li class="nav-item active"><a href="/paket" class="nav-link">Packets</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            </ul>		
            <ul class="nav navbar-nav navbar-right ml-auto">			
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i class="fas fa-search"></i></a>
                    <!-- <a data-toggle="dropdown" class="nav-link dropdown-toggle hide" href="#"><i class="fa fa-close"></i></a> -->
                    <ul class="dropdown-menu">
                        <li>
                            <form>
                                <div class="input-group search-box">								
                                    <input type="text" id="search" class="form-control" placeholder="Search here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </span>
                                </div>
                            </form>                        
                        </li>
                    </ul>
                </li>
                <a href="#" class="nav-link"><li class="nav-item-circular nav-item-circular d-flex align-items-center justify-content-center"><span>I</span></li></a>
                <a href="#" class="nav-link"><li class="nav-item"><span class="user-name">Ibnu Batutah</span></li></a>
            </ul>
        </div>
    </nav>
    </section>

  

        <!-- cadangan -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link " href="#">Link</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    @if (Route::has('login'))
                    <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                                @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </form>
            </div>
        </nav> -->


            <!-- content -->
        @yield('content')

      
        @include('layouts.partials.footer')

    </body>
</html>
