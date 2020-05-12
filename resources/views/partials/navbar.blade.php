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
                            @if (auth()->user()->unreadNotifications)
                                <span class="badge badge-danger navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="notificationsDropdown">
                            @forelse (auth()->user()->notifications as $notification)
                                @if (!$loop->first)
                                    <div class="dropdown-divider"></div>
                                @endif
                                @switch($notification->type)
                                    @case('App\Notifications\SubscriptionExpirationReminder')
                                        <a class="dropdown-item p-3" href="{{ route('users.show', ['user' => auth()->user()]) }}">
                                            <div class="d-flex align-items-center">
                                                <span class="text-base mr-3 text-darkslategray">&bull;</span>
                                                <p class="mb-0">Langganan Anda akan segera berakhir.</p>
                                            </div>
                                            <span class="text-muted ml-4">{{ $notification->created_at->diffForHumans() }}</span>
                                        </a>
                                        @break
                                    @default
                                        <span class="dropdown-item p-3 text-center">Kesalahan tipe notifikasi.</span>
                                @endswitch
                            @empty
                                <span class="dropdown-item p-3 text-center">Tidak ada notifikasi.</span>
                            @endforelse                    
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