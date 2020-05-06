<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/page_without_sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2016 04:05:06 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page without Sidebar</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="{{asset('public/_color/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/css/theme/default.css')}}" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('public/_color/plugins/pace/pace.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	<style type="text/css">
		.carousel-control{
			display: none;
		}
		.carousel .item {
		  background-color: #fff;
		}
		.carousel-indicators li {
			    display: inline-block;
			    width: 10px;
			    height: 10px;
			    margin: 7px;
			    text-indent: 0;
			    cursor: pointer;
			    border: none;
			    border-radius: 50%;
			    background-color: white;
			    box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.2);    
		}
		.carousel-indicators .active {
		    width: 10px;
		    height: 10px;
		    margin: 7px;
		    background-color: #004040;
		}
		.carousel-caption{
			right: 0;
			left: 0;
			top: 20px;
		}
		.navbar-brand{
			width: 90px;
		}
		body{
			background: #fff;
		}
		.navbar.navbar-default{
			background: #e9ebeb;
		}
		.footer {
		    position:fixed;
    		bottom:0;
		}
		/* CUSTOM SCROLLBAR*/
		* ::-webkit-scrollbar {
		    height: 7px;
		    width:7px;
		}
		* ::-webkit-scrollbar-thumb {
		    background: #004040;
		    height: 100px;
		    width: 100px;
		}
	</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-without-sidebar page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="{{url('dashboard')}}" class="navbar-brand">
	               		 <img class="img img-responsive" src="{{asset('public/images/logo.fw.png')}}" style="margin:auto;vertical-align:middle;margin-left:7px;margin-top:7px;" draggable="false">
	                </a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<ul class="nav navbar-nav hidden-sm hidden-xs">
                    <li class="" style="margin-top:-5px;">
						<h3 class="text-success">Annoucement</h3>
					</li>
                </ul>
				<!-- end mobile sidebar expand / collapse button -->
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header" style="color:#004040; font-size:2.5em; ">Annoucement System for Vivlio Library System</h1>
			<!-- end page-header -->
			<div class="col-md-8">
				<div class="panel panel-default">
				    <div class="panel-heading">
				        <div class="panel-heading-btn">
				        </div>
				        <h4 class="panel-title"></h4>
				    </div>
				    <div class="panel-body">
				        <center>
				        <div id="announcement_carousel" class="carousel slide" data-ride="carousel">
				        	<ol class="carousel-indicators">
				        		<?php $counter_ind = 0;
				        			  $counter_item = 0;?>
				        		@foreach($data['ann']['slide'] as $value)
				        			<li data-target="#announcement_carousel" data-slide-to="{{$counter_ind}}" class="{{($counter_ind == 0) ? 'active' : '' }}"></li>
				        			<?php $counter_ind++;?>
				        		@endforeach
				        	</ol>
				        	<div class="carousel-inner">
					        	@foreach($data['ann']['slide'] as $value)
					        		<div class="item {{($counter_item == 0) ? 'active' : '' }}">
					        			<img data-src="" alt="First slide" src="{{asset('public/images/whiteBG.fw.png')}}" draggable="false">
					        			<div class="container">
					        				<div class="carousel-caption">
					        					<h4>{{ucwords($value->title)}}</h4>
					        					<p class="text-success" style="font-size:2.3em; ">
										         	{{$value->description}}
										        </p>
					        				</div>
					        			</div>
					        		</div>
					        		<?php $counter_item++;?>
					        	@endforeach
				        	</div>
				        	<a class="left carousel-control" href="#announcement_carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
				        	<a class="right carousel-control" href="#announcement_carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				        </div>
				        </center>
				    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12">
					<h4>New Arrived</h4>
				</div>
				<div class="col-md-12" style="max-height:400px; overflow:auto;">
				 	@foreach($data['ann']['slide'] as $value)
				 	 <div class="media media-sm">
						<a class="media-left" href="javascript:;">
							<img src="{{asset('public/images/book-sample1.fw.png')}}" alt="" class="media-object">
						</a>
						<div class="media-body">
							<h5 class="media-heading text-success">Software Engineering</h5>
							<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus.</p>
						</div>
					</div>
					@endforeach
				 </div>
			</div>
			<div class="col-md-12 footer marquee" style="margin:0; background:white;">
				@foreach($data['ann']['running'] as $value)
					<div class="col-md-3">
							<!-- begin page-header -->
							<h1 class="page-header" style="color:#004040; font-size:1em; text-align:center;"><b>{{ucwords($value->title)}}</b></h1>
							<!-- end page-header -->
							<div class="col-md-12">
								 <center>
						        	<p class="text-success" style="font-size:0.9em; ">
							           {{$value->description}}
							        </p>
						        </center>
							</div>
					</div>	
				@endforeach
			</div>
		</div>
		<!-- end #content -->
        <!-- end theme-panel -->
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
    <script src="{{asset('public/_color/plugins/marquee/marquee.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/marquee/pause.js')}}"></script>
    <!-- VUE JS  -->
    <script src="{{asset('public/_color/js/dashboard.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script>
        $(document).ready(function() {
            App.init();
            Dashboard.init();
        });
    </script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			$('#announcement_carousel').carousel({
				 interval: 1000 * 10
			})
		});
		$(function () {
		    $('.marquee').marquee({
		        duration: 30000,
		         duplicated: true,
		         gap: 00, 
		         direction: 'left',
		         pauseOnHover: false
		    });
		});
	</script>
</body>
</html>

