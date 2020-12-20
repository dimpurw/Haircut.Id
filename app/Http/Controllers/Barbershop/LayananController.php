<?php

namespace App\Http\Controllers\Barbershop;

use App\Http\Controllers\Controller;
use App\Paket;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index($id)
    {
        $data_barber = \App\Barbershop::find($id);
        return view('barbershop.layanan', ['data_barber' => $data_barber]);
    }

    public function create($id)
    {
        $barber = \App\Barbershop::find($id);
        return view('barbershop.createlayanan', ['barber' => $barber]);
    }

    public function store(Request $request, $id)
    {

        $paket = new Paket();
        $paket->barbershop_id = $request->barbershop_id;
        $paket->barber_id = $request->barber_id;
        $paket->layanan = $request->layanan;
        $paket->harga = $request->harga;
        $paket->save();
        return redirect('/dashboardsbarbershop');
    }
}
