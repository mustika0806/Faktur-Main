<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakKeluaranRetur extends Model
{
    use HasFactory;
       protected $fillable = [
        'no_dokumen_retur',
        'npwp_lawan',
        'nomor_faktur',
        'tgl_retur',
        'masa_pelaporan',
        'dpp',
        'ppn',
        'ppnbm',
        
    ];
    protected $table = 'pajak_keluaran_retur';

}
 