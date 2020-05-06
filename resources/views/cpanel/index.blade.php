@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
@endsection

@section('content')
	<div class="content">
		<div class="row">
			 <div class="col-md-12" style="height:80px;"></div>
			<!--  <div class="col-md-12">			 	 	 <div class="">
			 	  	   <button class="btn btn-success btn-flat">
			 	  	   	<img class="img" height="150px" width="150px" src="http://192.168.1.150/vivlio/public/images/icons/2ndbar/cpanel/RDA.fw.png"><p>RDA Configuration</p></button>
			 	  	   	<button class="btn btn-success btn-flat">
			 	  	   	<img class="img" height="150px" width="150px" src="http://192.168.1.150/vivlio/public/images/icons/2ndbar/cpanel/announcement.fw.png"><p>Announcement</p></button>
			 	  	   	<button class="btn btn-success btn-flat">
			 	  	   	<img class="img" height="150px" width="150px" src="http://192.168.1.150/vivlio/public/images/icons/2ndbar/cpanel/company.fw.png"><p>Company Settings</p></button>
			 	  	   	<button class="btn btn-success btn-flat">
			 	  	   	<img class="img" height="150px" width="150px" src="http://192.168.1.150/vivlio/public/images/icons/2ndbar/cpanel/printing.fw.png"><p>Printing</p></button>
			 	  </div>
			 </div> -->
		</div>
	</div>
@endsection
