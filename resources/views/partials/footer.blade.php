<footer class="bg-dark text-white py-4 py-md-5">
  <div class="container">
    <div class="row justify-content-sm-center align-items-sm-center">
      <div class="col-9 col-md-3">
        <img src="{{ asset('images/logo/logo-lg-horizontal.webp') }}" alt="Horizontal logo" class="w-100 h-100">
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
        <p class="mt-3 my-sm-0">&copy; {{ now()->year . ' ' . Str::of(config('app.name', 'Rumah_Cahaya_FLP_Saudi_Arabia'))->replace('_', ' ') }}. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>