@extends('layouts.dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Paket Layanan</h4>
                        <form class="forms-sample" action="/layanan/{{Auth()->user()->barbershop->id}}/store" method="POST">
                            @csrf
                            <input name="barbershop_id" value="{{Auth()->user()->barbershop->id}}" hidden="" class="form-control">
                            <select name="barber_id" class="form-control mb-25" style="color: #000; background-color: #fff;" required oninvalid="alert('Pilih BARBER!');">
                                <option value="">
                                    - pilih -
                                </option class="form-control mb-25" style="color: #000">
                                @foreach($barber->barber as $list)
                                <option value="{{$list->id}}" class="form-control mb-25" style="color: #000;">
                                    {{$list->nama_barber}}
                                </option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="exampleInputName1">Layanan</label>
                                <input type="text" name="layanan" class="form-control" id="exampleInputName1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Harga</label>
                                <input type="number" name="harga" class="form-control" id="exampleInputName1">
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