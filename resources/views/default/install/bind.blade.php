<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>绑定帐号</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="https://cdn.bootcss.com/bootswatch/4.3.1/{{ setting('theme','materia') }}/bootstrap.min.css">
    <link href="https://cdn.remixicon.com/releases/v1.2.2/remixicon.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ setting('name','OLAINDEX') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"><i class="remixicon-home-fill"></i> 首页</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-3">
    @if (session()->has('alertMessage'))
        <div class="alert alert-dismissible alert-{{ session()->pull('alertType')}}">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>{{ session()->pull('alertMessage') }}</p>
        </div>
    @endif
    <div class="card border-light mb-3">
        <div class="card-header">绑定帐号
            <small class="text-danger">请确认以下信息</small>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="form-control-label" for="client_id">client_id </label>
                <input type="text" class="form-control" id="client_id" name="client_id"
                       value="{{ setting('client_id') }}" disabled>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="client_secret">client_secret </label>
                <input type="text" class="form-control" id="client_secret" name="client_secret"
                       value="{{ substr_replace(setting('client_secret'),"*****",3,5)}}"
                       disabled>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="redirect_uri">redirect_uri </label>
                <input type="text" class="form-control" id="redirect_uri" name="redirect_uri"
                       value="{{ setting('redirect_uri') }}" disabled>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="account_type">账号类型 </label>
                <input type="text" class="form-control" id="account_type" name="account_type"
                       value="{{ setting('account_type') }}" disabled>
            </div>
            <form id="bind-form" action="{{ route('bind') }}" method="POST"
                  class="invisible">
                @csrf
            </form>
            <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('bind-form').submit();"
               class="btn btn-info">绑定</a>
            <a href="{{ route('reset') }}" class="btn btn-danger">返回更改</a>
        </div>
    </div>
    <footer id="footer">
        <div class="row text-center">
            <div class="col-lg-12">
                <p>Made by <a href="http://imwnk.cn">IMWNK</a>.</p>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
