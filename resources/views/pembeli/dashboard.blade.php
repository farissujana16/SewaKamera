@extends('pembeli/main')

@section('konten')




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
                              @foreach ($data as $barang)
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
                                                document.write(numberWithCommas({{ $barang->harga_barang }}));
                                              </script>
                                              / hari
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

@endsection('konten')

@section('total')
{{ $total }}
@endsection('total')
