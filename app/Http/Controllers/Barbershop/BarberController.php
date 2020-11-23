<?php

namespace App\Http\Controllers\Barbershop;

use App\Barbershop;
use App\Barber;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class BarberController extends Controller
{
    public function index($id)
    {
        $data_barber = \App\Barbershop::find($id);
        return view('barbershop.barber', ['data_barber' => $data_barber]);
    }

    public function create()
    {
        return view('barbershop.createbarber');
    }

    public function store(Request $request, $id)
    {
        $barbershop = \App\Barbershop::find($id);
        Barber::create([
            'barbershop_id' => $barbershop->id,
            'nama_barber' => request('nama_barber'),
            'email' => request('email'),
            'alamat' => request('alamat'),
            'nomortelepon' => request('nomortelepon'),
            'keahlian' => request('keahlian'),
        ]);
        return redirect('/dashboardsbarbershop');
    }
}
