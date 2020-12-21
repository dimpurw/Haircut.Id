@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <h4 class="card-title">Riwayat Booking</h4>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Nama Pelanggan</th>
                                    <th> Nomor telepon</th>
                                    <th> Layanan</th>
                                    <th> Tanggal Booking </th>
                                    <th> Waktu Mulai </th>
                                    <th> Waktu Berakhir </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking->booking as $booking)
                                <tr>
                                    <td> {{$booking->pelanggan->nama}} </td>
                                    <td> {{$booking->pelanggan->nomortelepon}} </td>
                                    <td> {{$booking->paket->layanan}} </td>
                                    <td> {{$booking->tanggal}} </td>
                                    <td> {{$booking->start}} </td>
                                    <td> {{$booking->end}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection