<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPenyerahanKeluaran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DetailPenyerahanController extends Controller
{

    public function addDetailPenyerahan(Request $request)
    {
        $data = DetailPenyerahanKeluaran::all();
        $totalRecords = DetailPenyerahanKeluaran::count();

        $rules = [
            'kode_brg' => 'required',
            'jmlh_brg' => 'required',
            'harga_total' => 'required',
            'diskon' => 'required',
            'dpp' => 'required',
            'ppn' => 'required',
            'ppnbm' => 'required',
            'pajak_ppnbm'  => 'required',
        ];
        $customMessage = [
            'kode_brg.required' => 'Kolom Kode Barang wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with(['modalAdd' => 'open'])->withInput($request->all())->withErrors($validator->errors());
        }

        // Menyimpan data ke Tabel Detail Penyerahan keluaran
        DetailPenyerahanKeluaran::create($request->all());

        Alert::success('Data Detail Penyerahan Keluaran berhasil disimpan.');

        return redirect()->back()->with(['success' => 'Data Detail Barang Jasa berhasil disimpan.', 'openModal' => true]);
    }
    public function edit($id)
    {
        $data = DetailPenyerahanKeluaran::where('id', $id)->firstOrFail();
        return view('admin.detailpenyerahan.edit', ['data' => $data, 'id' => $id]);
    }
    public function update(Request $request, $id)
    {
        $rules = [
            'kode_brg' => 'required',
            'jmlh_brg' => 'required',
            'harga_total' => 'required',
            'diskon' => 'required',
            'dpp' => 'required',
            'ppn' => 'required',
            'ppnbm' => 'required',
            'pajak_ppnbm'  => 'required',
        ];

        $customMessage = [
            'kode_brg.required' => 'Kolom Kode Barang/Jasa wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
        }

        // Menggunakan find untuk mendapatkan instance tunggal
        $data = DetailPenyerahanKeluaran::find($id);

        if ($data instanceof DetailPenyerahanKeluaran) {
            $data->update($request->all());
            return redirect()->back()->with('success', 'Detail Penyerahan Barang Jasa berhasil diperbarui.');
        } elseif ($data instanceof \Illuminate\Database\Eloquent\Collection && $data->isEmpty()) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        } else {
            // Handle the case where $data is a collection but not empty
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }
}
