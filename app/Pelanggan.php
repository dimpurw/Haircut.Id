<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends User
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'user_id', 'nama',  'TGL', 'alamat', 'nomortelepon', 'foto'
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
            return asset('foto/default.jpg');
        }
        return asset('foto/' . $this->foto);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function letter()
    {
        return $this->hasMany('App\Letter');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking');
    }
}
