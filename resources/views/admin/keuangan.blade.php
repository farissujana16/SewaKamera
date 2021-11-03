<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tabel keuangan</title>
  </head>
  <body>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4>Highspeed Studio <br>
						Laporan Keuangan
					</h4>
					<h5>Priode bulan {{ $time }}</h5>

				</div>
			</div>
			<table class="table table-bordered border-dark mt-3">
				<tbody class="">
					<tr>
						<td colspan="3"><b>Pendapatan Usaha</b></td>
					</tr>
          @foreach( $data as $key )
					<tr>
						<td>{{ $key->nama_barang }}</td>
						<td class="text-center">{{ $key->total_barang }}</td>
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
                document.write(numberWithCommas({{ $key->hasil }}));
              </script>
            </td>
					</tr>
          @endforeach
					<tr>
						<td colspan="2">Total</td>
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
                document.write(numberWithCommas({{ $info }}));
              </script>
            </td>
					</tr>
				</tbody>
			</table>

		</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
