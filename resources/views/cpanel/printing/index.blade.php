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
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-heading">
				 	<h5><i class="fa fa-print"></i> Printing Information</h5>
				 </div>
				 <div class="panel-body">
				 	<center class="hidden">
				 		 <div class="col-md-12">
				 		 	<span><strong>ACLC College of Butuan City</strong></span>
				 		 </div>
				 		 <div class="col-md-12">
				 		 	<span><strong>HDS Building 999 JC.Aquino St. </strong></span>
				 		 </div>
				 		 <div class="col-md-12">
				 		 	<span><strong>Butuan City</strong></span>
				 		 </div>
				 	</center>
				 </div>
			</div>
		</div>
	</div>
</div>
@endsection