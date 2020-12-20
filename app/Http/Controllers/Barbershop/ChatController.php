<?php

namespace App\Http\Controllers\Barbershop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Letter;
use App\Pelanggan;
use Illuminate\Support\Facades\App;

class ChatController extends Controller
{
    public function index()
    {
        $pelanggan = \App\Pelanggan::all();
        return view('barbershop.listchat', [
            'pelanggan' => $pelanggan
        ]);
    }

    public function chat($id)
    {
        $chat = \App\Letter::all();
        $data_pelanggan = \App\Pelanggan::find($id);
        return view('barbershop.chat', [
            'chat' => $chat,
            'data_pelanggan' => $data_pelanggan
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
