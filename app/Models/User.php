<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_user',
        'name',
        'npwp_pkp',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function setUsername()
    {
        $this->nama_user;
    }

    public function getUsername()
    {
        return $this->nama_user;
    }


    public function getAuthIdentifierName()
    {
        return 'nama_user';
    }


    public function user_local()
    {

        return $this->hasOne(UserLocal::class, 'users_id');


        if ($this->isUserLocal) {
            // Select * dari tabel User Local
            $user_local = UserLocal::where('users_id', $this->id)->first();
            return $user_local;
        } else {
            return null;
        }
    }

    public function pkp()
    {

        // Select * dari tabel User Local
        $user_pkp = RegistrasiPkp::where('npwp', $this->npwp_pkp )->first();
        return $user_pkp;
    }
}
