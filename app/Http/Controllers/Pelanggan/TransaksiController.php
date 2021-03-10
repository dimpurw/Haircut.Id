<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::where('pelanggan_id',$id)->get();
        return view('pelanggan.transaksi', ['transaksi' => $transaksi]);
    }
}
