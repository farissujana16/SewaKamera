<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use PDF;
use App\Barang;
use App\Pesanan;
use App\Keterangan;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $barang = Barang::all();
      $nama = auth()->user()->name;
      $keranjang = Keterangan::where([['name', $nama],['status', 'Pending']])->count();
        return view('pembeli/dashboard', ['data' => $barang, 'total' => $keranjang]);
    }

    public function keranjang()
    {
      $nama = auth()->user()->name;
      $keranjang = Keterangan::where([['name', $nama],['status', 'Pending']])->get();
      $total = Keterangan::where([['name', $nama],['bukti', '']])->sum('total');
      return view('pembeli/keranjang', ['cart' => $keranjang], ['harga' => $total]);
      // return view('pembeli/keranjang');
    }

    public function update_pesanan($id_pesanan)
    {
      $keranjang = Pesanan::where([['id_pesanan', $id_pesanan],['status', 'Pending']])->first();
      $data = Barang::where('id_barang', $keranjang['id_barang'])->first();
      return view('pembeli/update', ['cart' => $keranjang, 'barang' => $data]);
      // return view('pembeli/keranjang');
    }

    public function edit_pesanan(Request $request)
    {
      $id_user = auth()->user()->id;
      $id_bar = $request->id_barang;
      $barang = Barang::where('id_barang', $id_bar)->value('harga_barang');
      $info = Pesanan::where([['id', $id_user],['id_barang', $id_bar],['status', "Pending"],['bukti', ""]])->first();
       $tgl_p = Carbon::parse($info->tgl_pinjam);
       $tgl_k = Carbon::parse($info->tgl_kembali);
       $rentang = $tgl_k->diffInDays($tgl_p);
         Pesanan::where('id_pesanan', $info->id_pesanan)
               ->update([
                 'banyak' => $request->banyak,
                 'total' => $barang * $rentang * $request->banyak,
               ]);
       return redirect('/keranjang');
      // return view('pembeli/keranjang');
    }

    public function checkout()
    {
      $nama_1 = auth()->user()->name;
      $keranjang_1 = Keterangan::where([['name', $nama_1],['bukti', '']])->get();
      $total_cek = Keterangan::where([['name', $nama_1],['bukti', '']])->sum('total');
      return view('pembeli/checkout', ['cart' => $keranjang_1], ['harga' => $total_cek]);
      // return view('pembeli/checkout');
    }

    public function detail($id_bar)
    {
      $id_user = auth()->user()->id;
      $hasil = Pesanan::where([['id', $id_user],['id_barang', $id_bar],['status', "Pending"],['bukti',""]])->count();

      $detail = Barang::where('id_barang', $id_bar)->get();
        return view('pembeli/detail', ['db' => $detail, 'data' => $hasil]);
    }

    public function cari(Request $request)
    {
      // dd($request->cari);
      $cari = $request->cari;
      $hasil = Barang::where('nama_barang', $cari)->get();
      return view('pembeli/hasil', ['barang' => $hasil ]);
    }

    public function bukti()
    {

      $waktu = Carbon::now()->format('d M Y');
      $nama = auth()->user()->name;
      $id_user = auth()->user()->id;
      $data = Keterangan::where([['name', $nama],['jaminan', '']])->get();
      $total = Keterangan::where([['name', $nama],['jaminan', '']])->sum('total');
      $bayar = Keterangan::where([['name', $nama],['jaminan', '']])->value('uang');;
      $kurang = $total - $bayar;
      // $pesan = auth()->user()->name;
      $id = Keterangan::where([['name', $nama],['jaminan', '']])->value('name');
      // $id_pesan = Keterangan::where([['id_pesanan', $id],['jaminan', '']])->get();

      $info = Pesanan::where([['id', $id_user],['status', "Pending"]])->first();
       $tgl_p = Carbon::parse($info->tgl_pinjam);
       $tgl_k = Carbon::parse($info->tgl_kembali);
       $rentang = $tgl_k->diffInDays($tgl_p);

      $alamat = 'http://127.0.0.1:8000/pegawai/pesanan/update/'.$id;
      $qrcode = new Generator;
      $qr = $qrcode->size(100)->generate($alamat);


        return view('pembeli/bukti', ['info' => $data,
                                      'info_2' => $total,
                                      'info_3' => $bayar,
                                      'info_4' => $kurang,
                                      'info_5' => $waktu,
                                      'info_6' => $qr,
                                      'info_7' => $rentang
                                    ]);

      // $pdf = PDF::loadView('pembeli/bukti', ['info' => $data,
      //                              'info_2' => $total,
      //                              'info_3' => $bayar,
      //                              'info_4' => $kurang,
      //                              'info_5' => $waktu,
      //                              'info_6' => $qr])->setPaper('A4', 'Potrait');
      // //return $pdf->download('Bukti-pemesanan.pdf');
      // return $pdf->stream();
    }

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


   public function simpan(Request $request)
   {
     $id_bar = $request->id_barang;
     $id_user = auth()->user()->id;
     $barang = Barang::where('id_barang', $id_bar)->value('harga_barang');
     // $harga = $barang->harga_barang;
     $now = Carbon::now()->format('Y-m-d');
     $back = Carbon::now();
     $balik = $back->addDays($request->hari)->format('Y-m-d');
     $jam = Carbon::now()->format('H:i');


     $hasil = Pesanan::where([['id', $id_user],['id_barang', $id_bar],['status', "Pending"],['bukti',""]])->count();

     if ($hasil > 0) {
    $info = Pesanan::where([['id', $id_user],['id_barang', $id_bar],['status', "Pending"],['bukti',""]])->first();
     $tgl_p = Carbon::parse($info->tgl_pinjam);
     $tgl_k = Carbon::parse($info->tgl_kembali);
     $rentang = $tgl_k->diffInDays($tgl_p);
       Pesanan::where('id_pesanan', $info->id_pesanan)
             ->update([
               'banyak' => $request->banyak + $info->banyak,
               'total' => ($barang * $rentang * $request->banyak) + $info->total,
             ]);
     }else {
       $simpan = new Pesanan;
       $simpan->id = auth()->user()->id;
       $simpan->id_barang = $request->id_barang;
       $simpan->banyak = $request->banyak;
       $simpan->tgl_pinjam = $now;
       $simpan->tgl_kembali = $balik;
       $simpan->jam = $jam;
       $simpan->status = 'Pending';
       $simpan->jaminan = '';
       $simpan->bukti = '';
       $simpan->total = $barang * $request->banyak * $request->hari;
       $simpan->uang = '';
       $simpan->save();
     }
       return redirect('/pembeli')->with('status', 'Pesanan Berhasil Ditambahkan, Lihat Keranjang Anda!');
   }


    public function store(Request $request)
    {
      $foto = $request->bukti;
      $nama_foto = $foto->getClientOriginalName();

      $id = auth()->user()->id;
      $keranjang = Pesanan::where([['id', $id],['bukti', ''],['status', 'Pending']])->get();

      $up_tgl = Pesanan::where([['id', $id],['bukti', '']])->first();
      $tgl_p = Carbon::parse($up_tgl->tgl_pinjam);
      $tgl_k = Carbon::parse($up_tgl->tgl_kembali);
      $rentang = $tgl_k->diffInDays($tgl_p);

      $pinjam = $request->tgl_pinjam;
      $kembali = Carbon::parse($pinjam)->addDays($rentang)->format('Y-m-d');
      // $tes = Keterangan::where('name', $nama)->get('id_pesanan');
      foreach ($keranjang as $key) {
        $stok = Barang::where('id_barang', $key->id_barang)->value('stok_barang');
        // dd($stok);
        Pesanan::where('id_pesanan', $key->id_pesanan)
              ->update([
                'tgl_pinjam' => $pinjam,
                'tgl_kembali' => $kembali,
                'bukti' => $nama_foto,
                'uang' => $request->bayar,
              ]);
        $stok = Barang::where('id_barang', $key->id_barang)->value('stok_barang');
        Barang::where('id_barang', $key->id_barang)
                ->update([
                  'stok_barang' => $stok - $key->banyak
                ]);
      }
      $foto->move(public_path().'/backend/assets/images/bukti', $nama_foto);
      return redirect('/bayar')->with('status', 'Pesanan Sedang Diproses');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus(Request $request)
    {
        $id = $request->id_pesanan;
        Pesanan::destroy($id);
        return redirect('/keranjang')->with('status', 'Barang Berhasil Dihapus');
    }

    public function tes()
    {
      // $nama = auth()->user()->name;
      // $keranjang = Keterangan::where([['name', $nama],['bukti', '']])->get();
      // // $tes = Keterangan::where('name', $nama)->get('id_pesanan');
      // foreach ($keranjang as $key) {
      //   echo $key->id_pesanan;
      // }
    }
}
