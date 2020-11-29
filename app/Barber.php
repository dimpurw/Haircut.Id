<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $table = 'barber';
    protected $fillable = [
        'barbershop_id', 'nama_barber', 'email', 'alamat', 'nomortelepon', 'keahlian',
    ];

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
