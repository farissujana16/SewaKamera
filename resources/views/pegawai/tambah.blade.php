@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Pesanan</h4>
        <br>
        <form class="forms-sample" action="{{ url('/pegawai/pesanan') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Pemesan</label>
            <input type="text" class="form-control" id="exampleInputName1" name="nama_pemesan" placeholder="" value="">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Nama Barang</label>
            <select class="form-control" id="exampleSelectGender" name="barang">
              @foreach( $data as $barang )
              <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Banyak</label>
            <input type="text" class="form-control" id="exampleInputPassword4"  name="banyak" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Tanggal Pinjam</label>
            <input type="date" class="form-control" id="exampleInputPassword4"  name="tgl_pinjam" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Tanggal Kembali</label>
            <input type="date" class="form-control" id="exampleInputPassword4"  name="tgl_kembali">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Status</label>
            <select class="form-control" id="exampleSelectGender" name="status">
              <option value="Pending">Pending</option>
              <option value="In Progress">In Progress</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Jaminan</label>
            <select class="form-control" id="exampleSelectGender" name="jaminan">
              <option value="KTP">KTP</option>
              <option value="SIM">SIM</option>
              <option value="Lainnya">Identitas Lain</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Bayar</label>
            <input type="text" class="form-control" id="exampleInputPassword4"  name="bayar" value="">
          </div>
          <a href="{{ url('/pegawai/pesanan') }}"class="btn btn-dark">Cancel</a>
          <button type="submit" class="btn btn-primary mr-2" >Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


</div>



@endsection('konten')
