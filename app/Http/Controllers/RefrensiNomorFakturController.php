<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferensiNoFaktur;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RefrensiNomorFakturController extends Controller
{
    public function index()
    {
        $data = ReferensiNoFaktur::all();
        $totalRecords = ReferensiNoFaktur::count();

        return view('admin/administrasi-nomor-faktur', ['data' => $data, 'totalRecords' => $totalRecords]);
    }
    public function addRefrensiNomorFaktur(Request $request)
    {
        $rules = [
            'no_faktur_awal' => 'required',
            'no_faktur_akhir' => 'required',
        ];

        $customMessage = [
            'no_faktur_awal.required' => 'Kolom Faktur Awal wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with(['modalAdd' => 'open'])->withInput($request->all())->withErrors($validator->errors());
        }

        // Menyimpan data ke Tabel Refrensi
        ReferensiNoFaktur::create($request->except('nomor_terakhir'));

        Alert::success('Data Refrensi No Faktur berhasil disimpan.');

        return redirect()->back()->withInput(null)->with('success', 'Data Refrensi berhasil disimpan.');

    }
    public function delete($id)
    {
        $data = ReferensiNoFaktur::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data Refrensi berhasil dihapus.');
    }
}

 ?>
