<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .avatar {
        position: relative;
        display: inline-block;
        width: 40px;
        white-space: nowrap;
        border-radius: 1000px;
        vertical-align: bottom
    }

    .avatar i {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 10px;
        height: 10px;
        border: 2px solid #fff;
        border-radius: 100%
    }

    .avatar img {
        width: 100%;
        max-width: 100%;
        height: auto;
        border: 0 none;
        border-radius: 1000px
    }

    .avatar-online i {
        background-color: #4caf50
    }

    .avatar-off i {
        background-color: #616161
    }

    .avatar-busy i {
        background-color: #ff9800
    }

    .avatar-away i {
        background-color: #f44336
    }

    .avatar-100 {
        width: 100px
    }

    .avatar-100 i {
        height: 20px;
        width: 20px
    }

    .avatar-lg {
        width: 50px
    }

    .avatar-lg i {
        height: 12px;
        width: 12px
    }

    .avatar-sm {
        width: 30px
    }

    .avatar-sm i {
        height: 8px;
        width: 8px
    }

    .avatar-xs {
        width: 20px
    }

    .avatar-xs i {
        height: 7px;
        width: 7px
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid transparent;
    }
</style>

<body>
    <div class="row bootstrap snippets bootdeys ml-5">
        <div class="col-md-6 col-xs-12 col-md-offset-3">
            <div class="panel" id="messge">
                <div class="panel-heading">
                    <h3 class="panel-title">Message</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group list-group-full">
                        @foreach($chat as $data)
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <span class="avatar avatar-online">
                                        <img src="{{$data->pelanggan->getFoto()}}" alt="">
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h5 class="list-group-item-heading">
                                        <small class="pull-right">3 days ago</small>
                                        {{$data->pelanggan->nama}}
                                    </h5>
                                    <p class="list-group-item-text">{{$data->pesan}}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <form action="/chat/{{Auth()->user()->pelanggan->id}}/store" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="pelanggan_id" value="{{Auth()->user()->pelanggan->id}}" hidden="" class="form-control">
                    <input name="barbershop_id" value="{{$data_barbershop->id}}" hidden="" class="form-control">
                    <input type="text" class="form-control" placeholder="Ketik Pesan" aria-describedby="button-addon2" name="pesan">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>