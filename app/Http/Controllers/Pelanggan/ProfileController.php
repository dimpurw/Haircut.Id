<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProfileController extends Controller
{
    public function profile($id)
    {
        $pelanggan = \App\Pelanggan::find($id);
        return view('pelanggan.profile', ['pelanggan' => $pelanggan]);
    }

    public function editprofile($id)
    {
        $users = \App\User::find($id);
        return view('pelanggan.editprofile', ['users' => $users]);
    }

    public function updateprofile(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:32'],
            'TGL' => ['required', 'date'],
            'nomortelepon' => ['required', 'min:11', 'max:13', 'regex:/(0)[0-9]{10}/'],
            'foto' => ['required', 'mimes:jpeg,jpg,png']
        ]);

        $user = \Auth::user()->id;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto', $request->file('foto')->getClientOriginalName());
            DB::table('users as u')
                ->join('pelanggan as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "nomortelepon" =>  $request->nomortelepon,
                    "TGL" => $request->TGL,
                    "alamat" => $request->alamat,
                    "foto" => $request->file('foto')->getClientOriginalName(),
                ]);
        } else {
            DB::table('users as u')
                ->join('pelanggan as p', 'u.id', '=', 'p.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "nomortelepon" =>  $request->nomortelepon,
                    "TGL" => $request->TGL,
                    "alamat" => $request->alamat,
                ]);
        }
        return redirect(url('/pelanggan/{id}/profile'))->with('success', 'data berhasil diubah');
    }
}
