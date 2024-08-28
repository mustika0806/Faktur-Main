<?php

namespace App\Http\Controllers;

use App\Models\BarangJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BarangJasaController extends Controller
{
    public function index()
    {
        $data = BarangJasa::all();
        $totalRecords = BarangJasa::count();

        return view('admin/barang-jasa', ['data' => $data, 'totalRecords' => $totalRecords]);
    }

    public function addBarangJasa(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'kode_brg_jasa' => 'nullable',
            'nama_brg_jasa' => 'required',
            'harga_asli' => 'required',
            'harga_ppn' => 'required_if:ppn,1',  // Require 'harga' if 'ppn' is 1
            'ppn' => 'required|in:0,1',  // 'ppn' must be either 0 or 1
        ];

        $customMessage = [
            'kode_brg_jasa.required' => 'Kolom Kode Barang wajib diisi!',
            'nama_brg_jasa.required' => 'Kolom Nama wajib diisi!',
            'npwp_pkp.required' => 'Kolom NPWP PKP wajib diisi!',
            'npwp_pkp.exists' => 'NPWP PKP tidak valid untuk pengguna yang sedang login.',
            'harga_asli.required' => 'Kolom Harga Asli wajib diisi!',
            'harga_ppn.required_if' => 'Kolom Harga wajib diisi jika mencentang kolom PPN!',
            'ppn.required' => 'Kolom PPN wajib diisi!',
            'ppn.in' => 'Kolom PPN harus berisi 0 atau 1.',
        ];


        // Jika ppn = 1; maka harga diambil dari harga_asli

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with(['modalTambah' => 'open'])->withInput($request->all())->withErrors($validator->errors());
        }

        // Menyimpan data ke Tabel LawanTransaksi
        BarangJasa::create($request->merge(['updated_by' => null, 'created_by' => Auth::user()->id, 'npwp_pkp' => $user->npwp_pkp, 'harga' => ($request->ppn == 1) ? $request->harga_asli : $request->harga_ppn])->all());

        Alert::success('Data Barang Jasa berhasil disimpan.');

        return redirect()->back()->withInput(null)->with('success', 'Data Barang Jasa berhasil disimpan.');
    }
    public function delete($kode_brg_jasa)
    {
        try {
            $data = BarangJasa::where('kode_brg_jasa', $kode_brg_jasa)->firstOrFail();
            $data->delete();


            Alert::success('Data Barang Jasa berhasil dihapus.');
            return redirect()->back()->with('success', 'Data Barang Jasa berhasil dihapus.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Data Barang Jasa tidak ditemukan.');
        }
    }
    public function edit($kode_brg_jasa)
    {
        $data = BarangJasa::where('kode_brg_jasa', $kode_brg_jasa)->firstOrFail();
        return view('admin.barangjasa.edit', ['data' => $data, 'kode_brg_jasa' => $kode_brg_jasa]);
    }


    public function update(Request $request, $kode_brg_jasa)
    {
        $rules = [
            'kode_brg_jasa' => 'required',
            'nama_brg_jasa' => 'required',
            'harga_asli' => 'required',
            'npwp_pkp' => 'required',
            'harga' => 'required_if:ppn,1',  // Require 'harga' if 'ppn' is 1
            'ppn' => 'required|in:0,1',  // 'ppn' must be either 0 or 1

        ];

        $customMessage = [
            'kode_brg_jasa.required' => 'Kolom Kode Barang/Jasa wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $data = BarangJasa::where('kode_brg_jasa', $kode_brg_jasa)->firstOrFail();
        $data->update($request->all());

        return redirect()->back()->with('success', 'Data Barang Jasa berhasil diperbarui.');
    }
}
