<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xendit\Xendit;

class TransaksiController extends Controller
{
    public function index($id)
    {
        // Xendit::setApiKey('xnd_development_zbk4MyoCcYlQtNjxNrLEZNoACVbXzllSLq8S7gcZok5FpTKEvD4WJ3EUCYlqTg');
        // $id = '5fdcd088b3ce9d40b5a6571c';
        // $getInvoice = \Xendit\Invoice::retrieve($id);
        // var_dump($getInvoice);
        $transaksi = \App\Transaksi::find($id);
        return view('pelanggan.transaksi', ['transaksi' => $transaksi]);
    }
}
