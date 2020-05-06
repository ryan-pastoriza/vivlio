@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />


	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		.tab-content{
			background: transparent;
			color: #004040;
		}

		.timeline .timeline-icon a{
			background: white;
			color: #004040;
			border:5px solid #084040;
		}
		.timeline .timeline-icon a:hover{
			color:white;
		}
		.timeline:before{
			background: #004040;
		}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/logs/patrons.fw.png')}}" height="20px;" width="20px;"> Patron Logs</a></li>
				<li><a href="#nav-pills-tab-2" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/logs/internet.fw.png')}}" height="20px;" width="20px;"> Library Entry</a></li>
				<li><a href="#nav-pills-tab-3" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/logs/library_entry.fw.png')}}" height="20px;" width="20px;"> Internet Area</a></li>
				<li><a href="#nav-pills-tab-4" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/logs/multimedia.fw.png')}}" height="20px;" width="20px;"> Multimedia</a></li>

				<li><a href="{{url('library/log')}}" ><img src="{{url('public/images/icons/3rdbar/logs/internet.fw.png')}}" height="20px;" width="20px;"> Go To Library Entry Portal</a></li>
				<li><a href="{{url('internet/log')}}" ><img src="{{url('public/images/icons/3rdbar/logs/library_entry.fw.png')}}" height="20px;" width="20px;"> Go To Internet Area Portal</a></li>
				<li><a href="{{url('multimedia/log')}}" ><img src="{{url('public/images/icons/3rdbar/logs/multimedia.fw.png')}}" height="20px;" width="20px;"> Go To Multimedia</a></li>

			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				    @include('circulation.logs.patron_log')
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    @include('circulation.logs.library_log')
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-3">
				    @include('circulation.logs.internet_log')
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-4">
				    @include('circulation.logs.multimedia_log')
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection