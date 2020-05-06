@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
<!-- 	<link href="{{asset('public/_color/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/plugins/jquery-tag-it/css/jquery.tagit.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet"/> -->
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
			
			<ul class="nav nav-tabs">
				<li class="active"><a href="#indexing-tab-1" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/indexing/indexing.fw.png')}}" height="25px;" width="25px;"> Indexing and Abstracting</a></li>
			</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="indexing-tab-1">
						
						<div class="row">

							<div class="col-sm-12">
								<div class="alert alert-info fade in">
									<button type="button" class="close" data-dismiss="alert">
										<span aria-hidden="true">×</span>
									</button>
									AutoFill gives an Excel like option to a DataTable to click and drag over multiple cells,
									filling in information over the selected cells and incrementing numbers as needed.
									Try to mouseover and drag over any table column below.
								</div>
							</div>
							<div class="col-sm-12">
								<table id="tbl-catalog-records-index" class="display table-condensed table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr class="bg-green text-white">
											<th>Type</th>
											<th>Title</th>
											<th>Author</th>
											<th>Year</th>
											<th>Edition</th>
										</tr>
									</thead>
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
<script src="{{asset('public/_color/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('public/_color/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js')}}"></script>
<script src="{{asset('public/_color/plugins/jquery-tag-it/js/tag-it.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/select2/dist/js/select2.min.js')}}"></script> -->
<!-- <script src="{{asset('public/_color/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script> -->

<script>
	$(document).ready(function(e){

		var table = $('#tbl-catalog-records-index').DataTable( {
					autoFill: true,
	        ajax: {
	        	url: "{{url('/technical/populate')}}",
	        	type: 'POST',
	        	data: { _token: "{{csrf_token()}}" }
	        },
	        columns: [
	            { "data": "material_name" },
	            { "data": "title" },
	            { "data": "author" },
	            { "data": "year" },
	            { "data": "edition" }
	        ],
	        "pageLength": 10,
	        bLengthChange: false,
	        // paging: false,
	        order: [[1, 'asc']]
	 	});
	
		
	});
</script>
@endsection	