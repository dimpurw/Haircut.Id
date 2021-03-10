@extends('layouts.main')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Nama BarberShop</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $tra)
            @php
                $y = new \App\Http\Controllers\HomeController;
                $x = $y->invoice($tra->invoice_id);
                $tra->update(['keterangan'=>$x['status']]);
                @endphp
            <tr>
                <td>{{$tra->pelanggan->nama}}</td>
                <td>{{$tra->barbershop->nama}}</td>
                <a href=""><td> {{$tra->saldo_barber}} </td></a>
                <td><a href="https://checkout-staging.xendit.co/web/{{$tra->invoice_id}}">{{$tra->keterangan}}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection