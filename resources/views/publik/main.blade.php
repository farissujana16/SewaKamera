<!DOCTYPE html>
<html lang="en">


<!-- molla/index-2.html  22 Nov 2019 09:55:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>High Speed Kamera</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('pelanggan/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('pelanggan/images/highspeed-02.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('pelanggan/images/highspeed-02.png') }}">
    <link rel="manifest" href="{{ asset('pelanggan/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('pelanggan/images/highspeed-02.png') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('pelanggan/images/highspeed-02.png') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">

    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('pelanggan/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('pelanggan/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('pelanggan/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('pelanggan/css/style.css') }}">
</head>

<body id="home">
    <div class="page-wrapper">
        <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ url('/') }}" class="logo">
                          <br>
                            <img src="{{ asset('pelanggan/images/highspeed.png') }}" alt="Molla Logo" width="105" height="25">
                            <br>
                        </a>
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="megamenu-container">
                                    <a href="#home" class="">Home</a>
                                </li>
                                <li class="megamenu-container">
                                    <a href="#about" class="">About</a>
                                </li>
                                <li class="megamenu-container">
                                    <a href="#kategori" class="">Catergori</a>
                                </li>
                                <li class="megamenu-container">
                                    <a href="#barang" class="">Equipment</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                      <div class="header-search">
                          <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                          <form action="{{ url('/cari') }}" method="post">
                            @csrf
                              <div class="header-search-wrapper">
                                  <label for="q" class="sr-only">Search</label>
                                  <input type="text" class="form-control" name="cari" id="q" placeholder="Search in..." required>
                              </div><!-- End .header-search-wrapper -->
                          </form>
                      </div><!-- End .header-search -->

                      <div class="dropdown cart-dropdown">
                          <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                              <i class="icon-shopping-cart"></i>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right">

                              <div class="dropdown-cart-action">
                                  <a href="{{ url('/keranjang') }}" class="btn btn-primary">View Cart</a>
                                  <a href="{{ url('/checkout') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                              </div><!-- End .dropdown-cart-total -->
                          </div><!-- End .dropdown-menu -->
                      </div><!-- End .cart-dropdown -->
                      <div class="dropdown cart-dropdown">
                          <a style="font-size: 14pt; font-family: Helvetica" href="{{ url('/masuk') }}" class="">
                              Login
                          </a>
                          &ensp; | &ensp;
                          <a style="font-size: 14pt; font-family: Helvetica" href="{{ url('/register') }}" class="">
                          Register
                          </a>
                      </div><!-- End .cart-dropdown -->
                  </div><!-- End .header-right -->
                  <br>
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
        <main class="main">
            <div class="container mt-5">
	        	<div class="page-header page-header-big text-center" style="background-image: url('pelanggan/images/alat.jpg')">
        			<h1 class="page-title text-white">Highspeed Padang<span class="text-white">Jasa sewa alat fotografi</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">

                    <div class="mb-5"></div><!-- End .mb-4 -->
                </div><!-- End .container -->

                <div id="about" class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <h2 class="title mt-5">Highspeed Padang</h2><!-- End .title -->
                                <p class="lead text-primary mb-3">Jasa sewa alat fotografi, kamera, lensa dll <br>terbesar dan terpercaya di Padang</p><!-- End .lead text-primary -->
                                <p class="mb-2">Highspeed Studio merupakan usaha yang bergerak dibidang jasa sewa alat fotografi terpercaya, murah, dan terbesar di kota Padang dan sekitarnya. </p>

                            </div><!-- End .col-lg-5 -->

                            <div class="col-lg-6 offset-lg-1">
                                <div class="about-images">
                                    <!-- <img src="pelanggan/images/alat_1.jpg" alt="" class="about-img-front"> -->
                                    <img src="pelanggan/images/alat_2.jpg" alt="" class="about-img-front">
                                </div><!-- End .about-images -->
                            </div><!-- End .col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->
    		<div id="kategori" class="container categories pt-2">
          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          <br>
          @endif
        		<h2 class="title-lg text-center mb-4">Kategori</h2><!-- End .title-lg text-center -->

        		<div class="row">
        			<div class="col-6 col-lg-4">
        				<div class="banner banner-display banner-link-anim">
                			<a href="{{ url('/pembeli/kamera') }}">
                				<img src="{{ asset('pelanggan/images/banners/home/kamera_2.jpg') }}" alt="Banner">
                			</a>

                			<div class="banner-content banner-content-center">
                				<h3 class="banner-title text-white"><a href="#">Kamera</a></h3><!-- End .banner-title -->
                				<a href="{{ url('/pembeli/kamera') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->
        			</div><!-- End .col-sm-6 col-lg-3 -->
        			<div class="col-6 col-lg-4 order-lg-last">
        				<div class="banner banner-display banner-link-anim">
                			<a href="{{ url('/pembeli/lighting') }}">
                				<img src="{{ asset('pelanggan/images/banners/home/Lighting.jpg') }}" alt="Banner">
                			</a>

                			<div class="banner-content banner-content-center">
                				<h3 class="banner-title text-white"><a href="#">Lighting</a></h3><!-- End .banner-title -->
                				<a href="{{ url('/pembeli/lighting') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                			</div><!-- End .banner-content -->
            			</div><!-- End .banner -->
        			</div><!-- End .col-sm-6 col-lg-3 -->
        			<div class="col-sm-12 col-lg-4 banners-sm">
                        <div class="row">
            				<div class="banner banner-display banner-link-anim col-lg-12 col-6">
                    			<a href="{{ url('/pembeli/lensa') }}">
                    				<img src="{{ asset('pelanggan/images/banners/home/Lensa.jpg') }}" alt="Banner">
                    			</a>

                    			<div class="banner-content banner-content-center">
                    				<h3 class="banner-title text-white"><a href="#">Lensa</a></h3><!-- End .banner-title -->
                    				<a href="{{ url('/pembeli/lensa') }}" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    			</div><!-- End .banner-content -->
                			</div><!-- End .banner -->

                			<div class="banner banner-display banner-link-anim col-lg-12 col-6">
                    			<a href="{{ url('/pembeli/stabilizer') }}">
                    				<img src="{{ asset('pelanggan/images/banners/home/Stabilizer.jpg') }}" alt="Banner">
                    			</a>

                    			<div class="banner-content banner-content-center">
                    				<h3 class="banner-title text-white"><a href="#">Stabilizer</a></h3><!-- End .banner-title -->
                    				<a href="" class="btn btn-outline-white banner-link">Shop Now<i class="icon-long-arrow-right"></i></a>
                    			</div><!-- End .banner-content -->
                			</div><!-- End .banner -->
                        </div>
        			</div><!-- End .col-sm-6 col-lg-3 -->
        		</div><!-- End .row -->
    		</div><!-- End .container -->

        <div class="mb-5"></div><!-- End .mb-6 -->


        <div id="barang" class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Detail Barang</h2><!-- End .title -->
            </div><!-- End .heading -->

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                    <div class="products">
                        <div class="row justify-content-center">

                          <!-- data produk -->
                          @foreach ($info as $barang)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-11 mt-v3 text-center">
                                    <figure class="product-media">
                                        <a href="{{ url("/detail/$barang->id_barang") }}">
                                            <img src="{{ asset("pelanggan/images/products/$barang->foto") }}" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->
                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{ url("/detail/$barang->id_barang") }}">{{ $barang->nama_barang }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                          Rp.  {{ $barang->harga_barang }} / hari
                                        </div><!-- End .product-price -->
                                        <h2 class="product-title"> Stok : {{ $barang->stok_barang }}</h2>
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- .End .tab-pane -->

            </div><!-- End .tab-content -->
        </div><!-- End .container -->


