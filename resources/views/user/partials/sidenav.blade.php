<nav class="nav side-nav flex-column text-base font-weight-bold border rounded">
    <a class="nav-link" href="{{ route('users.show', compact('user')) }}">Data pribadi</a>
    <a class="nav-link" href="{{ route('users.books', compact('user')) }}">Riwayat peminjaman</a>
    <a class="nav-link" href="{{ route('users.transactions', compact('user')) }}">Riwayat transaksi</a>
    <a class="nav-link" href="{{ route('users.change-password', compact('user')) }}">Ubah kata sandi</a>
</nav>