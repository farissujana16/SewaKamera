<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link href="{{ asset('/bukti/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('/bukti/style.css') }}">

  </head>
  <body>



<div class="container">
	<div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="" src="{{ asset('pelanggan/images/highspeed.png') }}" style="width: 150px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>High Speed Kamera</h5>
							<p>0821-6908-7480 <i class="fa fa-phone"></i></p>
							<p>highspeedpdg@gmail.com<i class="fa fa-envelope-o"></i></p>
							<p>Indonesia <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>

			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>{{ $siap->name }}</h5>
							<p><b>Alamat :</b> {{ $siap->alamat }}</p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Receipt</h1>
						</div>
					</div>
				</div>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Harga (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach( $oke as $data )
                        <tr>
                            <td class="col-md-9">{{ $data->nama_barang }} x {{ $data->banyak }}</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> {{ $data->total }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Sewa: </strong>
                            </p>
							              <p>
                                <strong>Total Bayar: </strong>
                            </p>
							            </td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> {{ $info_2 }}</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> {{ $info_3 }}</strong>
                            </p>
							</td>
                        </tr>
                        <tr>

                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> {{ $info_4 }}</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>

			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Tanggal :</b> {{ $siap->tgl_pinjam }}</p>
							<h5 style="color: rgb(140, 140, 140);">Thank you for your business!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
						</div>
					</div>
				</div>
            </div>

        </div>
	</div>
</div>

  </body>
  <script src="{{ asset('/bukti/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/bukti/jquery-1.11.1.min.js') }"></script>
</html>
