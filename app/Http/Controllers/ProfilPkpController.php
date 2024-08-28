<?php

namespace App\Http\Controllers;

use App\Models\ProfilPkp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilPkpController extends Controller
{
    public function index()
    {
        $data = ProfilPkp::all();
        return view('admin/profil-pkp');
    }

    public function addProfilPkp(Request $request)
    {
        $rules = [
            'nama_pkp' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'nomer_telfon' => 'required',
            'hp' => 'required',
            'fax' => 'required',
            'penandatangan' => 'required',
            'jabatan' => 'required',
            'tahun_buku_awal' => 'required',
            'tahun_buku_akhir' => 'required',
        ];

        $customMessage = [
            'nama_pkp.required' => 'Kolom Nama wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        // Menyimpan data ke Tabel ProfilPkp
        ProfilPkp::create($request->all());

        return redirect()->back()->withInput(null)->with('success', 'Data Profil Pkp berhasil disimpan.');
    }

}
?>
