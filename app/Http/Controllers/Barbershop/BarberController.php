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

    public function store(Request $request)
    {

        $request->validate([
            'nama_barber' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required|max:13',
            'keahlian' => 'required',
            'foto' => 'required'
        ]);

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
        }

        $barbershop_id = auth()->user()->barbershop->id;

        $barber = new Barber;
        $barber->nama_barber = $request->nama_barber;
        $barber->email = $request->email;
        $barber->alamat = $request->alamat;
        $barber->nomortelepon = $request->nomortelepon;
        $barber->keahlian = $request->keahlian;
        $barber->foto = $request->file('foto')->getClientOriginalName();
        $barber->barbershop_id = $barbershop_id;
        $barber->save();

        return redirect('/dashboardsbarbershop');
    }

    public function edit($id)
    {
        $barber = \App\Barber::find($id);
        return view('barbershop.editbarber', ['barber' => $barber]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barber' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomortelepon' => 'required|max:13',
            'keahlian' => 'required',
            'foto' => 'required'
        ]);

        $barber = \App\Barber::find($id);
        $barber->nama_barber = $request->nama_barber;
        $barber->email = $request->email;
        $barber->alamat = $request->alamat;
        $barber->nomortelepon = $request->nomortelepon;
        $barber->keahlian = $request->keahlian;
        if ($request->has('foto')) {
            $foto = $request->file('foto');
            $filename = $foto->getClientOriginalName();
            $foto->move(public_path('foto/'), $filename);
            $barber->foto = $request->file('foto')->getClientOriginalName();
        }
        $barber->update();
        return redirect(url('/barber/' . $barber->id))->with('success', 'data berhasil diubah');
    }
}
