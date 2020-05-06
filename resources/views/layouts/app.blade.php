<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8" />
    <title>{{ $data['title'] }}</title>
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
    
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    @yield('custom_css')
    <!-- ================== END PAGE LEVEL STYLE ================== -->
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
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed in page-sidebar-toggled">
        
        <!-- begin #header -->
        @include('layouts.header')
        <!-- end #header -->
        
        <!-- begin #sidebar -->
        @include('layouts.sidebar')
        <!-- end #sidebar -->
        
        <!-- main content -->
        @yield('content') 
        <!-- end main content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
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
    @yield('custom_js')
    <script>
        $(document).ready(function() {
            App.init();
            Dashboard.init();
        });
    </script>
    
</body>

    @yield('custom_scripts')


</html>