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
    textarea:hover, 
	input:hover, 
	textarea:active, 
	input:active, 
	textarea:focus, 
	input:focus,
	button:focus,
	button:active,
	button:hover,
	label:focus,
	.btn:active,
	.btn.active
	{
	    outline:0px !important;
	    -webkit-appearance:none;
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
            <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>
            <div class="col-md-4 col-xs-12 col-md-offset-4">
              <img src="{{asset('public/images/vivlio_677.fw.png')}}" width="100%" draggable="false">
                <div class="col-md-4 col-xs-12 col-md-offset-4 vivlio_height_spacer_5_cent"></div>
                <div class="col-md-12 col-xs-12">
                    <div class="vivlio_height_spacer_20"></div>
                    <center>
                    	<div  style="min-height:200px; max-height:250px;">
                    		<div id="container_empty" class="">Patron Information
                            <div>
                                <i class="fa fa-user fa-5x" style="color:white;"></i>
                            </div></div>
                    		<i class="fa fa-spinner fa-pulse fa-3x fa-fw  spiiner hidden" style="color:#00acac;"></i>
                    		<div id="container_patron" class="hidden"></div>
                    	</div>
                    </center>
                </div>
                    <input type="text" name="" id="input_barcode" class="form-control" required="required" pattern="" autofocus="true" placeholder="BARCODE" 
                    style="text-align:center;">
                    <div class="text-center" style="color:#004040;font-size:17px; outline: none;">{{$data['name']}} Entry</div>
                </div>
            </div>

        </div>

    </div>
</body>
<script src="{{asset('public/_color/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(e){
		$('#input_barcode').change(function(e){
				e.preventDefault();
				var barcode = $(this).val();
				var url = "../log_patron";
				var data = {_token:"{{csrf_token()}}",_barcode:barcode,_category:"{{$data['category']}}"};
				var text = $('#input_barcode');
				$('#container_empty').addClass('hidden');
				$("#container_patron").addClass('hidden');
				$('.spiiner').removeClass('hidden');
				var posting = $.post(url,data)
					posting.done(function(data){
						if(data === '0'){}else{
							$("#container_patron").removeClass('hidden');
							$('.spiiner').addClass('hidden');
							$('#container_patron').html(data);
						}
					});
				text.val("");
			});

	});
</script>
</html>