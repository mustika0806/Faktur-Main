<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    use HasFactory;

     protected $fillable = [
        'kode_jenis',
        'nama_jenis',
        'no_seri',

    ];
    protected $table = 'jenis_transaksi';
}


