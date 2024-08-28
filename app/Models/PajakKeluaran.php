<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakKeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_faktur', 'masa_pajak', 'tahun_pajak', 'tanggal_faktur', 'npwp', 'jumlah_dpp', 'jumlah_ppn', 'jumlah_ppnbm', 'uang_muka_dpp', 'uang_muka_ppn', 'uang_muka_ppnbm', 'refrensi', 'kode_jenis_transaksi', 'no_seri', 'id_faktur', 'id_7', 'id_8', 'id_uang', 'user', 'tgl_rekam', 'tgl_ubah',
    ];
    protected $table = 'pajak_keluaran';

    public function detailPenyerahanKeluarans()
    {
        return $this->hasMany(DetailPenyerahanKeluaran::class, 'pajak_ppnbm', 'id_pajak_keluaran');
    }
    public function lawanTransaksi()
    {
        return $this->belongsTo(LawanTransaksi::class, 'npwp', 'npwp_lawan');
    }

}

