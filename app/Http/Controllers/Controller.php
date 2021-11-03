<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Barang;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
      $data = Barang::orderBy('id_kategori', 'desc')->get();
        return view('publik/main', ['info' => $data]);
    }

//     public function coba()
//     {
//         return view('publik/coba');
//     }
  }
