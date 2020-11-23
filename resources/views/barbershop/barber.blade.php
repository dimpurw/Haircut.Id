@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Barber</h4>
                        <p class="card-description"><a href="/barber/{{Auth()->user()->barbershop->id}}/create"><code>Tambah Data Barber</code></a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Nama </th>
                                    <th> Email </th>
                                    <th> Alamat </th>
                                    <th> Nomor telepon </th>
                                    <th> Keahlian </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_barber->barber as $barber)
                                <tr>
                                    <td class="py-1">
                                        <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                                    </td>
                                    <td> {{$barber->nama_barber}} </td>
                                    <td> {{$barber->email}} </td>
                                    <td> {{$barber->alamat}} </td>
                                    <td> {{$barber->nomortelepon}} </td>
                                    <td> {{$barber->keahlian}} </td>
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