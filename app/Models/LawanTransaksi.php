<?php

namespace App\Models;

use App\Models\PajakKeluaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LawanTransaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'npwp_lawan';
    protected $keyType = 'string';
    protected $fillable = [
        'npwp_lawan',
        'nama_lawan',
        'jalan',
        'blok',
        'nomor',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'no_tlp',

    ];
    protected $table = 'lawan_transaksi';
    //relasi
    public function lawanTransaksi()
    {
        return $this->hasMany(PajakKeluaran::class, 'npwp');
    }
}
