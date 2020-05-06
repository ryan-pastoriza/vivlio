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
<?php static $counter = 1;?>
<div id="content" style="margin-left: 91px!important;">
	<div class="col-md-12" style="height: 20px;"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#loans" data-toggle="tab">Loans</a></li>
				<li><a href="#patrons" data-toggle="tab">Patrons</a></li>
				<li><a href="#returns" data-toggle="tab">Returns</a></li>
			</ul>
		</div>
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane fade active in" id="loans">@include('cpanel.circulation.loans.index')</div>

				<div class="tab-pane" id="patrons">@include('cpanel.circulation.patrons.index')</div>

				<div class="tab-pane" id="returns">
					<h5>Returns</h5>
				</div>


			</div>
		</div>
	</div>
</div>


<!-- ===================================== MODALS ===================================== -->

<div class="modal" id="modal-add-patron-category-type">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Patron Category Type</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					
					<div class="col-sm-12">
						<form id="frm-add-patron-category-type">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="category" value="patron_category_type">
								<div class="col-sm-3" style="padding: 10px; background-color: #f1f1f1; border: 1px solid #CCC;">
									
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control input-sm" name="category_name" required="" />
                                    </div>

                                    <div class="form-group">
	                                    <label for="">Description</label>
	                                    <textarea class="form-control" style="resize: none;" rows="4" name="description"></textarea>
	                                </div>

                               		<div class="form-group text-right">
										<button class="btn btn-xs btn-primary m-r-5 m-b-5">Save</button>
									</div>
								
								</div>
								<div class="col-sm-9">
									
									<div class="alert alert-info fade in">
			                            <button type="button" class="close" data-dismiss="alert">
			                                <span aria-hidden="true">×</span>
			                            </button>
			                            AutoFill gives an Excel like option to a DataTable to click and drag over multiple cells,
			                            filling in information over the selected cells and incrementing numbers as needed.
			                            Try to mouseover and drag over any table column below.
			                        </div>
                        
									<table id="tbl-patron-category-type" class="table table-condensed table-bordered">
										<thead>
											<tr>
												<th>Category Name</th>
												<th>Description</th>
												<th>Actions</th>
											</tr>
										</thead>
									</table>
								</div>

                            </form>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

@endsection

