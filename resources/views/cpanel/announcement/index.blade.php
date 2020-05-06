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
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab"> <i class="fa fa-server"></i> Slide Announcement</a></li>
				<li><a href="#nav-pills-tab-2" data-toggle="tab"> <i class="fa fa-desktop"></i> Running Announcement</a></li>
				<li><a href="{{asset('announcement')}}" > <i class="fa fa-newspaper-o"></i> Go To Announcement</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				    <div class="row">
				    	<div class="col-md-12">
				    		 <div class="col-md-6">
				    		 	<div class="panel panel-default">
									<div class="panel-heading">
										<b> <i class="fa fa fa-server fa-2x"></i>	Slide Announcement Page</b>
									</div>
									<div class="panel-body">
										<form id="Asave" method="POST" role="form">
											<div class="col-md-12" style="padding:0;">
												<input class="hidden" type="text" name="option" value="slide">
												<input class="hidden" type="text" name="_token" value="{{csrf_token()}}">
												<div class="form-group">
													 <input type="text" name="title" class="form-control" autocomplete="false" placeholder="Announcement Title" required="">
												</div>
												<div class="form-group">
												    <textarea style="resize:none; height:250px;" name="description"  class="textarea form-control" id="running_form_wysihtml5" placeholder="Enter text ..." rows="6" required=""></textarea>
												</div>
												<div class="form-group pull-right">
													<button class="btn btn-flat btn-xs btn-success"><i class="fa fa-check"></i> Save</button>
												</div>
											</div>
										</form>
									</div>
								</div>
				    		 </div>
				    		 <div class="col-md-6">
				    		 	<div class="panel panel-default" style="max-height:430px; overflow:auto;">
									<div class="panel-heading">
										<b> Slide Announcement List</b>
									</div>
									<div class="panel-body">
										<div class="row" id="content-announcement">
										</div>
									</div>
								</div>
				    		 </div>
				    	</div>
				    </div>	
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    <div class="row">
				    	<div class="col-md-12">
				    		 <div class="col-md-6">
				    		 	<div class="panel panel-default">
									<div class="panel-heading">
										<b> <i class="fa fa fa-desktop fa-2x"></i>	Running Announcement</b>
									</div>
									<div class="panel-body">
										<form id="Rsave" method="POST" role="form">
											<div class="col-md-12" style="padding:0;">
												<input class="hidden" type="text" name="option" value="running">
												<input class="hidden" type="text" name="_token" value="{{csrf_token()}}">
												<div class="form-group">
													 <input type="text" name="title" class="form-control" autocomplete="false" placeholder="Announcement Title" required="">
												</div>
												<div class="form-group">
												    <textarea style="resize:none; height:250px;" name="description"  class="textarea form-control" id="running_form_wysihtml5" placeholder="Enter text ..." rows="6" required=""></textarea>
												</div>
												<div class="form-group pull-right">
													<button class="btn btn-flat btn-xs btn-success"><i class="fa fa-check"></i> Save</button>
												</div>
											</div>
										</form>
									</div>
								</div>
				    		 </div>
				    		 <div class="col-md-6">
				    		 	<div class="panel panel-default" style="max-height:500px; overflow:auto;">
									<div class="panel-heading">
										<b> Slide Announcement List</b>
									</div>
									<div class="panel-body">
										<div class="row" id="content-announcement-r">
											
										</div>
									</div>
								</div>
				    		 </div>
				    	</div>
				    </div>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_js')
	<script type="text/javascript">
		 $(document).ready(function(e){
		 	fetch_announce('slide');
		 	fetch_announce('running');

		 	$(document).on('submit','#Asave',function(e){
		 		e.preventDefault();
		 		var value = $(this).serialize();
		 		$(this).find('button').addClass('disabled');
		 		var posting = $.post("{{url('/annoucement/save')}}", value);
		 			posting.done(function(data){
		 				if(data === "1"){
		 					$('#Asave')[0].reset();
		 					fetch_announce('slide');
		 					$('#Asave').find('button').removeClass('disabled');
		 				}
		 			});
		 	});
		 	$(document).on('submit','#Rsave',function(e){
		 		e.preventDefault();
		 		var value = $(this).serialize();
		 		$(this).find('button').addClass('disabled');
		 		var posting = $.post("{{url('/annoucement/save')}}", value);
		 			posting.done(function(data){
		 				if(data === "1"){
		 					$('#Rsave')[0].reset();
		 					fetch_announce('running');
		 					$('#Rsave').find('button').removeClass('disabled');
		 				}
		 			});
		 	});
		 	$(document).on('click','.btn-delete',function(e){
		 		$(this).addClass('disabled');
		 		var id = $(this).attr('id');
		 		var posting = $.post("{{url('/annoucement/delete')}}",{_token:"{{csrf_token()}}",_id:id});
		 			posting.done(function(data){
		 				if(data === "1"){
		 					fetch_announce('slide');
		 					fetch_announce('running');
		 				}
		 			});
		 	});
		 	$(document).on('click','.btn-edit',function(e){
		 		$(this).addClass('disabled');
		 		var id = $(this).attr('id');
		 		var button = $(this);
		 		var posting = $.post("{{url('/annoucement/edit')}}",{_token:"{{csrf_token()}}",_id:id});
		 			posting.done(function(data){
		 				console.log(data);
		 				if(data === "1"){
		 					if(button.attr('status-active') === 'active'){
		 						button.attr('status-active','inactive');
		 						button.removeClass('btn-success');
		 						button.addClass('btn-danger');
		 						button.find('.fa').removeClass('fa-check');
		 						button.find('.fa').addClass('fa-times');
		 					}else{
		 						if(button.attr('status-active') === 'inactive'){
			 						button.attr('status-active','active');
			 						button.removeClass('btn-danger');
			 						button.addClass('btn-success');
			 						button.find('.fa').removeClass('fa-times');
			 						button.find('.fa').addClass('fa-check');
			 					}
		 					}
		 				}
		 			});
		 		button.removeClass('disabled');
		 	});
		 });
		 function fetch_announce(option){
			var posting  = $.post("{{url('/annoucement/fetch')}}",{_token:"{{csrf_token()}}", _option:option});
				posting.done(function(data){
					 if(option == 'slide'){
					 	$('#content-announcement').html(data);
					 }else{
					 	$('#content-announcement-r').html(data);
					 }
				});
		 }
	</script>
@endsection