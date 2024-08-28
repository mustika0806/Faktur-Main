<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiPkp extends Model
{
    use HasFactory;

       protected $fillable = [
        'npwp',
        'sertifikat_user',
        'kode_aktivasi',
        'password_enofa',
    ];
    protected $table = 'registrasi_pkp';
}
