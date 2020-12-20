<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'barber_id', 'barbershop_id', 'tanggal', 'start', 'end', 'status',
    ];

    public function barber()
    {
        return $this->belongsTo('App\Barber');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }

    public function paket()
    {
        return $this->belongsTo('App\Paket');
    }
}
