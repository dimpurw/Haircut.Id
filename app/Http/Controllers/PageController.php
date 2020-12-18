<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home()
    {
        $data_barbershop = \App\Barbershop::all();
        return view('welcome', ['data_barbershop' => $data_barbershop]);
    }

    public function barbershop()
    {
        $data_barbershop = \App\Barbershop::all();
        return view('page.barbershop', ['data_barbershop' => $data_barbershop]);
    }

    public function registerbarbershop()
    {
        return view('page.registerbarbershop');
    }

    public function registerpelanggan()
    {
        return view('page.registerpelanggan');
    }

    public function postregisterbarbershop(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:32'],
            'nomortelepon' => ['required', 'min:11', 'max:13', 'regex:/(0)[0-9]{10}/'],
            'foto' => ['required', 'mimes:jpeg,jpg,png']
        ]);
        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'barbershop';
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        //insert ke tabel barbershop
        $request->request->add(['user_id' => $user->id]);
        $barbershop = \App\Barbershop::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $barbershop->foto = $request->file('foto')->getClientOriginalName();
            $barbershop->save();
        }
        return redirect('/registerbarbershop')->with('sukses', 'Data Berhasil Dibuat');
    }

    public function postregisterpelanggan(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'max:50', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'TGL' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:32'],
            'nomortelepon' => ['required', 'min:11', 'max:13', 'regex:/(0)[0-9]{10}/'],
            'foto' => ['required', 'mimes:jpeg,jpg,png']
        ]);
        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'pelanggan';
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        //insert ke tabel pelanggan
        $request->request->add(['user_id' => $user->id]);
        $pelanggan = \App\Pelanggan::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $pelanggan->foto = $request->file('foto')->getClientOriginalName();
            $pelanggan->save();
        }
        return redirect('/registerpelanggan')->with('sukses', 'Data Berhasil Dibuat');
    }
}
