<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganTambahan8 extends Model
{
    use HasFactory;

     protected $fillable = [
        'nama',
        'cap_faktur',

    ];
    protected $table = 'keterangan_tambahan8';
}
