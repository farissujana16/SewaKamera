<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Mail\SendVerification;
use App\User;
use Mail;
use App\Pengguna;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::guard('user')->check()) {
        return redirect('/pembeli');
      }elseif (Auth::guard('pengguna')->check('level', 'admin')) {
        return redirect('/admin/dashboard');
      }elseif (Auth::guard('pengguna')->check('level', 'pegawai')) {
        return redirect('/admin/dashboard');
      }else {
        return view('login/login');
      }
    }

    public function register()
    {
        return view('login/register');
    }

    public function lupa()
    {
        return view('login/forgot');
    }

    public function baru(Request $request)
    {
      $email = $request->email;
      $tanggal = $request->tanggal;
      $pass = $request->password;
      $pass_v = $request->password_v;

      $data = User::where([['email', $email],['tanggal_lahir', $tanggal]])->count();
      // dd($data);
      if ($data == 0) {
        return redirect('/lupa')->with('salah', 'Maaf, Data anda tidak ditemukan!');
      }elseif ($pass !== $pass_v) {
        return redirect('/lupa')->with('salah', 'Maaf, Password tidak sesuai!');
      }else {
        $id = User::where([['email', $email],['tanggal_lahir', $tanggal]])->value('id');
        User::where('id', $id)->update(
          [
            'password' => bcrypt($pass)
          ]);
          return redirect('/masuk')->with('status', 'Password berhasil diperbarui');
      }
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
        $tambah = new User;
        $tambah->name = $request->nama;
        $tambah->tempat_lahir = $request->tempat_lahir;
        $tambah->tanggal_lahir = $request->tanggal_lahir;
        $tambah->alamat = $request->alamat;
        $tambah->email = $request->email;
        $tambah->password = bcrypt($request->pass);
        $tambah->remember_token = Str::random(60);
        $tambah->save();

        $alamat_email = $request->email;

        $nama = User::where('email', $request->email)->value('name');
        $token = User::where('email', $request->email)->value('remember_token');
        $data = [
          'name' => $nama,
          'alamat' => 'http://127.0.0.1:8000/email/verifikasi/'.$token
        ];
        Mail::to($alamat_email)->send(new SendVerification($data));
        // Mail::to($request->email)->send(new SendVerification);

        return redirect('/masuk')->with('status', 'Registrasi Berhasil Dilakukan, Silahkan periksa email anda untuk proses verifikasi');

        // User::create([
        //
        // ]);
    }

    public function verifikasi($kode_email)
    {
        $waktu = Carbon::now();
        $id_user = User::where('remember_token', $kode_email)->value('id');
        // echo $id_user;
        User::where('id', $id_user)
              ->update([
                'email_verified_at' => $waktu,
              ]);

        return redirect('/masuk')->with('status', 'Verifikasi Berhasil Dilakukan, Silahkan lakukan login untuk pemesanan');
    }


    public function postlogin(Request $request)
    {
      $email = $request->email;
      $pass = $request->password;

      $kondisi = User::where('email', $email)->count('email_verified_at');

      if ($kondisi == 0) {
        $verifikasi = 'Belum Verifikas';
      }else {
        $verifikasi = User::where('email', $email)->value('email_verified_at');
      }


      // $login = Pengurus::where(['email'=>$email])->first();


      if (Auth::guard('user')->attempt(['email' => $email, 'password' => $pass, 'email_verified_at' => $verifikasi])) {
          return redirect('/pembeli');
      }elseif(Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $pass, 'level' => 'admin'])) {
         return redirect('/admin/dashboard');
      }elseif(Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $pass, 'level' => 'pegawai'])) {
         return redirect('/pegawai/dashboard');
       }elseif ($kondisi == 0) {
         return redirect('/masuk')->with('salah', 'Anda Belum Verifikasi');
       }else {
        return redirect('/masuk')->with('salah', 'Email atau Password Salah');
      }


      //   if (Auth::attempt($request->only('email','password'))) {
      //     return redirect('/pembeli');
      //   }else {
      //     if ($login->email == $email AND $login->password == $pass AND $login->jabatan_user == 'admin'){
      //       return redirect('/admin/dashboard');
      //     }elseif ($login->email == $email AND $login->password == $pass AND $login->jabatan_user == 'pegawai') {
      //       return redirect("/pegawai/dashboard");
      //     }else {
      //       return redirect('/masuk')->with('salah', 'Email atau Password Salah');
      //       // code...
      //     }


      //   // dd($request->all());
      //
      //   // if (!$login) {
      //   //     return redirect('/masuk')->with('status', 'Akun Tidak Terdaftar');
      //   // }else{
      //   //     return redirect('/masuk')->with('status', 'Password atau e-mail salah');
      //   //   }
      //
      // }
    }

    public function logout()
    {
      if (Auth::guard('user')->check()) {
        Auth::guard('user')->logout();
      }elseif (Auth::guard('pengguna')->check()) {
        Auth::guard('pengguna')->logout();
      }
        // Auth::guard('user')->logout();
        return redirect('/masuk');
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
