<?php

namespace App\Http\Controllers\Barbershop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {
        $data_barber = \App\Barbershop::find($id);
        return view('barbershop.transaksi', ['data_barber' => $data_barber]);
    }

    public function booking($id)
    {
        $booking = \App\Barbershop::find($id);
        return view('barbershop.databooking', ['booking' => $booking]);
    }
}
