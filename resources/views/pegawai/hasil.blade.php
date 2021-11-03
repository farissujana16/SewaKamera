@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Pesanan</h4>
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ url('/pegawai/tambah') }}" type="button" class="btn btn-success btn-icon-text">
                    <i class="mdi mdi-library-plus btn-icon-prepend"></i> Tambah Pesanan </a>
                    <br><br><br>
                    <form class="forms-sample" action="{{ url('/pegawai/pesanan/hasil') }}" method="post">
                      @csrf
                      <div class="form-group d-flex">
                        <input type="text" class="form-control col-md-4" id="exampleInputName1" name="cari" placeholder="Nama Custumer">
                        <button type="submit" class="btn btn-primary mr-2" name="button">Search</button>
                      </div>
                    </form>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Barang</th>
                            <th>Banyak</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $data as $pesan )
                          <tr>
                            <td>{{ $pesan->name }}</td>
                            <td>{{ $pesan->nama_barang }}</td>
                            <td>{{ $pesan->banyak }}</td>
                            <td>{{ $pesan->tgl_pinjam }}</td>
                            <td><label class="badge badge-danger">{{ $pesan->status }}</label></td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url("/pegawai/pesanan/update/$pesan->id_pesanan") }}" class="btn btn-primary">
                                  <i class="mdi mdi-grease-pencil"></i>
                                </a>
                                <form class="" action="{{ url('/pegawai/pesanan') }}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button  class="btn btn-danger">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
                                  <input type="hidden" name="id_pesan" value="{{ $pesan->id_pesanan }}">
                                </form>
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
