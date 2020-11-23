<?php

namespace App\Http\Controllers\Barbershop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('barbershop.dashboard');
    }
    public function profile($id)
    {
        $barbershop = \App\Barbershop::find($id);
        return view('barbershop.profile', ['barbershop' => $barbershop]);
    }

    public function editprofile($id)
    {
        $users = \App\User::find($id);
        return view('barbershop.editprofile', ['users' => $users]);
    }

    public function updateprofile(Request $request, $id)
    {
        $user = \Auth::user()->id;
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto', $request->file('foto')->getClientOriginalName());
            DB::table('users as u')
                ->join('barbershop as b', 'u.id', '=', 'b.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "nomortelepon" =>  $request->nomortelepon,
                    "alamat" => $request->alamat,
                    "foto" => $request->file('foto')->getClientOriginalName(),
                ]);
        } else {
            DB::table('users as u')
                ->join('barbershop as b', 'u.id', '=', 'b.user_id')->where('u.id', $user)
                ->update([
                    "nama" => $request->nama,
                    "username" => $request->username,
                    "email" => $request->email,
                    "nomortelepon" =>  $request->nomortelepon,
                    "alamat" => $request->alamat,
                ]);
        }
        return redirect(url('/home'))->with('success', 'data berhasil diubah');
    }
}
