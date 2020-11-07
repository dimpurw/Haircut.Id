@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Barbershop</h4>
                        <form class="forms-sample" action="/akunbarbershop/{{$barbershop->id}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputName1" value="{{$barbershop->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail3" value="{{$barbershop->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="exampleInputEmail3" value="{{$barbershop->alamat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Nomor Telepon</label>
                                <input type="number" name="nomortelepon" class="form-control" id="exampleInputEmail3" value="{{$barbershop->nomortelepon}}">
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