</main><!-- End .main -->

  <footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="widget widget-about">
                <img src="{{ asset('pelanggan/images/highspeed.png') }}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                <p>Tempat penyewaan kamera dan perlengakapan terlengkap di kota Padang. </p>

                <div class="social-icons">
                  <a href="https://web.facebook.com/highspeedpdg/?_rdc=1&_rdr" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                  <a href="https://twitter.com/highspeedpdg" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                  <a href="https://www.instagram.com/highspeedpdg/?hl=id" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                  <a href="https://www.google.com/maps/dir/-0.9002857,100.3610186/high+speed+padang/@-0.913843,100.3518355,15z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x2fd4b8df4988ac9d:0x63056144c3dae110!2m2!1d100.367069!2d-0.9273517" class="social-icon" title="Youtube" target="_blank"><i class="icon-map-marker"></i></a>
                </div><!-- End .soial-icons -->
              </div><!-- End .widget about-widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->

            <div class="col-sm-6 col-lg-3">
              <div class="widget">
                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                <ul class="widget-list">
                  <li><a href="{{ url('/masuk') }}">Sign In</a></li>
                  <li><a href="{{ url('/keranjang') }}">View Cart</a></li>
                  <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                  <li><a href="#">Track My Order</a></li>
                  <li><a href="#">Help</a></li>
                </ul><!-- End .widget-list -->
              </div><!-- End .widget -->
            </div><!-- End .col-sm-6 col-lg-3 -->
          </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
      <div class="container">
        <p class="footer-copyright">Copyright © 2021 Faris Syafiq Sujana. All Rights Reserved.</p><!-- End .footer-copyright -->

      </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
  </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->



<!-- Sign in / Register Modal -->


<!-- Plugins JS File -->
<script src="{{ asset('pelanggan/js/jquery.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/jquery.hoverIntent.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/superfish.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('pelanggan/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('pelanggan/js/main.js') }}"></script>
</body>


<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>
