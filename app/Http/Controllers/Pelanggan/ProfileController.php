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
        return redirect(url('/home'))->with('success', 'data berhasil diubah');
    }
}
