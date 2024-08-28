<?php

namespace App\Models;

use App\Models\BarangJasa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenyerahanKeluaran extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_brg',
        'jmlh_brg',
        'harga_total',
        'diskon',
        'dpp',
        'ppn',
        'ppnbm',
        'pajak_ppnbm'
    ];
    protected $table = 'detail_penyerahan_keluaran';
    public function barangJasa()
    {
        return $this->belongsTo(BarangJasa::class, 'kode_brg');
    }

    public function pajakKeluaran()
    {
        return $this->belongsTo(PajakKeluaran::class, 'pajak_ppnbm', 'id_pajak_keluaran');
    }
}
