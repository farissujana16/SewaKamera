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
        	<div class="page-header text-center" style="background-image: url('pelanggan/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Checkout<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
          @if (session('status'))
          <div class="alert alert-success" >
            {{ session('status') }}
          </div>
          @endif
            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
									<br>
            			<form action="{{ url('/checkout') }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">Detail Pembayaran</h2><!-- End .checkout-title -->
		                				<div class="row">
		                					<div class="col-sm-6">
		                						<label>Nama Lengkap</label>
		                						<input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
		                					</div><!-- End .col-sm-6 -->

		                					<div class="col-sm-6">

		                					</div><!-- End .col-sm-6 -->
		                				</div><!-- End .row -->

	            						<label>Alamat</label>
	            						<input type="text" class="form-control" value="{{ auth()->user()->alamat }}" disabled>

	            						<label>Tanggal Pinjam</label>
	            						<input type="date" class="form-control" required name="tgl_pinjam">

                          <label>Nominal Pembayaran</label>
                          <input type="text" class="form-control" required name="bayar">

	            						<label>Bukti Pembayaran</label>
	            						<input type="file" class="form-control" placeholder="" required name="bukti">

		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">Data Pesanan</h3><!-- End .summary-title -->
                            <p>*Pembayaran dapat dilakukan sebesar 50% untuk pemesanan dan pelunasan dilakukan setelah barang dikembalikan.</p>
<br>
		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>Barang</th>
		                							<th>Total</th>
		                						</tr>
		                					</thead>

		                					<tbody>
                                @foreach( $cart as $data )
		                						<tr>
		                							<td><a href="#">{{ $data->nama_barang }}</a></td>
		                							<td>Rp.
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
                                      document.write(numberWithCommas({{ $data->total }}));
                                    </script>
                                  </td>
		                						</tr>
                                @endforeach
		                						<tr class="summary-subtotal">
		                							<td>Subtotal :</td>
		                							<td>Rp.
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
                                      document.write(numberWithCommas({{ $harga }}));
                                    </script>
                                  </td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr class="summary-total">
		                							<td>Total:</td>
		                							<td>Rp.
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
                                      document.write(numberWithCommas({{ $harga }}));
                                    </script>
                                  </td>
		                						</tr><!-- End .summary-total -->

		                					</tbody>
		                				</table><!-- End .table table-summary -->



		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

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
