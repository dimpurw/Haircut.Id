<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $table = 'letter';
    protected $fillable = [
        'barbershop_id', 'pelanggan_id', 'pesan',
    ];

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
}
