<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;
use App\Barang;
use App\DataBarang;
use App\Kategori;
use App\Keterangan;

class AdminController extends Controller
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
        return view('admin/dashboard',['uang' => $pendapatan, 'info' => $grafik]);
    }

    public function barang()
    {
      $barang = DataBarang::all();
      $kat = Kategori::all();
        return view('admin/barang', ['data' => $barang, 'info' => $kat]);
    }

    public function tambah()
    {
      $kat = Kategori::all();
        return view('admin/tambah', ['data' => $kat]);
    }

    public function cari(Request $request)
    {
      $barang = $request->cari;
      $hasil = Barang::where('nama_barang', $barang)->get();
        return view('admin/hasil', ['data' => $hasil]);
    }

    public function uang()
    {
      $waktu = Carbon::now()->format('Y-m');
      $waktu_2 = Carbon::now()->format('M Y');
      $lapor = Keterangan::where([['tgl_kembali', 'like', '%'.$waktu.'%'],['status', 'Success']])
      ->groupBy('nama_barang')->get(Keterangan::raw('*, sum(banyak) as total_barang,sum(total) as hasil'));
      // SELECT *, SUM(total) as hasil FROM `keterangan` WHERE status='Success'  GROUP BY(nama_barang);
      // $lapor_2 = Keterangan::where([['tgl_kembali', 'like', '%'.$waktu.'%'],['status', 'Success']])
      // ->sum('harga_barang');
      $uang = Keterangan::where([['tgl_kembali', 'like', '%'.$waktu.'%'],['status', 'Success']])->sum('total');
        return view('admin/keuangan', ['data' => $lapor, 'info' => $uang, 'time' => $waktu_2]);
    }

    public function data()
    {
      $lapor = Barang::orderBy('id_kategori', 'desc')->get();
      return view('admin/lapor', ['data' => $lapor]);


    //     $pdf = PDF::loadView('admin/lapor', ['data' => $lapor,])->setPaper('A4', 'Potrait');
    //     //return $pdf->download('Bukti-pemesanan.pdf');
    //     return $pdf->stream();
    }

    // public function update()
    // {
    //   // $kat = Kategori::all();
    //     return view('admin/update');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // dd($request->all());
      $foto = $request->foto;
      $nama_foto = $foto->getClientOriginalName();


        $tambah = new Barang;
        $tambah->nama_barang = $request->nama;
        $tambah->harga_barang = $request->harga;
        $tambah->stok_barang = $request->stok;
        $tambah->kondisi = $request->kondisi;
        $tambah->foto = $nama_foto;
        $tambah->deskripsi = $request->deskripsi;
        $tambah->id_kategori = $request->kategori;

        $foto->move(public_path().'/pelanggan/images/products', $nama_foto);
        $tambah->save();

        return redirect('/admin/barang')->with('status', 'Data Barang Berhasil Ditambahkan');
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
    public function edit($kode_barang)
    {
      $ubah = Barang::where('id_barang', $kode_barang)->get();
      $kat = Kategori::all();
        return view('admin/update', ['ganti' => $ubah], ['data' => $kat]);
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

      $id = $request->id;

      Barang::where('id_barang', $id)
            ->update([
              'nama_barang' => $request->nama,
              'harga_barang' => $request->harga,
              'stok_barang' => $request->stok,
              'kondisi' => $request->kondisi,
              'deskripsi' => $request->deskripsi,
              'id_kategori' => $request->kategori,
            ]);

      return redirect('/admin/barang')->with('status', 'Barang Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $id = $request->id_barang;
      Barang::destroy($id);
      return redirect('/admin/barang')->with('status', 'Barang Berhasil Dihapus');
    }
}
