@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pesanan Terverifikasi</h4>
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                    @endif
                    <br> <br>
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
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $oke as $acc )
                          <tr>
                            <td>{{ $acc->name }}</td>
                            <!-- <td>{{ $acc->nama_barang }}</td>
                            <td>{{ $acc->banyak }}</td> -->
                            <td>{{ $acc->tgl_pinjam }}</td>
                            <td>{{ $acc->tgl_kembali }}</td>
                            <td>{{ $acc->jam }}</td>
                            <td>{{ $acc->jaminan }}</td>
                            <td><label class="badge badge-warning">{{ $acc->status }}</label></td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url("/pegawai/verifikasi/$acc->name") }}" class="btn btn-primary">
                                  <i class="mdi mdi-grease-pencil"></i>
                                </a>
                              </div>
                            </td>
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
