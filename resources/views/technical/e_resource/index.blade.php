@extends('layouts.app')
@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
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
		.media-item:hover{
			cursor: pointer;
			background: #d5f6f0;
		}
		.dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, .dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before{
			background: #004040;
		}
		.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important;border-color:#004040!important;}
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		div.dt-buttons{
			position:absolute;
			right: 220px;
		}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="">
				<div class="panel panel-default">
				    <div class="panel-heading">
				    	<h5 style="color:#004040;"> <i class="fa fa-file-pdf-o"></i> E-Resource</h5>
				    </div>
				    <div class="panel-body">
				    	 <div class="row">
				     	 <div class="col-md-12">
				     	 	 <div class="col-md-3" style="border-left:1px dashed;">
				     	 	 	<div class="row">
				     	 	 		<form id="sbmit-resource" method="post" enctype="multipart/form-data" >
										   <div class="col-md-12">
												<p class="text-success pull-left"><i class="fa fa-upload"></i> Upload Item</p>
											</div>
											<div class="col-md-12" style="height:10px;"></div>
											<div class="col-md-12">
												<div class="form-group">
													<label style="color:#004040;" for="">Name</label>
													<input type="text" name="res_name" class="form-control" id="" placeholder="Name" required="">
												</div>
												<div class="form-group">
													<label style="color:#004040;" for="">Edition</label>
													<input type="text" name="res_edition" class="form-control" id="" placeholder="Edition" required="">
												</div>
												<div class="form-group">
													<label style="color:#004040;" for="">Description</label>
													<textarea class="form-control" name="res_description" id="" cols="30" rows="10" required=""></textarea>
												</div>
												<div class="form-group">
													<label style="color:#004040;" for="">Upload</label>
													<input type="file" class="form-control" name="res_upload_file" id="upload-files" placeholder="Input field" required="">
												</div>
												<div class="form-group hidden">
														<input type="hidden" name="_token" value="{{csrf_token()}}">
												</div>
												<div class="form-group pull-right">
													<button type="submit" class="btn btn-flat btn-success btn-sm"><i class="fa fa-upload"></i> Upload</button>
												</div>
											</div>
											<div class="col-md-12" style="height:20px;"></div>
									   </form>
								   </div>	
							</div>
				     	 	 <div class="col-md-9">
								<div class="col-md-12" id="test">

								</div>
				     	 	 	<div class="col-md-12">
					     	 	 		<h5 style="color:#004040;"><i class="fa fa-upload"></i> Uploaded Items</h5>
					     	 	 	</div>
					     	 	 	<div class="col-md-12" style="max-height:300px;overflow:auto;">
						     	 	 	<div class="col-md-12" id="container-resources">
						     	 	 	</div>
									</div>
					     	 	 	<div class="col-md-12">
					     	 	 			<h5 style="color:#004040;"><i class="fa fa-calendar"></i> Uploaded History</h5>
					     	 	 	</div>
					     	 	 	<div class="col-md-12" style="" style="padding:0px;">
		     	 	 					<table id="tbl-e-resources" class="table table-bordered">
		     	 	 						<thead>
												   <th class="col-md-4">E-Resource</th>
												   <th class="col-md-6">Descriptions</th>
												   <th class="col-md-2">Type</th>
		     	 	 						</thead>	
		     	 	 						<tbody id="table-resources__">
											</tbody>
		     	 	 					</table>
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
@section('custom_scripts')
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/fnAddTr.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('public/_color/plugins/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>

<script type="text/javascript">
	var tbl;
	var DtCounter = 0;
	$(document).ready(function(e){
		__initResources();
		$(document).on('change','#upload-files',function(e){
			e.preventDefault();
			var fileExtension = ['doc', 'docx', 'odt', 'pdf', 'xls', 'xlsx','ppt','pptx','txt',];
			if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
				alert("Only formats are allowed : "+fileExtension.join(', '));
				$(this).val('');
			}
		});
		$(document).on('click','.download-link',function(e){
			e.preventDefault();
			var id = $(this).attr('resource-id');
			var url = 'downloadFile';
			var data = {_token:"{{csrf_token()}}",res_id:id}
			// window.location = url,data;
			var posting = $.post(url,data);
				posting.done(function(data){
					 // $('#test').html(data);
				});
		});
		$('#sbmit-resource').submit(function(e){
			e.preventDefault();
			$.ajax({
				url: 'saveResources',
				data: new FormData(this),
				cache: false,
				contentType: false,
				processData: false,
				method: 'POST',
				type: 'POST', // For jQuery < 1.9
				success: function(data){
					if(data === '1'){
						
						 $('#sbmit-resource')[0].reset();
						 __initResources();
					}else{
						
					}
				}
			});
		});
	
		function __initResources(){
			var container_l = '';
			var container_tr = '';
			var url = 'fetchResources';
			var data = {_token:"{{csrf_token()}}"}
			var posting = $.post(url,data);
				posting.done(function(data){
					data_s = data;
					$.each(JSON.parse(data),function(i,v){
						fa = '';
						color = '';
						var fileExtension = ['doc', 'docx', 'odt', 'pdf', 'xls', 'xlsx','ppt','pptx','txt',];
						if((v.type === 'doc') || (v.type === 'docx')){
							fa = 'fa-file-word-o';
							color = 'info';
						}else if((v.type === 'xls') || (v.type === 'xlsx')){
							fa = 'fa-file-excel-o';
							color = 'success';
						}else if((v.type === 'pdf')){
							fa = 'fa-file-pdf-o';
							color = 'danger';
						}else if((v.type === 'pptx') || (v.type === 'pptx')){
							fa = 'fa-file-powerpoint-o';
							color = 'warning';
						}else if((v.type === 'txt')){
							fa = 'fa-file';
							color = 'warning';
						}else if((v.type === 'odt')){
							fa = 'fa-file';
							color = 'success';
						}
						container_l += __createContentResource(v.res_id,v.name,v.edition,v.type,v.created_at,fa,color);
						container_tr += __createTR(v.res_id,v.name,v.edition,v.type,v.created_at,fa,color,v.description);
					});
					$('#container-resources').html(container_l);
					
					if( $.fn.dataTable.isDataTable( '#tbl-e-resources' )){
						tbl.destroy();
						__getDataTable();
					}else{
						__getDataTable();
					}
					

				});
		}
		function __getDataTable(){
			var url = 'fetchResources';
			var data = {_token:"{{csrf_token()}}"}
			var posting = $.post(url,data);
				posting.done(function(data){
					tbl = $('#tbl-e-resources').DataTable({
					data:JSON.parse(data),
					deferRender:"true",
					responsive: true,
					columns: [
								{ data: 'name',
										render:function(name){
											return '<h6 class="media-heading text-success"><span style="color:#004040;"><strong>'+name+'</strong> </span></h6>';
										}},
								
								{ data: 'description' },
								{ data: 'type' }
							],
					dom: 'Bfrtip',
					});
				});
			
		}
		function __createContentResource(id,name,edition,type,created_at,fa,color){
			return '<div class="col-md-4 download-link" resource-id="'+id+'" >'+
						'<div class="media media-sm media-item" style="padding:7px;">'+
							'<a class="media-left text-success " href="#">'+
								'<i class="text-'+color+' fa '+fa+' fa-3x"></i>'+
							'</a>'+
							'<div class="media-body">'+
								'<h6 class="media-heading text-success"><span style="color:#004040;"><strong>'+name+'</strong> ('+type+')</span></h6>'+
								'<p class="text-success">'+edition+'</p>'+
							'</div>'+
						'</div>'+
					'</div>';
		}
		function __createTR(id,name,edition,type,created_at,fa,color,description){
			return '<tr>'+
						'<td>'+
							'<div class="col-md-12">'+
								'<div style="float:left">'+
									'<h6 class="media-heading text-success">'+
										'<span style="color:#004040;">'+
											'<span><i class="text-'+color+' fa '+fa+' fa-3x"></i> <strong>'+name+'</strong> ('+type+')</span>'+
											'</span>'+
									'</h6>'+
								'</div>'+
							'</div>'+
						'</td>'+
						'<td>'+
							'<span style="color:#004040;">'+
								description+
							'</span>'+
						'</td>'+
					'</tr>';
		}
		
	});
</script>
@endsection