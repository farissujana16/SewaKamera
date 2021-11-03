@extends('admin/main')

@section('konten')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Data Barang</h4>
                    <br>
                    <form class="forms-sample" action="{{ url('/admin/barang') }}" method="post">
                      @method('patch')
                      @csrf
                      @foreach( $ganti as $ubah )
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="nama" value="{{ $ubah['nama_barang'] }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Harga Barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" value="{{ $ubah['harga_barang'] }}" name="harga">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Stok</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" value="{{ $ubah['stok_barang'] }}" name="stok">
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
                        <input type="text" name="foto" class="form-control file-upload-info" value="{{ $ubah['foto'] }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi">{{ $ubah['deskripsi'] }}</textarea>
                      </div>
                      <input type="hidden" name="id" value="{{ $ubah->id_barang }}">
                      <a href="{{ url('/admin/barang') }}"class="btn btn-dark">Cancel</a>
                      <button type="submit" class="btn btn-primary mr-2" name="simpan" >Submit</button>
                      @endforeach
                    </form>
                  </div>
                </div>
              </div>

@endsection('konten')
