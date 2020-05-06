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
			background: #d9e0e7;
		}
		a{
			text-decoration: none!important;
		}

	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/inventory/set_sched.fw.png')}}" height="20px;" width="20px;"> Set Inventory Schedule</a></a></li>
				<li><a href="#nav-pills-tab-2" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/inventory/inventory.fw.png')}}" height="20px;" width="20px;"> Inventory</a></li>
				<li><a href="#nav-pills-tab-3" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/inventory/history.fw.png')}}" height="20px;" width="20px;"> History</a></li>
				
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				  	<div class="row">
				  		<div class="col-md-3 bg-white">
				  			 <div class="row">
				  			 	  <div class="col-md-12">
						  		 	<h5 style="color:#004040;"><span >Inventory Schedule Setup</span></h5>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<span class="pull-left">
						  		 		<p><small>Schedule Code</small></p>
						  		 		<p class="text-success" style="font-size:18px; margin-top:-10px;">IN1349928737</p>
						  		 	</span>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<div class="form-group">
						  		 			<label><small>Inventory Schedule Type</small></label>
						  		 			<select name="" id="type" class="form-control" >
						  		 				<option value="">-SELECT-</option>
						  		 				<option value="">Anually</option>
						  		 				<option value="">Monthly</option>
						  		 			</select>
						  		 	</div>
						  		 </div>
						  		 <div class="col-md-6">
						  		 	<div class="form-group">
						  		 			<label><small>Year</small></label>
						  		 			<select name="" id="type" class="form-control" >
						  		 				<option value="">-SELECT-</option>
						  		 				<option value="">2016-2017</option>
						  		 				<option value="">2017-2018</option>
						  		 			</select>
						  		 	</div>
						  		 </div>
						  		 <div class="col-md-6">
						  		 	<div class="form-group">
						  		 			<label><small>Sem</small></label>
						  		 			<select name="" id="type" class="form-control" >
						  		 				<option value="">-SELECT-</option>
						  		 				<option value="">1st</option>
						  		 				<option value="">2nd</option>
						  		 			</select>
						  		 	</div>
						  		 </div>
						  		 
						  		<div class="col-md-12">
						  			<div class="form-group">
						  		 			<label><small>Mode of Inventory</small></label>
						  		 			<select name="" id="type" class="form-control" >
						  		 				<option value="">-SELECT-</option>
						  		 				<option value="">Anually</option>
						  		 				<option value="">Monthly</option>
						  		 			</select>
						  		 	</div>
						  		</div>
						  		<div class="col-md-12">
						  			<div class="form-group">
						  		 			<label><small>Date Start</small></label>
						  		 			<input class="form-control" type="date" name="">
						  		 	</div>
						  		</div>
						  		<div class="col-md-12">
						  			<div class="form-group">
						  		 			<label><small>Location</small></label>
						  		 			<input class="form-control" type="text" name="" placeholder="location">
						  		 	</div>
						  		</div>
						  		<div class="col-md-12">
						  			<div class="form-group">
						  		 			<label><small>Category</small></label>
						  		 			<select name="" id="type" class="form-control" >
						  		 				<option value="">-SELECT-</option>
						  		 				<option value="">Filipiniana</option>
						  		 				<option value="">Monthly</option>
						  		 			</select>
						  		 	</div>
						  		</div>
						  		 <div class="col-md-12">
						  		 	 <div class="pull-right">
						  		 	 	 <button class="btn btn-flat btn-sm btn-success">Reactive</button>
						  		 	 </div>
						  		 </div>
						  		 <div class="col-md-12" style="height:13px;"></div>
						  		 
				  			 </div>
				  			 
				  		</div>
				  		<div class="col-md-9">
				  			TABLE HERE
				  		</div>
				  	</div>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    <div class="row">
				  		<div class="col-md-3 bg-white">
				  			 <div class="row">
				  			 	  <div class="col-md-12">
						  		 	<h5 style="color:#004040;"><span >Inventory Transaction Identification</span></h5>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<span class="pull-left">
						  		 		<p><small>Inventory Code</small></p>
						  		 		<p class="text-success" style="font-size:18px; margin-top:-10px;">IN1349928737</p>
						  		 		<p><small>Category</small></p>
						  		 		<p class="text-success" style="font-size:10px; margin-top:-10px;">FILIPINIANA</p>

						  		 	</span>
						  		 	<span class="pull-right">
						  		 		<p><small>Date</small></p>
						  		 		<p class="text-success" style="font-size:11px; margin-top:-10px;">July 17, 2017</p>
						  		 	</span>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	 <div class="pull-right">
						  		 	 	 <button class="btn btn-flat btn-sm btn-success">Reactive</button>
						  		 	 	  <button class="btn btn-flat btn-sm btn-warning">Cancel</button>
						  		 	 </div>
						  		 </div>
						  		 <div class="col-md-12" style="height:13px;"></div>
						  		 
				  			 </div>
				  			 <div class="row" style="border-top:1px dashed #004040; ">
				  			 	  <div class="col-md-12">
						  		 	<h5 style="color:#004040;"><span >Checking</span></h5>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<div class="form-group">
						  		 		<input class="form-control" type="text" name="" placeholder="Search">
						  		 	</div>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<div class="col-md-12" style="padding:0;">
					    	     	 	 <p style="font-size:18px;color:#004040;">Software engineering</p>
					    	     	 	 <p style="font-size:10px; margin-top:-10px;">Principles and Practices</p>
					    	     	 	 <p style="font-size:18px;color:#00acac;">3 <sup>rd</sup> Edition</p>
					    	     	 	 <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;">Accension #:</span> 123002349</p>
					    	     	 	 <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;">Author:</span> Ryan Pastoriza</p>
					    	     	 </div>
						    	    <div class="form-group">
						    	    	<label>Quantity</label>
						  		 		<input class="form-control" type="text" name="" placeholder="# of Books">
						  		 	</div>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	 <div class="pull-right">
						  		 	 	 <button class="btn btn-flat btn-sm btn-success">Save</button>
						  		 	 </div>
						  		 </div>
						  		 <div class="col-md-12" style="height:13px;"></div>
						  		 
				  			 </div>
				  		</div>
				  		<div class="col-md-9">
				  			TABLE HERE
				  		</div>
				  	</div>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-3">
				    <div class="row">
				  		<div class="col-md-3 bg-white">
				  			 <div class="row">
				  			 	  <div class="col-md-12">
						  		 	<h5 style="color:#004040;"><span >Inventory Transaction</span></h5>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	 <div class="form-group">
						  		 	 	<input class="form-control" type="text" name="" placeholder="search">
						  		 	 </div>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	<table class="table table-bordered">
						  		 		<thead>
						  		 			<th style="color:#004040;">Transaction Code</th>
						  		 		</thead>
						  		 		<tbody>
						  		 			<tr>
						  		 				<td>
						  		 					<div class="col-md-12" style="padding:0;">
									    	     	 	 <a href=""><p style="font-size:20px;color:#004040;">IN1349928737</p></a>
									    	     	 	 <p style="font-size:10px; margin-top:-10px;">July 20, 2017 - July 20, 2017</p>
									    	     	 </div>
						  		 				</td>
						  		 			</tr>
						  		 			<tr>
						  		 				<td>
						  		 					<div class="col-md-12" style="padding:0;">
									    	     	 	 <a href=""><p style="font-size:20px;color:#004040;">IN1349928737</p></a>
									    	     	 	 <p style="font-size:10px; margin-top:-10px;">July 20, 2017 - July 20, 2017</p>
									    	     	 </div>
						  		 				</td>
						  		 			</tr>
						  		 			<tr>
						  		 				<td>
						  		 					<div class="col-md-12" style="padding:0;">
									    	     	 	 <a href=""><p style="font-size:20px;color:#004040;">IN1349928737</p></a>
									    	     	 	 <p style="font-size:10px; margin-top:-10px;">July 20, 2017 - July 20, 2017</p>
									    	     	 </div>
						  		 				</td>
						  		 			</tr>
						  		 			<tr>
						  		 				<td>
						  		 					<div class="col-md-12" style="padding:0;">
									    	     	 	 <a href=""><p style="font-size:20px;color:#004040;">IN1349928737</p></a>
									    	     	 	 <p style="font-size:10px; margin-top:-10px;">July 20, 2017 - July 20, 2017</p>
									    	     	 </div>
						  		 				</td>
						  		 			</tr>

						  		 		</tbody>
						  		 	</table>
						  		 </div>	

						  		 <div class="col-md-12" style="height:13px;"></div>
						  		 
				  			 </div>
				  			
				  		</div>
				  		<div class="col-md-9">
				  			TABLE HERE
				  		</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection