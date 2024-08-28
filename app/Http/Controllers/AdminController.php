<?php

namespace App\Http\Controllers;

use App\Models\UserLocal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin/dashboard');
    }

    public function db() {
        return view('admin/administrasi-db');
    }

    public function pajakmasukan(){
        return view('admin/pajak-masukan-administrasi');
    }

    public function returpajakkeluaran(){
        return view('admin/retur-pajak-keluaran');
    }

    public function returpajakmasukan(){
        return view('admin/retur-pajak-masukan');
    }

    public function profilpkp(){
        return view('admin/profil-pkp');
    }
    public function uploadfaktur(){
        return view('admin/upload-faktur');
    }

}
