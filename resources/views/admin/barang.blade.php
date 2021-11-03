@extends('admin/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                    @endif
                    <h4 class="card-title">Data Barang</h4>

                    <a href="{{ url('/admin/barang/tambah') }}" type="button" class="btn btn-success btn-icon-text mb-4 p-2">
                    <i class="mdi mdi-library-plus btn-icon-prepend"></i> Tambah Barang</a>
            
                    <div class="table-responsive">
                      <table class="table" id="tabelku" >
                        <thead>
                          <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $data as $barang )
                          <tr>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->harga_barang }}</td>
                            <td>{{ $barang->nama_kategori }}</td>
                            <td>{{ $barang->stok_barang }}</td>
                            <td><label class="badge badge-success">{{ $barang->kondisi }}</label></td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url("/admin/barang/update/$barang->id_barang") }}" class="btn btn-primary">
                                  <i class="mdi mdi-grease-pencil"></i>
                                </a>
                                <form class="" action="{{ url('/admin/barang') }}" method="post">
                                  @method('delete')
                                  @csrf
                                <button class="btn btn-danger">
                                  <i class="mdi mdi-delete"></i>
                                </button>
                                <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">
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
