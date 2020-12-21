<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id)
    {
        $pelanggan = \App\Pelanggan::find($id);
        return view('pelanggan.transaksi', ['pelanggan' => $pelanggan]);
    }
}
