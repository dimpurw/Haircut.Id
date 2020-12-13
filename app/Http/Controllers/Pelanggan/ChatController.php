<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Letter;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($id)
    {
        $chat = \App\Letter::all();
        $data_barbershop = \App\Barbershop::find($id);
        return view('pelanggan.chat', [
            'chat' => $chat,
            'data_barbershop' => $data_barbershop,
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required',
        ]);

        $letter = new Letter();
        $letter->barbershop_id = $request->barbershop_id;
        $letter->pelanggan_id = $request->pelanggan_id;
        $letter->pesan = $request->pesan;
        $letter->save();
        return redirect()->back();
    }
}
