@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Pelanggan</h4>
                        <form class="forms-sample" action="/akunpelanggan/{{$pelanggan->id}}/update" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" class="form-control" id="exampleInputName1" value="{{$pelanggan->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->TGL}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Alamat</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nomor Telepon</label>
                                <input type="number" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->nomortelepon}}">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection