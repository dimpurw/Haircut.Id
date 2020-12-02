@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Layanan</h4>
                        <p class="card-description"><a href="/layanan/{{Auth()->user()->barbershop->id}}/create"><code>Tambah Data Layanan</code></a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th> Nama </th>
                                    <th> Layanan </th>
                                    <th> Harga </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_barber->paket as $barber)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{$barber->barber->getFoto()}}" alt="image" />
                                    </td>
                                    <td>{{$barber->barber->nama_barber}}</td>
                                    <td> {{$barber->layanan}} </td>
                                    <td> {{$barber->harga}} </td>
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