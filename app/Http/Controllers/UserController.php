<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLocal;
use Illuminate\Http\Request;
use App\Models\RegistrasiPkp;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

  public function regis(Request $request)
  {

    $rules = array(
      'npwp' => 'required|exists:registrasi_pkp,npwp',
      'nama_user' => 'required|unique:users,nama_user',
      'nama_lengkap' => 'required',
      'password' => 'required',
      'UlangiPassword' => 'required|same:password',
    );

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }


    // Hilangkan karakter . dan -
    $request->merge(['nama_user' => $request->nama_user, 'name' => $request->nama_lengkap, 'isUserLocal' => 1]);

    // Insert ke Tabel User
    $user = new User($request->all());
    $user->save();


    // Gunakan request->merge untuk menambahkan user_id pada Userlocal
    $request->merge(['users_id' => $user->id, 'role' => 'Admin']);
    $userLocal = new Userlocal($request->all());
    $userLocal->save();

    return redirect('/');
  }



  public function hilangkanKarakter($string)
  {
    // Mengganti karakter "." dan "-"
    $string = str_replace('.', '', $string);
    $string = str_replace('-', '', $string);

    return $string;
  }


  public function login(Request $request)
  {

    // Validasi Input
    $rules = array(
      'npwp' => 'required',
      'password' => 'required',
    );

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator->errors());
    }

    // Cek Login
    $user = User::where('npwp', $request->npwp)->first();

    if (!$user) {
      return redirect()->back()->withErrors(['npwp' => 'NPWP tidak ditemukan !']);
    }

    if (Auth::attempt(['npwp' => $request->npwp, 'password' => $request->password])) {

      // Cek role
      $role_pkp = $user->isPKP;
      $role_user_local = $user->isUserLocal;

      if ($role_user_local) {
        $user = UserLocal::where('users_id', $user->id);
      } else if ($role_pkp) {
        $user = RegistrasiPkp::where('users_id', $user->id);
      } else {
        return redirect()->back()->withErrors(['npwp' => 'NPWP tidak ditemukan !']);
      }


      // Auth::guard('user_local')->attempt($request->only(['username', 'password']));

      Auth::guard('user_local')->login($user);


      return redirect('/dashboard');
    } else {
      return redirect()->back()->withErrors(['pesan' => 'Password salah !']);
    }
  }


  public function logout()
  {
    Auth::logout();

    Alert::success('Logout Berhasil', 'Terimakasih sudah menggunakan layanan kami !');
    return redirect('/');
  }
}
