@extends('layouts.app')


@section('custom_css')
{{-- 
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
 --}}

	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/css/fonts-custom.css')}}" rel="stylesheet" />
	<!-- <link href="{{asset('public/_color/plugins/DataTables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet"/> -->
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/plugins/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet"/>
	

	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}

	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" style="margin-left: 91px!important;">
	<div class="row">
			<div class="col-md-12" style="margin-left: 20px; margin-top: 20px;">
				<ul class="nav nav-pills">
					<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab">Create Account</a></li>
					<li><a href="#nav-pills-tab-2" data-toggle="tab">Return</a></li>
					<li><a href="#nav-pills-tab-3" data-toggle="tab">Renewal</a></li>
					<li><a href="#nav-pills-tab-4" data-toggle="tab">Hold Reserved</a></li>
					<li><a href="#nav-pills-tab-5" data-toggle="tab">Fines</a></li>
					<li><a href="#nav-pills-tab-6" data-toggle="tab">Overdue</a></li>

				</ul>
			</div>
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
					{{-- @include('user_management.roles.create_account') --}}
				    
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-3">
				    
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-4">
				    
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-5">
				    
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-6">
				    
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom_js')
	
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('public/_color/plugins/jstree/dist/jstree.min.js')}}"></script>

	
	
	<script type="text/javascript">

	</script>


@endsection
