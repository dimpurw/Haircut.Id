<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    protected $table = 'barbershop';
    protected $fillable = [
        'nama', 'username', 'password', 'email', 'alamat', 'nomortelepon', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFoto()
    {
        if (!$this->foto) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->foto);
    }
}
