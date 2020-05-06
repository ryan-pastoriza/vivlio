<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    

   <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> -->
    <link href="{{asset('public/_color/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/theme/default.css')}}" rel="stylesheet" id="theme" />
    <link rel="shortcut icon" href="{{asset('public/images/vivlio_388.fw.png')}}">
    <!-- ================== END BASE CSS STYLE ================== -->

    <style type="text/css">
        .modal-backdrop {
           background-color: #004040;
        }
    </style>
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('public/_color/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
<div class="col-md-12" style="height:150px;"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-116 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register  
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- ================== BEGIN BASE JS ================== -->
 <script src="{{asset('public/_color/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--[if lt IE 9]>
        <script src="public/_color/crossbrowserjs/html5shiv.js"></script>
        <script src="public/_color/crossbrowserjs/respond.min.js"></script>
        <script src="public/_color/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{asset('public/_color/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- // <script src="{{asset('public/_color/plugins/jquery-cookie/jquery.cookie.js')}}"></script> -->
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{asset('public/_color/plugins/gritter/js/jquery.gritter.js')}}"></script>
    <script src="{{asset('public/_color/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/flot/jquery.flot.time.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/flot/jquery.flot.pie.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/_color/plugins/flot/flot-custom.js')}}"></script>
    <script src="{{asset('public/_color/plugins/moment/moment.min.js')}}"></script>

    <script src="{{asset('public/_color/plugins/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('public/_color/js/dashboard.min.js')}}"></script>
    <script src="{{asset('public/_color/js/apps.min.js')}}"></script>
     <script src="{{asset('public/js/custom.js')}}"></script>
   
    <!-- VUE JS  -->
    <script src="{{asset('public/_color/js/dashboard.min.js')}}"></script>

    <!-- ================== END PAGE LEVEL JS ================== -->
   
</body>

</html>