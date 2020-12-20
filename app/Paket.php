<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $fillable = [
        'barber_id', 'barbershop_id', 'layanan', 'harga',
    ];

    public function barber()
    {
        return $this->belongsTo('App\Barber');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }

    public function booking()
    {
        return $this->hasOne('App\Booking');
    }
}
