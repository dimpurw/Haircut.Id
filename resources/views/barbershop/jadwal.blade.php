@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Jadwal Booking</h4>
                        <p class="card-description"><a href="/booking/{{Auth()->user()->barbershop->id}}/create"><code>Tambah Data Jadwal Booking</code></a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th> Nama </th>
                                    <th> Tanggal </th>
                                    <th> Jam </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_barber->booking as $barber)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{$barber->barber->getFoto()}}" alt="image" />
                                    </td>
                                    <td>{{$barber->barber->nama_barber}}</td>
                                    <td> {{$barber->tanggal}} </td>
                                    <td> {{$barber->start}} - {{$barber->end}} </td>
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