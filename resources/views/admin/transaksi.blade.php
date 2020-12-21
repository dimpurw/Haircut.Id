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
                        <p class="card-description"><code>Total Saldo</code><span>{{$transaksi->sum('saldo_admin')}}</span>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Nama Pelanggan</th>
                                    <th> Nama Barbershop </th>
                                    <th> Alamat Barbershop </th>
                                    <th> Nomor telepon Barbershop </th>
                                    <th> saldo </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $transaksi)
                                <tr>
                                    <td> {{$transaksi->pelanggan->nama}} </td>
                                    <td> {{$transaksi->barbershop->nama}} </td>
                                    <td> {{$transaksi->barbershop->alamat}} </td>
                                    <td> {{$transaksi->barbershop->nomortelepon}} </td>
                                    <td> {{$transaksi->saldo_admin}} </td>
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