<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function booking()
    {
        $booking = \App\Booking::all();
        return view('admin.riwayatbooking', ['booking' => $booking]);
    }

    public function transaksi()
    {
        $transaksi = \App\Transaksi::all();
        return view('admin.transaksi', ['transaksi' => $transaksi]);
    }
}
