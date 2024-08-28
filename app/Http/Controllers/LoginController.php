<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLocal;
use Illuminate\Http\Request;
use App\Models\RegistrasiPkp;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_user()
    {
        return view('login_user');
    }

    // public function login_user_proses(Request $request) {
    //     $request->validate([
    //         'npwp' => 'required',
    //         'nama_user' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $data = [
    //         'npwp' => $request->npwp,
    //         'nama_user' => $request->nama_user,
    //         'password' => $request->password
    //     ];

    //     if(Auth::attempt($data)){
    //         return redirect()->route('dashboard');
    //     }else{
    //         return redirect()->route('login')->with('failed','NPWP/ Nama User/ Password Salah');
    //     }
    // }


    public function login_user_proses(Request $request)
    {

        // Validasi Input
        $rules = array(
            'npwp' => 'required|exists:registrasi_pkp,npwp',

            'password' => 'required',
            'nama_user' => 'required|exists:users,nama_user',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        // Cek Login
        $user = User::where('nama_user', $request->nama_user)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['npwp' => 'NPWP tidak ditemukan !']);
        }

        if (Auth::attempt(['nama_user' => $request->nama_user, 'password' => $request->password])) {

            // Cek role
            $role_pkp = $user->isPKP;
            $role_user_local = $user->isUserLocal;

            if ($role_user_local) {
                $user_custom = UserLocal::where('users_id', $user->id);
            } else if ($role_pkp) {
                $user_custom = RegistrasiPkp::where('users_id', $user->id);
            } else {
                return redirect()->back()->withErrors(['npwp' => 'NPWP tidak ditemukan !']);
            }


            // Auth::guard('user_local')->attempt($request->only(['username', 'password']));

            Auth::login($user);
            Alert::success('Login Berhasil', 'Selamat datang ' .$user->name. ' !');


            return redirect('/admin/dashboard');
        } else {
            return redirect()->back()->withErrors(['pesan' => 'Password salah !']);
        }
    }


    public function regis_user()
    {
        return view('regis_user');
    }
}
