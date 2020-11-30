@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$booking->nama_barber}}</li>
        <li class="list-group-item">{{$booking->email}}</li>
        <li class="list-group-item">{{$booking->alamat}}</li>
        <li class="list-group-item">{{$booking->nomortelepon}}</li>
    </ul>
</div>
<div class="container mt-4">
    <p style="text-align: center; font-size:large;">Jadwal Kerja</p>
</div>
@foreach($booking->booking as $data)
<div class="container mt-5">
    <div class="row">
        @if(\Carbon\Carbon::parse($data->tanggal)->lessThan(\Carbon\Carbon::now()))
        <div class="col"><button type="button" class="btn btn-secondary" hidden="">{{$data->tanggal}}<span> {{$data->jam}}</span></button></div>
        @elseif($data->status == 'claim')
        <div class="col"><button type="button" class="btn btn-danger" readonly title="jadwal telah di booking, harap pilih jadwal lain">{{$data->tanggal}}<span> {{$data->jam}}</span></button></div>
        @else
        <div class="col"><a href="/booking/{{$data->id}}/checkout"><button type="button" class="btn btn-secondary">{{$data->tanggal}}<span> {{$data->jam}}</span></button></a></div>
        @endif

    </div>
</div>
@endforeach
@endsection