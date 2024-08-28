<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserLocal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_user',
        'users_id',
        'role'
    ];

    protected $table = 'user_locals';

    //refrensi terhadap username dan password
    public function setUsername(){
        $this->npwp;
    }
    public function getUsername(){
        return $this->npwp;
    }


    public function getAuthIdentifierName()
    {
        return 'npwp';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthIdentifier()
    {
        return $this->npwp;
    }
}
