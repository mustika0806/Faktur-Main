<?php

namespace App\Http\Controllers;

use App\Models\BarangJasa;
use App\Models\User;
use App\Models\UangMuka;
use App\Models\JenisFaktur;
use Illuminate\Http\Request;
use App\Models\PajakKeluaran;
use App\Models\JenisTransaksi;
use App\Models\LawanTransaksi;
use App\Models\ReferensiNoFaktur;
use App\Models\KeteranganTambahan7;
use App\Models\KeteranganTambahan8;
use App\Models\DetailPenyerahanKeluaran;
use Illuminate\Support\Facades\Validator;

class PajakKeluaranController extends Controller
{
    public function index()
    {
        $data = PajakKeluaran::all();
        $totalRecords = PajakKeluaran::count();

        //data tambahan
        $barangJasa = BarangJasa::all();
        $refrensiNoFaktur = ReferensiNoFaktur::all();
        $lawanTransaksi = LawanTransaksi::all();
        $jenisFaktur = JenisFaktur::all();
        $jenisTransaksi = JenisTransaksi::all();
        $uangMuka = UangMuka::all();
        $keteranganTambahan7 = KeteranganTambahan7::all();
        $keteranganTambahan8 = KeteranganTambahan8::all();
        $users = User::all();
        $detailPenyerahanKeluaran = DetailPenyerahanKeluaran::all();
        // Menghitung total count dari tabel detail_penyerahan_keluaran

        $totalDetailPenyerahanKeluaran = DetailPenyerahanKeluaran::count();
        //gabungkan semua data
        $additionalData = [
            'barangJasa' => $barangJasa,
            'refrensiNoFaktur' => $refrensiNoFaktur,
            'lawanTransaksi' => $lawanTransaksi,
            'jenisFaktur' => $jenisFaktur,
            'jenisTransaksi' => $jenisTransaksi,
            'uangMuka' => $uangMuka,
            'keteranganTambahan7' => $keteranganTambahan7,
            'keteranganTambahan8' => $keteranganTambahan8,
            'users' => $users,
            'detailPenyerahanKeluaran' => $detailPenyerahanKeluaran
        ];

        //satu array untuk dikirimkan ke view
        $allData = [
            'data' => $data,
            'totalDetailPenyerahanKeluaran' => $totalDetailPenyerahanKeluaran,
            'totalRecords' => $totalRecords,
            'additionalData' => $additionalData,
            'detailPenyerahanKeluaran' => $detailPenyerahanKeluaran,
        ];

        //semua data ke view
        return view('admin.pajak-keluaran-administrasi', $allData);
    }


    public function addPajakKeluaran(Request $request)
    {
        $rules = [
            'nomor_faktur' => 'required',
            'masa_pajak' => 'required',
            'tahun_pajak' => 'required',
            'tanggal_faktur' => 'required',
            'npwp' => 'required',
            'jumlah_dpp' => 'required',
            'jumlah_ppn' => 'required',
            'jumlah_ppnbm' => 'required',
            'uang_muka_dpp' => 'required',
            'uang_muka_ppn' => 'required',
            'uang_muka_ppnbm' => 'required',
            'refrensi' => 'required',
            'kode_jenis_transaksi' => 'required',
            'no_seri' => 'required',
            'id_faktur' => 'required',
            'id_7' => 'required',
            'id_8' => 'required',
            'id_uang' => 'required',
            'id_detail' => 'required',
            'user' => 'required',
            'tgl_rekam' => 'required',
            'tgl_ubah' => 'required',
        ];

        $customMessage = [
            'npwp_lawan.required' => 'Kolom NPWP wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with(['modalAdd' => 'open'])->withInput($request->all())->withErrors($validator->errors());
        }

        PajakKeluaran::create($request->all());

        return redirect()->back()->withInput(null)->with('success', 'Data Pajak Keluaran berhasil disimpan.');

        // return redirect()->back()->withInput($request->all())->with(['modal' => 'lawanTransaksi', 'id_pajak_keluaran' => '10']);



    }
}
