@extends('pegawai/main')

@section('konten')

<div class="content-wrapper">
<div class="row">
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Pesanan</h4>
        <br>
        <form class="forms-sample" action="{{ url('/pegawai/verifikasi') }}" method="post" enctype="multipart/form-data">
          @method('patch')
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Pemesan</label>
            <input type="text" class="form-control" id="exampleInputName1" name="nama_pemesan" placeholder="" value="{{ $informasi->name }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Tanggal Pinjam</label>
            <input type="text" class="form-control" id="exampleInputPassword4"  name="tgl_pinjam" value="{{ $informasi->tgl_pinjam }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Tanggal Kembali</label>
            <input type="text" class="form-control" id="exampleInputPassword4"  name="tgl_kembali" value="{{ $informasi->tgl_kembali }}">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Kondisi</label>
            <select class="form-control" id="exampleSelectGender" name="kondisi">
              <option value="Baik">Baik</option>
              <option value="Rusak">Rusak</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Status</label>
            <select class="form-control" id="exampleSelectGender" name="status">
              <option value="In Progress">In Progress</option>
              <option value="Success">Success</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Jaminan</label>
            <input type="text" class="form-control" id="exampleInputPassword4"  name="jaminan" value="{{ $informasi->jaminan }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Data Barang</label>
            <textarea class="form-control" id="exampleTextarea1" rows="4">
<?php $no = 1; ?>
@foreach( $data as $update )
<?php echo $no; ?>. {{$update->nama_barang}} : Rp. {{$update->harga_barang}} x {{$update->banyak}}
<?php $no++; ?>
@endforeach
            </textarea>
          </div>
          <a href="{{ url('/pegawai/verifikasi') }}"class="btn btn-dark">Cancel</a>
          <button type="submit" class="btn btn-primary mr-2" >Submit</button>
          <input type="hidden" name="name_pesanan" value="{{ $update->name }}">
          <?php $i=1; ?>
          @foreach( $data as $update )
          <input type="hidden" name="banyak_<?php echo $i ?>" value="{{ $update->banyak }}">
          <?php $i++; ?>
          @endforeach
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-5 grid-margin ">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bukti Pembayaran</h4>
        <br>
        <div class="item">
          <img height="50%" width="50%" src="{{ asset("backend/assets/images/bukti/$update->bukti") }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>


</div>



@endsection('konten')
