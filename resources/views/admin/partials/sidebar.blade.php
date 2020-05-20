<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home.index') }}" class="brand-link">
        <i class="fas fa-book ml-3 mr-2"></i>
        <span class="brand-text font-weight-light">{{ config('app.name', 'E-Library') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel py-3 d-flex align-items-center">
            <div class="image">
                <div class="bg-white rounded-circle text-center d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                    <span>{{ auth()->user()->initials() }}</span>
                </div>
            </div>
            <div class="info">
                <span class="text-white">{{ auth()->user()->name }}</span>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.authors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Penulis
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.publishers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Penerbit
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.books.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Buku
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.plans.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Paket
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.transactions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscriptions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Langganan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.loans.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>
                            Pinjaman
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>