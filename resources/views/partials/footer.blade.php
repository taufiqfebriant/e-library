{{-- <footer class="bg-darkslategray text-white text-center py-5">
    <div class="d-flex justify-content-center align-items-center">
        <a class="h4 mb-0 text-white text-decoration-none" href="{{ route('home.index') }}">{{ config('app.name', 'E-Library') }}</a>
        <div class="pl-4">
            <ul class="nav nav-white">
                <li class="nav-item">
                    <a class="nav-link pl-0" href="#">Tentang kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jelajahi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Peta situs</a>
                </li>
            </ul>
            <p class="text-left mt-0">&copy; {{ now()->year . ' ' . config('app.name', 'E-Library') }}. All rights reserved.</p>
        </div>
    </div>
</footer> --}}
<footer class="bg-darkslategray text-white py-4 py-md-5">
  <div class="container">
    <div class="row justify-content-sm-center align-items-sm-center">
      <div class="col-sm-auto">
        <a class="h4 mb-0 text-white text-decoration-none" href="{{ route('home.index') }}">{{ config('app.name', 'E-Library') }}</a>
      </div>
      <div class="col-sm-auto">
        <ul class="nav nav-white">
            <li class="nav-item">
                <a class="nav-link px-0 pr-2 pr-sm-3" href="#">Tentang kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0 pr-2 pr-sm-3" href="#">Jelajahi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0 pr-2 pr-sm-3" href="#">Kontak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-0" href="#">Peta situs</a>
            </li>
        </ul>
        <p class="mt-3 my-sm-0">&copy; {{ now()->year . ' ' . config('app.name', 'E-Library') }}. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>