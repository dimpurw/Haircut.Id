@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Barbershop</h4>
                        <form class="forms-sample" action="/barber/{{$barber->id}}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Foto</label>
                                <input type="file" name="foto" class="form-control" id="exampleInputName1" value="{{$barber->foto}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" name="nama_barber" class="form-control" id="exampleInputName1" value="{{$barber->nama_barber}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="{{$barber->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail3" value="{{$barber->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nomor Telepon</label>
                                <input type="number" name="nomortelepon" class="form-control" id="exampleInputEmail3" value="{{$barber->nomortelepon}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Keahlian</label>
                                <input type="text" name="keahlian" class="form-control" id="exampleInputEmail3" value="{{$barber->keahlian}}">
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <a href="/barber/{{auth()->user()->id}}">
                                <button class="btn btn-light">Cancel</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection