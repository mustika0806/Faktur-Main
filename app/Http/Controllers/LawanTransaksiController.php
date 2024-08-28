<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LawanTransaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LawanTransaksiController extends Controller
{
    public function index()
    {
        $data = LawanTransaksi::all();
        $totalRecords = LawanTransaksi::count();

        return view('admin.lawan-transaksi', ['data' => $data, 'totalRecords' => $totalRecords]);
    }

    public function addLawanTrans(Request $request)
    {
        $rules = [
            'npwp_lawan' => 'required',
            'nama_lawan' => 'required',
            'jalan' => 'required',
            'blok' => 'required',
            'nomor' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'no_tlp' => 'required',
        ];

        $customMessage = [
            'npwp_lawan.required' => 'Kolom NPWP wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with(['modalAdd' => 'open'])->withInput($request->all())->withErrors($validator->errors());
        }

        // Menyimpan data ke Tabel LawanTransaksi
        LawanTransaksi::create($request->all());

        Alert::success('Data Lawan Transaksi berhasil disimpan.');

        return redirect()->back()->withInput(null)->with('success', 'Data LawanTransaksi berhasil disimpan.');
    }
    public function delete($npwp_lawan)
    {
    try {
        $data = LawanTransaksi::where('npwp_lawan', $npwp_lawan)->firstOrFail();
        $data->delete();

        return redirect()->back()->with('success', 'Data Lawan Transaksi berhasil dihapus.');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->with('error', 'Data Lawan Transaksi tidak ditemukan.');
    }
    }

    // LawanTransaksiController.php
    public function edit($npwp_lawan)
{
    $data = LawanTransaksi::where('npwp_lawan', $npwp_lawan)->firstOrFail();
    return view('admin.lawantransaksi.edit', ['data' => $data, 'npwp_lawan' => $npwp_lawan]);
}


    public function update(Request $request, $npwp_lawan)
    {
        $rules = [
            'npwp_lawan' => 'required',
            'nama_lawan' => 'required',
            'jalan' => 'required',
            'blok' => 'required',
            'nomor' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'no_tlp' => 'required',
        ];

        $customMessage = [
            'npwp_lawan.required' => 'Kolom NPWP wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        $data = LawanTransaksi::where('npwp_lawan', $npwp_lawan)->firstOrFail();
        $data->update($request->all());

        return redirect()->back()->with('success', 'Data LawanTransaksi berhasil diperbarui.');
    }

}
