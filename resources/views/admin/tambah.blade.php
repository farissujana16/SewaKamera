@extends('admin/main')

@section('konten')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Data Barang</h4>
                    <br>
                    <form class="forms-sample" action="{{ url('/admin/barang') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nama" placeholder="Nama Barang">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Harga Barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Harga Barang" name="harga">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Stok</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Stok" name="stok">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Kondisi</label>
                        <select class="form-control" id="exampleSelectGender" name="kondisi">
                          <option value="Baik">Baik</option>
                          <option value="Tidak Baik">Tidak Baik</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Kategori</label>
                        <select class="form-control" id="exampleSelectGender" name="kategori">
                          @foreach( $data as $kat )
                          <option value="{{ $kat['id_kategori'] }}">{{ $kat['nama_kategori'] }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="foto" class="form-control file-upload-info">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi"></textarea>
                      </div>
                      <a href="{{ url('/admin/barang') }}"class="btn btn-dark">Cancel</a>
                      <button type="submit" class="btn btn-primary mr-2" name="simpan" >Submit</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection('konten')
