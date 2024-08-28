<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiNoFaktur extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_faktur_awal',
        'no_faktur_akhir',
        'nomor_terakhir',
    ];
    protected $table = 'referensi_no_faktur';

}
