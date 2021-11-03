<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function kamera()
    {
        $kamera = Barang::where('id_kategori', 1)->get();
        return view('/pembeli/kamera', ['satu' => $kamera]);
    }

    public function lighting()
    {
      $lighting = Barang::where('id_kategori', 3)->get();
      return view('/pembeli/lighting', ['tiga' => $lighting]);
    }

    public function lensa()
    {
      $lensa = Barang::where('id_kategori', 2)->get();
      return view('/pembeli/lensa', ['dua' => $lensa]);
    }

    public function stabilizer()
    {
      $stabilizer = Barang::where('id_kategori', 4)->get();
      return view('/pembeli/stabilizer', ['empat' => $stabilizer]);
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
}
