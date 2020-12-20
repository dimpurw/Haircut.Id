<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'invoice_id', 'pelanggan_id',  'barber_id', 'keterangan',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }

    public function barbershop()
    {
        return $this->belongsTo('App\Barbershop');
    }
}
