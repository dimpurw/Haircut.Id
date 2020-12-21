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
                        <h4 class="card-title">Data Transaksi</h4>
                        <p class="card-description"><code>Total Saldo</code><span>{{$data_barber->transaksi->sum('saldo_barber')}}</span>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Nama Pelanggan</th>
                                    <th> Email </th>
                                    <th> Alamat </th>
                                    <th> Nomor telepon </th>
                                    <th> saldo </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_barber->transaksi as $transaksi)
                                <tr>
                                    <td> {{$transaksi->pelanggan->nama}} </td>
                                    <td> {{$transaksi->pelanggan->user->email}} </td>
                                    <td> {{$transaksi->pelanggan->alamat}} </td>
                                    <td> {{$transaksi->pelanggan->nomortelepon}} </td>
                                    <td> {{$transaksi->saldo_barber}} </td>
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