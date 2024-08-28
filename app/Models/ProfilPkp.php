<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPkp extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pkp', 'alamat', 'kode_pos', 'nomer_telfon', 'hp', 'fax', 'penandatangan', 'jabatan', 'tahun_buku_awal', 'tahun_buku_akhir',
    ];
    protected $table = 'profil_pkp';

}
