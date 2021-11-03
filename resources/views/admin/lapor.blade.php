<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('laporan/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Barang</th>
								<th class="column2">Harga</th>
								<th class="column3">Stok</th>
								<th class="column6">Kondisi</th>
							</tr>
						</thead>
						<tbody>
              @foreach( $data as $lapor)
								<tr>
									<td class="column1">{{ $lapor->nama_barang }}</td>
									<td class="column2">{{ $lapor->harga_barang }}</td>
									<td class="column3">{{ $lapor->stok_barang }}</td>
									<td class="column6">{{ $lapor->kondisi }}</td>
								</tr>
              @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="{{ asset('laporan/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('laporan/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('laporan/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('laporan/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('laporan/js/main.js') }}"></script>
	<script type="text/javascript">
		window.print()
	</script>

</body>
</html>
