<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DBuse;
use Xendit\Xendit;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->keyXendit = Xendit::setApiKey('xnd_development_zbk4MyoCcYlQtNjxNrLEZNoACVbXzllSLq8S7gcZok5FpTKEvD4WJ3EUCYlqTg');
    }

    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('paket')->where('id', $id)->first());
    }

    public function index()
    {
        $data_barbershop = \App\Barbershop::all();
        return view('page.index', ['data_barbershop' => $data_barbershop]);
    }

    public function barbershopshow()
    {
        $data_barbershop = \App\Barbershop::all();
        return view('page.showbarbershop', ['data_barbershop' => $data_barbershop]);
    }

    public function detail($id)
    {
        $barbershop = \App\Barbershop::find($id);
        $data_barbershop = \App\Barbershop::all();
        return view('page.detail', [
            'barbershop' => $barbershop,
            'data_barbershop' => $data_barbershop,
        ]);
    }

    public function bookingshow($id)
    {
        $booking = \App\Barber::find($id);
        return view('page.booking', ['booking' => $booking]);
    }

    public function checkout($id)
    {
        $user = \App\Pelanggan::find($id);
        $booking = \App\Booking::find($id);
        $paket = \App\Paket::all();
        return view('page.checkout', [
            'user' => $user,
            'booking' => $booking,
            'paket' => $paket,
        ]);
    }

    public function order(Request $request, $id)
    {
        $data = DB::table('paket')->where('id', $request->id)->first();

        $email = $request->email;
        $layanan = $data->layanan;
        $harga = $data->harga;

        $this->keyXendit;
        $params = [
            'external_id' => $id . '_haircut',
            'payer_email' => $email,
            'description' => $layanan,
            'amount' => $harga
        ];

        $saldo_admin = ($harga * 5) / 100;
        $saldo_barber = $harga - $saldo_admin;

        $createInvoice = \Xendit\Invoice::create($params);
        $transaksi = new Transaksi;
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->barbershop_id = $request->barbershop_id;
        $transaksi->invoice_id = $createInvoice['id'];
        $transaksi->saldo_barber = $saldo_barber;
        $transaksi->saldo_admin = $saldo_admin;
        $transaksi->save();
        $x = \Xendit\Invoice::retrieve($createInvoice['id']);

        $booking = \App\Booking::find($id);
        $booking->pelanggan_id = $request->pelanggan_id;
        $booking->paket_id = $request->paket_id;
        $booking->update();
        return redirect(url($x['invoice_url']))->with('success', 'data berhasil diubah');
    }
}
