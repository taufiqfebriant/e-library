<nav class="navbar navbar-expand-md navbar-dark pt-3 pb-2 bg-transparent fixed-top navbar-user {{ auth()->check() ? 'navbar-authenticated' : '' }}">
    <div class="container">
        <a class="navbar-brand pt-0" href="{{ url('/') }}">
            {{ config('app.name', 'E-Library') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item border-right border-dark pr-2">
                    <a href="{{ route('plans.index') }}" class="nav-link font-weight-semibold">Paket</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item d-md-none">
                        <a href="{{ route('login') }}" class="nav-link font-weight-semibold">Masuk</a>
                    </li>
                    <li class="nav-item d-none d-md-list-item">
                        <a class="btn btn-light nav-link px-3 text-body font-weight-semibold" href="{{ route('login') }}">Masuk</a>
                    </li>
                @else
                    <li class="nav-item dropdown px-2">
                        <a id="notificationsDropdown" class="nav-link font-weight-semibold position-relative" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell fa-lg"></i>
                            @if (auth()->user()->unreadNotifications->isNotEmpty())
                                <span class="badge badge-darkslategray navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0 overflow-auto" aria-labelledby="notificationsDropdown" style="max-height: 300px; width: 350px">
                            <div class="d-flex justify-content-center h-100 align-items-center py-3">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link font-weight-semibold dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('users.show', auth()->user()) }}" class="dropdown-item">
                                Akun saya
                            </a>
                            @if (Auth::user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item">
                                    Panel Admin
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>