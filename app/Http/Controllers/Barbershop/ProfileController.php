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
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:32'],
            'nomortelepon' => ['required', 'min:11', 'max:13', 'regex:/(0)[0-9]{10}/'],
            'foto' => ['required', 'mimes:jpeg,jpg,png']
        ]);

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
        return redirect(url('/barbershop/{id}/profile'))->with('success', 'data berhasil diubah');
    }
}
