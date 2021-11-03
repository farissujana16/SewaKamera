<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/login', function () {
//     return view('login/login');
// });

//Publik
Route::get('/', 'Controller@index');
Route::get('/masuk', 'LoginController@index')->name('login');
Route::post('/masuk', 'LoginController@postlogin');
Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@store');
Route::get('/logout', 'LoginController@logout');
// Route::get('/qr', 'Controller@coba');

Route::get('/email/verifikasi/{kode_email}', 'LoginController@verifikasi');
Route::get('/lupa', 'LoginController@lupa');
Route::patch('/lupa', 'LoginController@baru');

//member
Route::group(['middleware' => 'auth:user'],function(){

  Route::get('/pembeli', 'PembeliController@index');
  Route::get('/keranjang', 'PembeliController@keranjang');
  Route::get('/keranjang/update/{id_pesanan}', 'PembeliController@update_pesanan');
  Route::post('/keranjang', 'PembeliController@edit_pesanan');
  Route::delete('/keranjang', 'PembeliController@hapus');
  Route::get('/checkout', 'PembeliController@checkout');
  Route::patch('/checkout', 'PembeliController@store');
  Route::get('/detail/{id_bar}', 'PembeliController@detail');
  Route::post('/pembeli', 'PembeliController@simpan');
  Route::post('/cari', 'PembeliController@cari');
  Route::get('/bayar', 'PembeliController@bukti');
  Route::get('/pembeli/kamera', 'KategoriController@kamera');
  Route::get('/pembeli/lighting', 'KategoriController@lighting');
  Route::get('/pembeli/lensa', 'KategoriController@lensa');
  Route::get('/pembeli/stabilizer', 'KategoriController@stabilizer');


  //Route::get('/pembeli/tes', 'PembeliController@tes');
  // Route::get('/cari', 'PembeliController@cari');

});

//Resepsionis
Route::group(['middleware' => 'auth:pengguna'],function(){

  Route::get('/pegawai/dashboard', 'PegawaiController@index');
  Route::get('/pegawai/pesanan', 'PegawaiController@pesanan');
  Route::get('/pegawai/pesanan/update/{kode}', 'PegawaiController@edit');
  Route::patch('/pegawai/pesanan', 'PegawaiController@update');
  Route::delete('/pegawai/pesanan', 'PegawaiController@destroy');
  Route::get('/pegawai/verifikasi', 'PegawaiController@verifikasi');
  Route::get('/pegawai/verifikasi/{kode_pesanan}', 'PegawaiController@baru');
  Route::patch('/pegawai/verifikasi', 'PegawaiController@perbarui');
  //Route::get('/pegawai/pinjaman', 'PegawaiController@pinjaman');
  Route::get('/pegawai/kembalian', 'PegawaiController@kembalian');
  Route::get('/pegawai/tambah', 'PegawaiController@tambah');
  Route::post('/pegawai/pesanan', 'PegawaiController@create');
  Route::post('/pegawai/pesanan/hasil', 'PegawaiController@cari');
  Route::get('/pegawai/valid/{pesan}', 'PegawaiController@cek');

});


//Admin
Route::group(['middleware' => 'auth:pengguna'],function(){

Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/barang', 'AdminController@barang');
Route::post('/admin/barang/hasil', 'AdminController@cari');
Route::post('/admin/barang', 'AdminController@store');
Route::get('/admin/barang/tambah', 'AdminController@tambah');
Route::get('/admin/barang/update/{kode_barang}', 'AdminController@edit');
Route::patch('/admin/barang', 'AdminController@update');
Route::delete('/admin/barang', 'AdminController@destroy');
Route::get('/admin/keuangan', 'AdminController@uang');
Route::get('/admin/data', 'AdminController@data');
});
