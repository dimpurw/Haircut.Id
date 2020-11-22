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
}
