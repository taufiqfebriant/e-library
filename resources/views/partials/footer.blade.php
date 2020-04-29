{{-- <footer class="footer-area footer--light">
  <div class="footer-big">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="footer-widget">
            <div class="widget-about">
              <img src="http://placehold.it/250x80" alt="" class="img-fluid">
              <p></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu footer-menu--1">
              <h4 class="footer-widget-title">Top Rated Book</h4>
              <ul>
                <li>
                  <a href="#">Book 1</a>
                </li>
                <li>
                  <a href="#">Book 1</a>
                </li>
                <li>
                  <a href="#">Book 1</a>
                </li>
                <li>
                  <a href="#">Book 1</a>
                </li>
                <li>
                  <a href="#">Book 1</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu">
              <h4 class="footer-widget-title">Categories</h4>
              <ul>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
                <li>
                  <a href="#">Category</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title">Help Support</h4>
              <ul>
                <li>
                  <a href="#">Support Forum</a>
                </li>
                <li>
                  <a href="#">Terms &amp; Conditions</a>
                </li>
                <li>
                  <a href="#">Support Policy</a>
                </li>
                <li>
                  <a href="#">Refund Policy</a>
                </li>
                <li>
                  <a href="#">FAQs</a>
                </li>
                <li>
                  <a href="#">Buyers Faq</a>
                </li>
                <li>
                  <a href="#">Sellers Faq</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>© 2020
              <a href="#">E-Library</a>. All rights reserved. Created by
              <a href="#">Syameer Technology</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>



<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- OwlCarouselJs -->
<script src="assets/Owl/owl.carousel.min.js"></script>

<!-- Circular Avatar -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="src/jquery.avatarme-1.0.min.js"></script>

<!-- cara 2 untuk pemanggilan file -->
<script src="/assets/js/script.js"></script>
<script src="/assets/js/owlScript.js"></script> --}}
<footer class="bg-darkslategray text-white text-center py-5">
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
</footer>