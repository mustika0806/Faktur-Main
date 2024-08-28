<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakMasukanRetur extends Model
{
    use HasFactory;
      protected $fillable = [
        'npwp_lawan',
        'nomor_faktur',
        'nomor_dokumen',
        'tgl_retur',
        'masa_pajak',
        'dpp',
        'ppn',
        'ppnbm',


        
    ];
    protected $table = 'pajak_masukan_retur';

}
