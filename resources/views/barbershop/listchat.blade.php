@extends('layouts.main')

@section('content')
@foreach($pelanggan as $data)
<div class="container">
    <div class="card" style="width: 18rem;">
        <img src="{{$data->getFoto()}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$data->nama}}</h5>
            <a href="/barbershopchat/{{$data->id}}" class="btn btn-primary">Chat</a>
        </div>
    </div>
</div>
@endforeach
@endsection