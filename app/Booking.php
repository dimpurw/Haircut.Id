<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = [
        'barber_id', 'tanggal', 'jam',
    ];

    public function barber()
    {
        return $this->belongsTo('App\Barber');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }
}
