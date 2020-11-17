@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="card-body">
                        <form action="{{url('/resetnewpassword',$user->id)}}" method="POST">
                            {{csrf_field()}}

                            <div class="form-group">
                                <p>RESET PASSWORD {{$user->username}}</p>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input name="password" type="password" class="form-control" id="new_password">
                            </div>
                            <button type="submit" class="btn btn-primary">simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection