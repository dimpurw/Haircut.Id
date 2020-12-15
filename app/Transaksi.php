<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'invoice_id', 'pelanggan_id',  'barber_id', 'keterangan',
    ];
}