@section('custom_js')
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>

	
	<script type="text/javascript">

	$(document).ready(function(){

		/* --------------------------------------------------------------------------------------- */
		// loans

		getMaterialType($('#select-material-type'));

		$(document).on('submit', '#frm-add-loan-rules', function(e){
			e.preventDefault();

			var form = $(this);
			// console.log(form.serialize());
			$.ajax({
				url		: "{{url('/loan_rules/store')}}", 
				type 	: 'POST',
				data 	: form.serialize(),
				error	: function(error){
					$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
							text:"Failed to load resource",
							sticky:false,
							time:""
					});	
					return false;
				},
				success : function(data){
					console.log(data);
					if( data > 0 ){
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> New Patron Category added!",
							text:"",
							sticky:false,
							time:""
						});
					}
					form[0].reset();		
				},
			});

			return false;
		});

		$(document).on('click', '#btn-loan-rules-clear', function(e){
			e.preventDefault();

			$('#frm-add-loan-rules')[0].reset();
		});

		getPatronCategory($('#select-loans-patron-category-type'));
		
		var loanRulesTable = $('#tbl-loan-rules').DataTable();

		/* --------------------------------------------------------------------------------------- */
		// Patrons
		
		var categoryTable = $('#tbl-patron-category-type').DataTable( {

	        ajax: {
	        	url: "{{url('/category/populate')}}",
	        	type: 'POST',
	        	data: { _token: "{{csrf_token()}}", category: "patron_category_type" }
	        },
	        columns: [
	            { "data": "category_name" },
	            { "data": "description" },
	            { "data": "action", 
	        	render: function ( data, type, row ) {

	        		$('[data-toggle="tooltip"]').tooltip();

			        return '<a id="' + row.id + '" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> ' +
						   '<a id="' + row.id + '" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-remove"></i></a> ';
			    } } 
	        ],
	        "pageLength": 10,
	        bLengthChange: false,
	        // paging: false,
	        order: [[1, 'asc']]
	 	});

		var patronCategoryTable = $('#tbl-patron-category').DataTable({

			ajax: {
	        	url: "{{url('/category/populate')}}",
	        	type: 'POST',
	        	data: { _token: "{{csrf_token()}}", category: "patron_category" }
	        },
	        columns: [
	            { "data": "category_name" },
	            { "data": "description" },
	            { "data": "enrolment_period" },
	            { "data": "enrolment_period_date" },
	            { "data": "action", 
	        	render: function ( data, type, row ) {

	        		$('[data-toggle="tooltip"]').tooltip();

			        return '<a id="' + row.id + '" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> ' +
						   '<a id="' + row.id + '" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-remove"></i></a> ';
			    } } 
	        ],
	        "pageLength": 10,
	        bLengthChange: false,
	        // paging: false,
	        order: [[1, 'asc']]
		});

		$(document).on('submit', '#frm-add-patron-category-type', function(e){
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url		: "{{url('/category/store')}}", 
				type 	: 'POST',
				data 	: form.serialize(),
				error	: function(error){
					$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
							text:"Failed to load resource",
							sticky:false,
							time:""
					});	
					return false;
				},
				success : function(data){
					
					if( data > 0 ){
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> New Patron Category Type added!",
							text:"",
							sticky:false,
							time:""
						});

						categoryTable.ajax.reload();
						getPatronCategoryType($('#select-patron-category-type'));
					}
					form[0].reset();		
				},
			});

			return false;
		});

		$(document).on('submit', '#frm-add-patron-category', function(e){
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url		: "{{url('/category/store')}}", 
				type 	: 'POST',
				data 	: form.serialize(),
				error	: function(error){
					console.log(error);
					$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
							text:"Failed to load resource",
							sticky:false,
							time:""
					});	

					return false;
				},
				success : function(data){
					
					if( data > 0 ){
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> New Patron Category added!",
							text:"",
							sticky:false,
							time:""
						});
						patronCategoryTable.ajax.reload();
					}
					form[0].reset();		
				},
			});

			return false;
		});

		getPatronCategoryType($('#select-patron-category-type'));
		
		$(document).on('change', '#select-enrollment-period', function(){

			var option = $('#select-enrollment-period option:selected').val();

			if( option == 'm' ){
				$('#until-date').addClass('hidden');
				$('#in-months').removeClass('hidden');
			}else{
				$('#until-date').removeClass('hidden');
				$('#in-months').addClass('hidden');
			}
		});

		$('#select-enrollment-period').trigger('change');

		$(document).on('click', '#btn-clear-add-patron-category', function(e){
			e.preventDefault();

			var form = $('#frm-add-patron-category');

			form[0].reset();
		})
		// getPatronCategory();
	});

	// function getPatronCategory(){

	// 	$.ajax({
	// 		url		: "{{url('/category/populate')}}", 
	// 		type 	: 'POST',
	// 		data: { _token: "{{csrf_token()}}", category: "patron_category" },
	// 		success : function(data){
				
	// 			console.log(data);

	// 		},
	// 	});

 
	// }
	 
	
	function getMaterialType(obj){

		obj.find('option').remove().end();

		$.ajax({
			url		: "{{url('/technical/fetch')}}", 
			type 	: 'POST',
			data: { _token: "{{csrf_token()}}"},
			success : function(data){
				
				for ( var key in data ){

					if(data.hasOwnProperty(key)){

						obj.append($('<option>', { 
					        value: data[key].material_type_id,
					        text : data[key].name 
				    	}));
					}

				}
			},
		});

	}
		
	function getPatronCategory(obj){

		obj.find('option').remove().end();

		$.ajax({
			url		: "{{url('/category/populate')}}", 
			type 	: 'POST',
			data: { _token: "{{csrf_token()}}", category: "patron_category" },
			success : function(result){
				for (var key in result['data']) {
				   if (result['data'].hasOwnProperty(key)) {
				   	  obj.append($('<option>', { 
				        value: result['data'][key].patron_category_id,
				        text : result['data'][key].category_name 
				    	}));

				   }
				}

			},
		});

	}

	function getPatronCategoryType(obj){

		obj.find('option').remove().end();

		$.ajax({
			url		: "{{url('/category/populate')}}", 
			type 	: 'POST',
			data: { _token: "{{csrf_token()}}", category: "patron_category_type" },
			success : function(result){
				for (var key in result['data']) {
				   if (result['data'].hasOwnProperty(key)) {
				   	  obj.append($('<option>', { 
				        value: result['data'][key].category_type_id,
				        text : result['data'][key].category_name 
				    	}));

				   }
				}

			},
		});

		
	}

	</script>




@endsection

