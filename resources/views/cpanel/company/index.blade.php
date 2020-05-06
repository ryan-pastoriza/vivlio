@extends('layouts.app')
@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />
	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		.mytextarea {
		  width: 450px!important;
		  height:50px!important;

		}
	</style>
@endsection
@section('content')
<?php $info = $data['c_data'];?>
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h5 class="text-success"><img src="{{url('public/images/icons/3rdbar/cpanel/company/company.fw.png')}}" height="25px;" width="25px;"> Company Information  </h5>
					<i class="fa fa-edit pull-right"></i>
				</div>
				<div class="panel-body">
					<div class="col-md-6">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead class="hidden">
									<tr>
										<th class="col-md-5">&nbsp;</th>
										<th class="col-md-7">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									  	<td class="text-success">Company Logo</td>
									  	<td>
									  		<div class="col-md-12">
									  			<img id="c_pic" src="{{asset('public/images/ACLC.png')}}">
									  		</div>	
									  		<div class="col-md-12" style="height:10px;"></div>
									  		<div class="form-group hidden">
									  			<input class="form-control" type="file" id="c_photo" onchange="readURL(this);" name="c_photo">
									  		</div>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Company Name</td>
									  	<td>
									  		<span class="form-editable" data-option="company" data-entity="name" data-id="{{$info['company']['c_id']}}">
									  			{{$info['company']['c_name']}}
									  		</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Description</td>
									  	<td>
									  		<span class="form-editable" data-option="company" data-entity="description" data-id="{{$info['company']['c_id']}}">
									  			{{$info['company']['c_desc']}}
									  		</span>
									  	</td>
									<tr>
									  	<td class="text-success">TIN #</td>
									  	<td>
									  		<span  class="form-editable" data-option="company" data-entity="TIN" data-id="{{$info['company']['c_id']}}" >{{$info['company']['c_TIN']}}</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Postal Code </td>
									  	<td>
									  		<span  class="form-editable" data-option="company" data-entity="postal" data-id="{{$info['company']['c_id']}}">{{$info['company']['c_postal']}}</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Contact Number </td>
									  	<td>
									  		<span  class="form-editable" data-option="company" data-entity="contact" data-id="{{$info['company']['c_id']}}" >{{$info['company']['c_contact']}}</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Email </td>
									  	<td>
									  		<span  class="form-editable" data-option="company" data-entity="email" data-id="{{$info['company']['c_id']}}">{{$info['company']['c_email']}}</span>
									  	</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-12">
							<table class="table table-bordered">
								<thead class="hidden">
									<tr>
										<th class="col-md-5">&nbsp;</th>
										<th class="col-md-7">&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									  	<td class="text-success">Product Logo</td>
									  	<td>
										  	<div class="col-md-12">
									  			<img src="{{asset('public/images/logo.fw.png')}}">
									  		</div>	
									  		<div class="col-md-12" style="height:10px;"></div>
									  		<div class="form-group hidden">
									  			<input type="file" name="">
									  		</div>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Product Name</td>
									  	<td>
									  		<span class="form-editable" data-option="product" data-entity="name" data-id="{{$info['product']['p_id']}}">
									  			{{$info['product']['p_name']}}
									  		</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Description</td>
									  	<td>
									  		<span class="form-editable" data-option="product" data-entity="description" data-id="{{$info['product']['p_id']}}">
									  			{{$info['product']['p_description']}}
									  		</span>
									  	</td>
									</tr>
									<tr>
									  	<td class="text-success">Creator</td>
									  	<td>
									  		<span class="form-editable" data-option="product" data-entity="creator" data-id="{{$info['product']['p_id']}}">
									  			{{$info['product']['p_creator']}}
									  		</span>
									  	</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_scripts')
<script src="{{asset('public/_color/plugins/bootstrap3-editable/js/bootstrap-editable.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(e){
		$('.form-editable').editable({
	        url: 'company/edit',
	        pk: 1,
	        inputclass: 'mytextarea',
	        params: function(params) {
        	params._token  = "{{csrf_token()}}";
	        	params._option = $(this).attr('data-option');
	        	params._entity = $(this).attr('data-entity');
	        	params._id = $(this).attr('data-id');
	        	return params;
	        },
	         success: function(response, newValue) {
		        if(response === '1'){
		        	/*console.log("Done");*/
		        }
		    }
	    });
	   
	});
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#c_pic')
                    .attr('src', e.target.result)
                    .width(350)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection