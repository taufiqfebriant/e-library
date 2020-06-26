<nav class="navbar navbar-expand-md navbar-light fixed-top navbar-member bg-white">
    <div class="container align-items-center flex-wrap">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo/logo.webp') }}" alt="Logo">
        </a>
        <div class="ml-auto d-flex d-md-none align-items-center">
            @auth
                <div class="dropdown px-2" style="position: unset">
                    <a id="mobileNotificationsDropdown" class="font-weight-semibold position-relative text-body dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        @if (auth()->user()->unreadNotifications->isNotEmpty())
                            <span class="badge badge-primary navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu py-0 overflow-auto mw-100 mt-0 rounded-0" aria-labelledby="mobileNotificationsDropdown" style="max-height: 300px;">
                        <div class="d-flex justify-content-center h-100 align-items-center py-3">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            <a href="{{ route('cart.index') }}" class="text-body px-2">
                <i class="fas fa-shopping-cart"></i>
                @if (auth()->check() && \Cart::session(auth()->user()->id)->getContent()->count())
                    <span class="badge badge-primary navbar-badge">{{ \Cart::session(auth()->user()->id)->getContent()->count() }}</span>
                @endif
            </a>
            <a href="#" class="text-body px-2 navbar-search-toggler">
                <i class="fas fa-search"></i>
            </a>
            <button class="btn btn-sm border ml-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item px-2">
                    <a href="{{ route('home.index') }}" class="nav-link text-body">Beranda</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('categories.index') }}" class="nav-link text-body">Kategori</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('plans.index') }}" class="nav-link text-body">Paket</a>
                </li>
            </ul>
            <form action="{{ route('search.index') }}" method="get" class="w-100 mx-md-5 d-none d-lg-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ketik judul buku, penulis, kategori, atau penerbit..." aria-label="Ketik judul buku, penulis, kategori, atau penerbit..." aria-describedby="search-button" name="q" value="{{ request()->q }}" required>
                    <div class="input-group-append">
                        <button button class="btn btn-primary" type="button" id="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav @if (!auth()->check()) ml-auto @endif">
                <li class="nav-item px-2 d-none d-md-block d-lg-none my-auto">
                    <button class="btn btn-light bg-transparent navbar-search-toggler py-0">
                        <i class="fas fa-search"></i>
                    </button>
                </li>
                <li class="nav-item position-relative cart-icon-wrapper px-2 d-none d-md-block">
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
                        <a id="notificationsDropdown" class="nav-link font-weight-semibold position-relative text-body dropdown-toggler" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            @if (auth()->user()->unreadNotifications->isNotEmpty())
                                <span class="badge badge-primary navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
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
        <form action="{{ route('search.index') }}" method="get" class="w-100 navbar-search collapse d-lg-none">
            <div class="input-group py-2">
                <input type="text" class="form-control" placeholder="Ketik judul buku, penulis, kategori, atau penerbit..." aria-label="Ketik judul buku, penulis, kategori, atau penerbit..." aria-describedby="search-button-mobile" name="q" value="{{ request()->q }}" required>
                <div class="input-group-append">
                    <button button class="btn btn-primary" type="button" id="search-button-mobile">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</nav>