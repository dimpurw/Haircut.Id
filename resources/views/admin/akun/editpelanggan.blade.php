@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Pelanggan</h4>
                        <form class="forms-sample" action="/akunpelanggan/{{$pelanggan->id}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName1" value="{{$pelanggan->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tanggal Lahir</label>
                                <input type="date" name="TGL" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->TGL}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nomor Telepon</label>
                                <input type="number" name="nomortelepon" class="form-control" id="exampleInputEmail3" value="{{$pelanggan->nomortelepon}}">
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