<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-member bg-white">
    <div class="container justify-content-center">
        <a class="navbar-brand font-weight-semibold text-lowercase" href="{{ url('/') }}">
            {{ config('app.name', 'E-Library') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content between" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-2">
                    <a href="#" class="nav-link text-body">Temukan Buku</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('plans.index') }}" class="nav-link text-body">Paket</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item position-relative cart-icon-wrapper px-2">
                    <a href="{{ route('cart.index') }}" class="nav-link text-body">
                        <i class="fas fa-shopping-cart"></i>
                        @if (auth()->check() && \Cart::session(auth()->user()->id)->getContent()->count())
                            <span class="badge badge-primary navbar-badge">{{ \Cart::session(auth()->user()->id)->getContent()->count() }}</span>
                        @endif
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item pl-2">
                        <a href="{{ route('login') }}" class="nav-link text-body">Masuk</a>
                    </li>
                @else
                    <li class="nav-item dropdown px-2">
                        <a id="notificationsDropdown" class="nav-link font-weight-semibold position-relative text-body" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
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
                        <a id="navbarDropdown" class="nav-link font-weight-semibold dropdown-toggle text-body" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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