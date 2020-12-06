<?php

namespace App\Http\Controllers\Barbershop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;

class JadwalController extends Controller
{
    public function index($id)
    {
        $data_barber = \App\Barbershop::find($id);
        return view('barbershop.jadwal', ['data_barber' => $data_barber]);
    }

    public function create($id)
    {
        $barber = \App\Barbershop::find($id);
        return view('barbershop.createjadwal', ['barber' => $barber]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_barber' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required|max:13',
            'keahlian' => 'required',
            'foto' => 'required'
        ]);

        $booking = new Booking();
        $booking->barbershop_id = $request->barbershop_id;
        $booking->barber_id = $request->barber_id;
        $booking->tanggal = $request->tanggal;
        $booking->start = $request->start;
        $booking->end = $request->end;
        $booking->save();
        return redirect('/dashboardsbarbershop');
    }
}
