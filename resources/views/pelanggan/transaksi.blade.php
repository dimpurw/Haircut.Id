@extends('layouts.main')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Nama BarberShop</th>
                <th scope="col">Tanggal Booking</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam berakhir</th>
                <th scope="col">Layanan</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pelanggan->booking as $booking)
            <tr>
                <td>{{$pelanggan->nama}}</td>
                <td> {{$booking->barbershop->nama}} </td>
                <td>{{$booking->tanggal}}</td>
                <td>{{$booking->start}}</td>
                <td>{{$booking->end}}</td>
                <td>{{$booking->paket->layanan}}</td>
                <td>{{$booking->paket->harga}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection