<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<style>
    body {
        margin-top: 20px;
        background: #ebeef0;
    }

    .panel {
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 24px;
    }

    .panel .panel-heading,
    .panel>:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .panel-heading {
        position: relative;
        height: 50px;
        padding: 0;
        border-bottom: 1px solid #eee;
    }

    .panel-control {
        height: 100%;
        position: relative;
        float: right;
        padding: 0 15px;
    }

    .panel-title {
        font-weight: normal;
        padding: 0 20px 0 20px;
        font-size: 1.416em;
        line-height: 50px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .panel-control>.btn:last-child,
    .panel-control>.btn-group:last-child>.btn:first-child {
        border-bottom-right-radius: 0;
    }

    .panel-control .btn,
    .panel-control .dropdown-toggle.btn {
        border: 0;
    }

    .nano {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .nano>.nano-content {
        position: absolute;
        overflow: scroll;
        overflow-x: hidden;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .pad-all {
        padding: 15px;
    }

    .mar-btm {
        margin-bottom: 15px;
    }

    .media-block .media-left {
        display: block;
        float: left;
    }

    .img-sm {
        width: 46px;
        height: 46px;
    }

    .media-block .media-body {
        display: block;
        overflow: hidden;
        width: auto;
    }

    .pad-hor {
        padding-left: 15px;
        padding-right: 15px;
    }

    .speech {
        position: relative;
        background: #b7dcfe;
        color: #317787;
        display: inline-block;
        border-radius: 0;
        padding: 12px 20px;
    }

    .speech:before {
        content: "";
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        left: 0;
        top: 0;
        border-top: 7px solid transparent;
        border-bottom: 7px solid transparent;
        border-right: 7px solid #b7dcfe;
        margin: 15px 0 0 -6px;
    }

    .speech-right>.speech:before {
        left: auto;
        right: 0;
        border-top: 7px solid transparent;
        border-bottom: 7px solid transparent;
        border-left: 7px solid #ffdc91;
        border-right: 0;
        margin: 15px -6px 0 0;
    }

    .speech .media-heading {
        font-size: 1.2em;
        color: #317787;
        display: block;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        padding-bottom: 5px;
        font-weight: 300;
    }

    .speech-time {
        margin-top: 20px;
        margin-bottom: 0;
        font-size: .8em;
        font-weight: 300;
    }

    .media-block .media-right {
        float: right;
    }

    .speech-right {
        text-align: right;
    }

    .pad-hor {
        padding-left: 15px;
        padding-right: 15px;
    }

    .speech-right>.speech {
        background: #ffda87;
        color: #a07617;
        text-align: right;
    }

    .speech-right>.speech .media-heading {
        color: #a07617;
    }

    .btn-primary,
    .btn-primary:focus,
    .btn-hover-primary:hover,
    .btn-hover-primary:active,
    .btn-hover-primary.active,
    .btn.btn-active-primary:active,
    .btn.btn-active-primary.active,
    .dropdown.open>.btn.btn-active-primary,
    .btn-group.open .dropdown-toggle.btn.btn-active-primary {
        background-color: #579ddb;
        border-color: #5fa2dd;
        color: #fff !important;
    }

    .btn {
        cursor: pointer;
        /* background-color: transparent; */
        color: inherit;
        padding: 6px 12px;
        border-radius: 0;
        border: 1px solid 0;
        font-size: 11px;
        line-height: 1.42857;
        vertical-align: middle;
        -webkit-transition: all .25s;
        transition: all .25s;
    }

    .form-control {
        font-size: 11px;
        height: 100%;
        border-radius: 0;
        box-shadow: none;
        border: 1px solid #e9e9e9;
        transition-duration: .5s;
    }

    .nano>.nano-pane {
        background-color: rgba(0, 0, 0, 0.1);
        position: absolute;
        width: 5px;
        right: 0;
        top: 0;
        bottom: 0;
        opacity: 0;
        -webkit-transition: all .7s;
        transition: all .7s;
    }
</style>
<div class="container">
    <div class="col-md-12 col-lg-6">
        <div class="panel">
            <!--Heading-->
            <div class="panel-heading">
                <div class="panel-control">

                </div>
                <h3 class="panel-title">Chat</h3>
            </div>

            <!--Widget body-->
            <div class="nano has-scrollbar" style="height:380px">
                <div class="nano-content pad-all" tabindex="0" style="right: -17px;">
                    <ul class="list-unstyled media-block">
                        @foreach($chat as $data)
                        @if(Auth::user()->id != $data->barbershop_id)
                        <li class="mar-btm">
                            <div class="media-left">
                            </div>
                            <div class="media-body pad-hor">
                                <div class="speech">
                                    <p>{{$data->pesan}}</p>
                                    <p class="speech-time">
                                    </p>
                                </div>
                            </div>
                        </li>
                        @else
                        <li class="mar-btm">
                            <div class="media-right">
                            </div>
                            <div class="media-body pad-hor speech-right">
                                <div class="speech">
                                    <p>{{$data->pesan}}</p>
                                    <p class="speech-time">
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="nano-pane">
                    <div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div>
                </div>
            </div>

            <!--Widget footer-->
            <form action="/barbershopchat/{{Auth()->user()->barbershop->id}}/store" method="POST">
                @csrf
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-9">
                            <input name="pelanggan_id" value="{{$data_pelanggan->id}}" hidden="" class="form-control">
                            <input name="barbershop_id" value="{{Auth()->user()->barbershop->user_id}}" hidden="" class="form-control">
                            <input name="pesan" type="text" placeholder="Enter your text" class="form-control chat-input">
                        </div>
                        <div class="col-xs-3">
                            <button class="btn btn-primary btn-block" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>