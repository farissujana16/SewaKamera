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
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('pelanggan/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('pelanggan/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('pelanggan/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('pelanggan/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('pelanggan/images/icons/favicon.ico') }}">
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

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="{{ url('/pembeli') }}" class="logo">
                          <br>
                            <img src="{{ asset('pelanggan/images/highspeed.png') }}" alt="Molla Logo" width="105" height="25">
                            <br>
                        </a>
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
                          <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                              <i class="icon-user"></i>
                              <p>{{ auth()->user()->name }}</p>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                                  <a href="{{ url('/logout') }}" class="btn btn-primary">Log Out</a>
                          </div><!-- End .dropdown-menu -->
                      </div><!-- End .cart-dropdown -->
                  </div><!-- End .header-right -->
                  <br>
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

<main class="main">
            <br><br>

            <div class="page-content">
              @foreach( $db as $detail )
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img src="{{ asset("pelanggan/images/products/$detail->foto") }}" alt="product image">
                                        </figure><!-- End .product-main-image -->


                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $detail->nama_barang }}</h1><!-- End .product-title -->


                                    <div class="product-price">
                                        Rp.
                                        <script type="text/javascript">
                                          function numberWithCommas(number)
                                          {
                                            return number
                                            .toString()
                                            .replace(
                                              /\B(?=(\d{3})+(?!\d))/g,
                                              "."
                                            );
                                          }
                                          document.write(numberWithCommas({{ $detail->harga_barang }}));
                                        </script>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{ $detail->deskripsi }}</p>
                                    </div><!-- End .product-content -->

                                    <form class="" action="{{ url('/pembeli') }}" method="post">
                                      @csrf
                                      <div class="details-filter-row details-row-size">
                                        <label for="qty">Banyak :</label>
                                        <div class="product-details-quantity">
                                          <input type="number" id="qty" class="form-control" value="1" min="1" max="{{ $detail->stok_barang }}" step="1" data-decimals="0" name="banyak" required>
                                        </div><!-- End .product-details-quantity -->
                                      </div><!-- End .details-filter-row -->
                                      <?php if ($data == 0): ?>
                                        <div class="details-filter-row details-row-size">
                                          <label for="qty">Hari :</label>
                                          <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" name="hari">
                                          </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->
                                      <?php endif; ?>

                                      <div class="product-details-action">
                                        <button type="submit" name="simpan" class="btn-product btn-cart"><span>add to cart</span></button>
                                        <input type="text" name="id_barang" value="{{ $detail->id_barang }}" hidden>
                                      </div><!-- End .product-details-action -->
                                    </form>

                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->
                </div><!-- End .container -->
                @endforeach
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        </main><!-- End .main -->

        <footer class="footer footer-dark">
          <div class="footer-middle">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                      <img src="{{ asset('pelanggan/images/logo-footer.png') }}" class="footer-logo" alt="Footer Logo" width="105" height="25">
                      <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                      <div class="social-icons">
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                      </div><!-- End .soial-icons -->
                    </div><!-- End .widget about-widget -->
                  </div><!-- End .col-sm-6 col-lg-3 -->

                  <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                      <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                      <ul class="widget-list">
                        <li><a href="about.html">About Molla</a></li>
                        <li><a href="#">How to shop on Molla</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="login.html">Log in</a></li>
                      </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                  </div><!-- End .col-sm-6 col-lg-3 -->

                  <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                      <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                      <ul class="widget-list">
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Money-back guarantee!</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Terms and conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                      </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                  </div><!-- End .col-sm-6 col-lg-3 -->

                  <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                      <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                      <ul class="widget-list">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="cart.html">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
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
              <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
              <figure class="footer-payments">
                <img src="{{ asset('pelanggan/images/payments.png') }}" alt="Payment methods" width="272" height="20">
              </figure><!-- End .footer-payments -->
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
