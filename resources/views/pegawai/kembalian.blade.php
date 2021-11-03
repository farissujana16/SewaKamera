@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dikembalikan</h4>
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <!-- <th>Barang</th>
                            <th>Banyak</th> -->
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jam</th>
                            <th>Jaminan</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $oke as $selesai )
                          <tr>
                            <td>{{ $selesai->name }}</td>
                            <!-- <td>{{ $selesai->nama_barang }}</td>
                            <td>{{ $selesai->banyak }}</td> -->
                            <td>{{ $selesai->tgl_pinjam }}</td>
                            <td>{{ $selesai->tgl_kembali }}</td>
                            <td>{{ $selesai->jam }}</td>
                            <td>{{ $selesai->jaminan }}</td>
                            <td><label class="badge badge-success">{{ $selesai->status }}</label></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>

@endsection('konten')
