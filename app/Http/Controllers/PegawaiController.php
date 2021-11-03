<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Keterangan;
use App\Pesanan;
use App\Barang;
use App\User;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $waktu = Carbon::now()->format('Y-m');
      $pendapatan = Keterangan::where([['tgl_kembali', 'like', '%'.$waktu.'%'],['status', 'Success']])->sum('total');
      $satu = Keterangan::where('tgl_kembali', 'like', '%2021%')->count();
      $dua = Keterangan::where('tgl_kembali', 'like', '%2022%')->count();
      $tiga = Keterangan::where('tgl_kembali', 'like', '%2023%')->count();
      $empat = Keterangan::where('tgl_kembali', 'like', '%2024%')->count();
      $lima = Keterangan::where('tgl_kembali', 'like', '%2025%')->count();
      $enam = Keterangan::where('tgl_kembali', 'like', '%2026%')->count();
      $grafik = $satu.', '.$dua.', '.$tiga.', '.$empat.', '.$lima.', '.$enam;
        return view('pegawai/dashboard',['uang' => $pendapatan, 'info' => $grafik]);
    }

    public function pesanan()
    {
      $info = Keterangan::groupBy('name')->where('status', 'Pending')->get();
      // $pesan = Keterangan::where('status', 'Pending')->get();
      return view('pegawai/pesanan', ['informasi'=>$info]);

    }

    public function verifikasi()
    {
      $acc = Keterangan::groupBy('name')->where('status', 'In Progress')->get();
        return view('pegawai/verifikasi', ['oke' => $acc]);
    }

    public function tambah()
    {
      $barang = Barang::all();
        return view('pegawai/tambah', ['data' => $barang]);
    }

    public function kembalian()
    {
      $kembali = Keterangan::groupBy('name')->where('status', 'Success')->get();
        return view('pegawai/kembalian', ['oke' => $kembali]);
    }

    public function cek($pesan)
    {
      $nama = Keterangan::where([['id_pesanan', $pesan],['jaminan', '']])->value('name');
      $data = Keterangan::where([['name', $nama],['jaminan', '']])->get();
      $info = Keterangan::where([['name', $nama],['jaminan', '']])->first();
      $total = Keterangan::where([['name', $nama],['jaminan', '']])->sum('total');
      $bayar = Keterangan::where([['name', $nama],['jaminan', '']])->value('uang');;
      $kurang = $total - $bayar;

        return view('pegawai/bukti', ['oke' => $data,
                                      'siap' => $info,
                                      'info_2' => $total,
                                      'info_3' => $bayar,
                                      'info_4' => $kurang,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function cari(Request $request)
     {
       $hasil = Keterangan::where([['name', $request->cari],['status', 'Pending']])->get();
         return view('pegawai/hasil', ['data' => $hasil]);
     }


    public function create(Request $request)
    {
      $now = Carbon::now()->format('Y-m-d H:i:s');

      $tambah = new User;
      $tambah->name = $request->nama_pemesan;
      $tambah->tempat_lahir = '';
      $tambah->tanggal_lahir = '';
      $tambah->alamat = '';
      $tambah->email = '';
      $tambah->email_verified_at = $now;
      $tambah->password = '';
      $tambah->remember_token = $now;
      $tambah->created_at = $now;
      $tambah->updated_at = $now;
      $tambah->save();

      $id_user = User::where('name', $request->nama_pemesan)->value('id');
      $id_barang = $request->barang;
      $harga = Barang::where('id_barang', $id_barang)->value('harga_barang');

      $tgl_p = Carbon::parse($request->tgl_pinjam);
      $tgl_k = Carbon::parse($request->tgl_kembali);
      $rentang = $tgl_k->diffInDays($tgl_p);

      $jam = Carbon::now()->format('H:i');
      $simpan = new Pesanan;
      $simpan->id = $id_user;
      $simpan->id_barang = $id_barang;
      $simpan->banyak = $request->banyak;
      $simpan->tgl_pinjam = $request->tgl_pinjam;
      $simpan->tgl_kembali = $request->tgl_kembali;
      $simpan->jam = $jam;
      $simpan->status = $request->status;
      $simpan->jaminan = $request->jaminan;
      $simpan->status = $request->status;
      $simpan->bukti = '';
      $simpan->total = $harga * $request->banyak * $rentang;
      $simpan->uang = $request->bayar;
      $simpan->save();

      return redirect('/pegawai/pesanan')->with('status', 'Pesanan Berhasil Ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode)
    {
      $detail = Keterangan::where([['name', $kode],['status', 'Pending']])->get();
      $info = Keterangan::where([['name', $kode],['status', 'Pending']])->first();
        return view('pegawai/update', ['data' => $detail, 'informasi' => $info]);
    }

    public function baru($kode_pesanan)
    {
      $detail = Keterangan::where([['name', $kode_pesanan],['status', 'In Progress']])->get();
      $info = Keterangan::where([['name', $kode_pesanan],['status', 'In Progress']])->first();
        return view('pegawai/perbarui', ['data' => $detail, 'informasi' => $info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      // dd($request->all());
      $name = $request->nama_pesanan;
      // $banyak = $request->banyak;

      $now = Carbon::now()->format('H:i');
      $data = Keterangan::where([['name', $name],['status', 'Pending']])->get();

      // $id_barang = Pesanan::where('id_pesanan', $id)->value('id_barang');
      // $stok = Barang::where('id_barang',$id_barang)->value('stok_barang');
      // $stok_barang = $stok - $banyak;
      foreach ($data as $key) {
        Keterangan::where('id_pesanan', $key->id_pesanan)
        ->update([
          'jam' => $now,
          'status' => $request->status,
          'jaminan' => $request->jaminan
        ]);
      }

      return redirect('/pegawai/pesanan')->with('status', 'Pesanan Berhasil Diupdate');
    }

    public function perbarui(Request $request)
    {
      // $coba = $request->all();
      // dd($request->all());
      $name = $request->name_pesanan;
      // $banyak = $request->banyak;
      $id = Keterangan::where([['name', $name],['status', 'In Progress']])->get();
      $no = 1;
      foreach ($id as $key) {
        $kondisi = Pesanan::where('id_pesanan', $key->id_pesanan)->value('id_barang');
        $stok = Barang::where('id_barang', $kondisi)->value('stok_barang');
        $banyak = $request->banyak_.$no;
        $stok_baru = $stok + $banyak;
        Keterangan::where('id_pesanan', $key->id_pesanan)
        ->update([
          'status' => $request->status
        ]);

        Barang::where('id_barang', $kondisi)
        ->update([
          'stok_barang' => $stok_baru,
          'kondisi' => $request->kondisi
        ]);
        $no++;
      }

      return redirect('/pegawai/verifikasi')->with('status', 'Pesanan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $id = $request->id_pesan;
      Pesanan::destroy($id);
      return redirect('/pegawai/pesanan')->with('status', 'Pesaan Berhasil Dihapus');
    }
}
