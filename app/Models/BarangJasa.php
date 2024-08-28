<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPenyerahanKeluaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangJasa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    //protected $keyType = 'string';
    protected $fillable = [
        'kode_brg_jasa',
        'nama_brg_jasa',
        'harga',
        'npwp_pkp',
        'created_by',
        'updated_by',
    ];
    protected $table = 'barang_jasa';
    public function detailPenyerahanKeluaran()
    {
        return $this->hasMany(DetailPenyerahanKeluaran::class, 'kode_brg');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'npwp_pkp', 'npwp_pkp');
    }
    public function createdBy($created_by = null)
    {
        if ($created_by === null) {
            $created_by = $this->created_by;
        }

        if ($created_by === null) {
            return "-";
        }


        // Get User
        $user = User::find($created_by)->first();
        if ($user) {
            return $user->name;
        } else {
            return "-";
        }
    }


    public function updatedBy($updated_by = null)
    {
        if ($updated_by === null) {
            $updated_by = $this->updated_by;
        }


        if ($updated_by === null) {
            return '-';
        }


        // Get User
        $user = User::find($updated_by)->first();
        if ($user) {
            return $user->name;
        } else {
            return "-";
        }
    }
}
