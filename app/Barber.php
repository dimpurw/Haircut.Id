<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $table = 'barber';
    protected $fillable = [
        'barbershop_id', 'foto', 'nama_barber', 'email', 'alamat', 'nomortelepon', 'keahlian',
    ];

    public function getFoto()
    {
        if (!$this->foto) {
            return asset('foto/default.jpg');
        }
        return asset('foto/' . $this->foto);
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }

    public function booking()
    {
        return $this->hasMany('App\Booking');
    }

    public function paket()
    {
        return $this->hasMany('App\Paket');
    }
}
