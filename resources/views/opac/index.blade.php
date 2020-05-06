<html>
<head>
    <title>{{$data['title']}}</title>
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
	.form-control:focus {
		border-color:#ffffff;
		-webkit-box-shadow: none;
		box-shadow: none;
	}
    body{
    	 background: url('{{asset('public/images/background_image_gray.fw.png')}}') no-repeat center center fixed;
    	 -webkit-background-size: cover;
	     -moz-background-size: cover;
	     -o-background-size: cover;
	     background-size: cover;
	     font-family: source-sans-light;
    }
</style>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    <div class="container-fluid">
        <div class="row">
			<div class="vivlio_height_spacer_60"></div>
			<div class="vivlio_height_spacer_60"></div>
            <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>
            <div class="col-md-4 col-xs-12 col-md-offset-4">
              <img src="{{asset('public/images/vivlio_677.fw.png')}}" width="100%" draggable="false">
                <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>
                    <form action="loadItemsList" method="get">
                    <input type="text" name="q" id="searchKey" class="form-control" required="required" autofocus="true" placeholder="Search">
					<div style="height:20px;"></div>
					<div class="text-center" style="color:#004040;font-size:13px; outline: none;">{{$data['name']}} Search</div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('public/_color/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(e){


	});
</script>
</html>