<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PajakMasukan extends Model
{
    use HasFactory;

     protected $fillable = [
        'no_faktur',
        'npwp_lawan',
        'tgl_faktur',
        'masa_pajak',
        'tahun_pajak',
        'kredit',
        'jumlah_dpp',
        'jumlah_ppn',
        'jumlah_ppnbm',
        'status',
        'tgl_aprov',
        'ket',
        'user_perekam',
        'tgl_rekam',
        'user_pengubah',
        'tgl_ubah',


        
    ];
    protected $table = 'pajak_masukan';

}

 