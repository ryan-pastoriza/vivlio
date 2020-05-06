<html>
<head>
    <title>Vivlio | Login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/custom_main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/templates/login.css')}}">
    <link href="{{asset('public/_color/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('public/images/vivlio_388.fw.png')}}">
    <link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
</head>
<style type="text/css">
    .text-red{
        color: #B20000;
    }
</style>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>

            <div class="col-md-6 col-xs-12 col-md-offset-3">
              
                <img class="img img-responsive vivlio_margin_auto" src="{{asset('public/images/vivlio_197.fw.png')}}" height="150" width="150" draggable="false">
                <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>
                <div class="col-md-6 col-xs-12 col-md-offset-3">
                    <div class="vivlio_height_spacer_60"></div>
                    <div class="vivlio_height_spacer_20"></div>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                      <div class="form-group">

                            {{ route('login') }}
                           <div class="input-group">
                              <div class="input-group-addon vivlio_bg_primary"><i class="fa fa-user"></i></div>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"  placeholder="Username" required autofocus>
                            </div>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <span class="text-red">{{ $errors->first('username') }}</span>
                                </span>
                            @endif
                            <div class="vivlio_height_spacer_30"></div>
                            <div class="input-group">
                              <div class="input-group-addon vivlio_bg_primary"><i class="fa fa-key"></i></div>
                                 <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                             @if ($errors->has('password'))
                                <span class="help-block">
                                    <span class="text-red">{{ $errors->first('password') }}</span>
                                </span>
                            @endif
                            <div class="vivlio_height_spacer_20"></div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-8">
                                    <button class="nephritis-flat-button">Login</button>
                                </div>
                            </div>
                      </div>
                    </form>

                </div>
            </div>

        </div>

    </div>
</body>
</html>