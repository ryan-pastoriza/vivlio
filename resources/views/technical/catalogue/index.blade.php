@extends('layouts.app')


@section('custom_css')
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
		td.details-control {
			background: url("{{asset('public/_color/plugins/DataTables/media/images/details_open.png')}}") no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url("{{asset('public/_color/plugins/DataTables/media/images/details_close.png')}}") no-repeat center center;
		}
		.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
			background: #004040!important;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover,.dataTables_wrapper .dataTables_paginate .paginate_button:active,
		.dataTables_wrapper .dataTables_paginate .paginate_button:focus, .dataTables_wrapper .dataTables_paginate .paginate_button:visited{
			background: none;
			border:1px solid #fff;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button{ padding:0em 0em; }
		.pagination>li>a{ margin-left: 0; }
		
		#tbl-catalog-records, #tbl-show-marc-template tr{
			cursor: pointer;
		}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-pills">
				<li class="active">
					<a id="technical-nav-1" href="#nav-pills-tab-1" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/catalogue/search_catalogue.fw.png')}}" height="20px;" width="20px;"> Search Catalogue</a>
				</li>
				<li>
					<a id="technical-nav-2" href="#nav-pills-tab-2" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/catalogue/quick_editor.fw.png')}}" height="20px;" width="20px;"> Quick Editor</a>
				</li>
				<li>
					<a id="technical-nav-3" href="#nav-pills-tab-3" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/catalogue/add_copy.fw.png')}}" height="20px;" width="20px;"> Accession Book </a>
				</li>
				<li>
					<a id="technical-nav-4" href="#nav-pills-tab-4" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/catalogue/full_marc.fw.png')}}" height="20px;" width="20px;">  Full Marc Record</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
					<div class="col-sm-12">
						<h3 class="m-t-10"> Search Catalogue </h3>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<form class="form-horizontal">
								<div class="col-sm-2">
									<div class="form-group">
										<select class="form-control input-sm" id="cat_search_by_filter">
											<option> Accession Number </option>
											<option disabled> Keyword </option>
											<option disabled> Title </option>
											<option disabled> Author </option>
										</select>
									</div>
								</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-5">
									<div class="form-group">
										<input type="text" class="form-control input-sm" id="search_key">
									</div>
								</div>
								<!-- <div class="col-sm-3">
									<div class="form-group">
										<select class="form-control input-sm">
											<option> All Collections </option>
										</select>
									</div>
								</div> -->

								<div class="col-sm-4">
									<button type="submit" class="btn btn-sm btn-success" id='catalogue_search_by'>Search</button>
								</div>

							</form>
						</div>
					</div><div class="col-sm-12">
						<h3 class="m-t-10"> Search Result </h3>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table class="table table-bordered" id="table_search_result">
								<thead></thead>
								<tbody></tbody>
								<tfoot></tfoot>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
					@include('technical.catalogue.quick_add')
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-3">
					 @include('technical.catalogue.add_copy')
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-4">
					 @include('technical.catalogue.marc_record')
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modals -->
<div class="modal" id="view-catalog-record-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">View</h4>
			</div>

			<div class="modal-body"></div>

			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>

		</div>
	</div>
</div>
<div class="modal" id="technical-add-copy-modal">
	<div class="modal-dialog modal-lg">
		<form class="form-horizontal" id="frm-add-copy">
			<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add Copy [<small>Copy Information</small>] </h4>
				</div>
				<div class="modal-body">
					
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<input type="hidden" name="catalogue_id" id="catalogue_id">
							<div class="form-group">
								<label class="col-sm-3 control-label">Accession No.: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control input-sm" placeholder="" name="acc_num" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Barcode: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control input-sm" placeholder="" name="barcode" required="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Call Number: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control input-sm" placeholder="" name="call_num" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Source: </label>
								<div class="col-sm-9">
									<input type="text" class="form-control input-sm" placeholder="" name="source" required="">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Copy Note: </label>
								<div class="col-sm-9">
									<textarea class="form-control input-sm" style="resize: none;" name="note" rows="3"></textarea>
								</div>
							</div>

						</div>
						<div class="col-sm-2"></div>
					</div>

				</div>
				<div class="modal-footer">
					<!-- <a href="javascript:;" >Save</a> -->
					<button class="btn btn-sm btn-success">Save</button>
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection


@section('custom_js')

<script src="{{asset('public/_color/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>
<script src="{{asset('public/js/custom.js')}}"></script>


<script type="text/javascript">
	
$(document).ready(function(){

	srchTable = $('#table_search_result').DataTable( {
			"processing": true,
			"serverSide": true,
			ajax: {
				url: "{{url('/technical/search_catalogue')}}",
				type: 'POST',
				data: {  _token: "{{csrf_token()}}", 'search_key': $('#search_key').val(), 'filter': $('#cat_search_by_filter').val() },
			},
			columns: [
				{ "title": "ISBN/ISSN" },
				{ "title": "Call Number" },
				{ "title": "Author" },
				{ "title": "Title" },
				{ "title": "Edition" },
				{ "title": "Volume" },
				{ "title": "Pages" },
				{ "title": "Price" },
				{ "title": "Copies" },
				{ "title": "Publishing House" },
				{ "title": "Year Published" },
			],
			"pageLength": 10,
			bLengthChange: true,
			paging: false,
			order: [[1, 'asc']]
		   });

	get_material_types();

	/*  -------------------------------- for quick editor page -------------------------------- */
	$(document).on('submit', '#frm-quick-add', function(e){
		e.preventDefault();

		var form = $(this);
		// console.log(form.serialize());

			$.ajax({
				url		: "{{url('/technical/store')}}", 
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
					console.log("Returned Data:");
					console.log(data);
					if( data == 'success' ){

						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> New Record added!",
							text:"",
							sticky:false,
							time:""
						});	
						form[0].reset();
					}	


				},
			});
	});
	$(document).on('click', '#btn-quick-add-clear', function(event){
		event.preventDefault();

	});
	/*  -------------------------------- end quick editor page -------------------------------- */
	/*  -------------------------------- for add copy page  - now accession book page -------------------------------- */
	
	call_accession_book(false);
	toggle_action_buttons();	

	/*  -------------------------------- end add copy page -------------------------------- */
	/*  -------------------------------- for full marc record -------------------------------- */

	// apply template modal
	var tblApplyTemplate = $('#tbl-show-marc-template').DataTable( {
			ajax: {
				url: "{{url('/template/populate')}}",
				type: 'POST',
				data: { _token: "{{csrf_token()}}", 'type' : 'json' }
			},
			columns: [
				{ "data": "template_name" },
				{ "data": "description" },
			],
			"pageLength": 10,
			bLengthChange: true,
			paging: false,
			order: [[1, 'asc']]
		   });

	var template_id;

	$('#tbl-show-marc-template tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			tblApplyTemplate.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');

			var idx = tblApplyTemplate.cell('.selected', 0).index();
			var data = tblApplyTemplate.row( idx.row ).data();

			template_id = data.template_id;
		}
	});


	$(document).on('click', '#btn-select-template-apply', function(e){
		e.preventDefault();

	$('#btn-save-fmr').removeAttr('disabled');
		$('#modal-apply-marc-template').modal('toggle');
		
		 $.ajax({
			url		: "{{url('/template/fetch_tags')}}", 
			type 	: 'POST',
			data 	: { _token : "{{ csrf_token() }}", template_id: template_id, flag: true },
			error	: function(error){
				// $.gritter.add({
				// 		title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
				// 		text:"Failed to load resource",
				// 		sticky:false,
				// 		time:""
				// });	
				// return false;
			},
			success : function(data){
				$('#template-records').html('');
				$('#template-records').html(data);
			},
		});
	});

	var selected_row;
	/*
	  $(document).on('click', '#tbl-full-marc-record tbody tr', function(){

		if ($(this).attr('repeatable')=="r"){
		  $('#btn-field-repeat').removeAttr('disabled');
		}else{
		  $('#btn-field-repeat').attr('disabled','disabled');
		}
		field = $(this).find('td:first-child').text();
		if( field.length < 1 ){
		  if( $(this).hasClass('selected') ){
			$('#btn-field-repeat').attr('disabled','disabled');
			$(this).removeClass('selected');
			$('#btn-fmc-add-value').addClass('disabled');
			$('#input-marc-value').attr("disabled", "disabled"); 
		  }else{
			$('#tbl-full-marc-record tr.selected').removeClass('selected');
			$(this).addClass('selected');
			$('#btn-fmc-add-value').removeClass('disabled');
			$('#input-marc-value').removeAttr("disabled"); 
			selected_row = $(this).find('td:last-child');
			$('#input-marc-value').val(selected_row.text()).focus().select();
		  }
		}else{
		  if( $(this).hasClass('selected') ){
			$('#btn-field-repeat').attr('disabled','disabled');
			$(this).removeClass('selected');
			$('#btn-fmc-add-value').addClass('disabled');
			$('#input-marc-value').attr("disabled", "disabled"); 
			$('#tbl-full-marc-record tr.selected').removeClass('selected');
		  }else{
			$('#input-marc-value').attr("disabled", "disabled"); 
			$('#btn-fmc-add-value').addClass('disabled');
			$('#tbl-full-marc-record tr.selected').removeClass('selected');
			$(this).addClass('selected');
			selected_row = $(this);
		  }
		}

	  });
	*/
	//button click add value 
	$(document).on('click', '#btn-fmc-add-value', function(e){
			e.preventDefault();
	
			var value = $('#input-marc-value').val();

			// $('#input-marc-value').val('');
			selected_row.text(value);
	});
	//button click catalog
	$(document).on('click', '#btn-search-catalog', function(e){
		e.preventDefault();
		var isbn = $('#txt-isbn').val();
		$.ajax({
			type: 'POST',
			url: "{{url('/technical/get_record_by_isbn')}}",
			data: {  _token: "{{csrf_token()}}", 'isbn': isbn },
			success: function( data ){				
				// $('#template-records').html('');
				var pData = JSON.parse(data);
				console.log(pData);
				if(pData.catInfo == null || pData == "Not Found"){
			$.gritter.add({
				  title:"<i class='fa fa-warning text-danger'></i> ISBN Not Found",
				  text:"",
				  sticky:false,
				  time:""
		  }); 
				}else{
					$('#template-records').html(pData.view);
					$('#isEdit').attr('value','True');
					$('#marc-select-material-types').val(pData.catInfo.material_type_id);
					$('#call_num').val(pData.catInfo.call_num);
					$('#price').val(pData.catInfo.price);
		  $('#btn-save-fmr').removeAttr('disabled');
				}
			},
		});
	});
	//Search Catalog Button Click Search
	$(document).on('click','#catalogue_search_by',function(e){
		e.preventDefault();
		// srchTable.ajax.reload();
		srchTable.destroy();
		srchTable = $('#table_search_result').DataTable( {
			"processing": true,
			"serverSide": true,
			ajax: {
				url: "{{url('/technical/search_catalogue')}}",
				type: 'POST',
				data: {  _token: "{{csrf_token()}}", 'search_key': $('#search_key').val(), 'filter': $('#cat_search_by_filter').val() },
			},
			columns: [
				{ "title": "ISBN/ISSN" },
				{ "title": "Call Number" },
				{ "title": "Author" },
				{ "title": "Title" },
				{ "title": "Edition" },
				{ "title": "Volume" },
				{ "title": "Pages" },
				{ "title": "Price" },
				{ "title": "Copies" },
				{ "title": "Publishing House" },
				{ "title": "Year Published" },
			],
			"pageLength": 10,
			bLengthChange: true,
			paging: false,
			order: [[1, 'asc']]
		});

	});
	//button click repeat
	$(document).on('click', '#btn-field-repeat', function(e){
		e.preventDefault();
		console.log(selected_row);
	});
	$(document).on('keyup', '#txt-isbn', function(event){
		event.preventDefault();
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if( keycode == '13' ){
			$('#btn-search-catalog').trigger('click');
			this.value = '';
			return false;
		}
	});
	$(document).keyup(function(){
		var keycode = (event.keyCode ? event.keyCode : event.which);	
		if( keycode == '38' ){
			//up key
			_setPos('up');

		}else if(keycode == '40'){
			//down key
			_setPos('down');
		}
	});
	function _setPos(option){
		var table = $('#tbl-full-marc-record tbody').find('.selected');
		if(table.length > 0){
			// console.log('naa');
			table.removeClass('selected');
			if(option === 'down'){
				table.next().addClass('selected');
				table = table.next();
			}else if(option === 'up'){
				table.prev().addClass('selected');
				table = table.prev();
			}
				selected_row = table.find('td:last-child');
			if (table.attr('repeatable')=="r"){
				$('#btn-field-repeat').removeAttr('disabled');
			}else{
				$('#btn-field-repeat').attr('disabled','disabled');
			}
			field = table.find('td:first-child').text();
			last = table.find('td:last-child').text();
			// console.log(field);
			if( field.length < 1 ){
				$('#btn-fmc-add-value').removeClass('disabled');
				$('#input-marc-value').removeAttr("disabled"); 
				$('#input-marc-value').val(last).focus().select();
				// console.log(last);

			}else{
				$('#btn-fmc-add-value').addClass('disabled');
				$('#input-marc-value').attr("disabled", "disabled"); 

			}

		}
	}
	$(document).on('submit', '#frm-fmc', function(e){
		e.preventDefault();
	});
	$(document).on('keyup', '#input-marc-value', function(e){
		e.preventDefault();
 
		var keycode = (event.keyCode ? event.keyCode : event.which);

		if(keycode == '13'){
			$('#btn-fmc-add-value').trigger('click');
			// this.value = '';
		}
	});
	$(document).on('click','btn-update-fmr',function(e){
		e.preventDefault();
		var form = $('#frm-fmc').serializeArray();
		console.log(form);
	});
	$(document).on('click', '#btn-save-fmr', function(e){
		e.preventDefault();
		if($('#isEdit').attr('value') == "True"){

			var form = $('#frm-fmc').serializeArray();
			// console.log($('#isEdit').attr('value'));
			console.log(form);
			var values = {};
			var counter = 0;
			$('tr.items').each(function(){
				var dataid = $(this).attr('dataID');
				var id = $(this).attr('id');
				var sub_id = $(this).attr('sub_id');
				var tagfield = $(this).attr('tagfield');
				var tagsubfield = $(this).attr('subfield');
				var record = dataid + '_' + id + '_' + tagfield + '_' + sub_id + '_' + tagsubfield + $(this).find('td:last-child input').val();
				values[counter] = {};
				values[counter]['records'] = record;
				counter++;
			});
			
			// console.log(values);

			$.ajax({
				url: "{{url('/technical/update_marc_record')}}",
				type: 'post',
				data:  { _token : "{{ csrf_token() }}", marc_records : JSON.stringify(values), form: form } ,
				success: function( data ){
					// console.log('TEST');
					// console.log(data);
					// console.log('TEST');
					if( data > 0 ){
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> Record Updated!",
							text:"",
							sticky:false,
							time:""
						});	
					}else{
						$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Something went wrong!",
							text:"",
							sticky:false,
							time:""
						});	
					}
					$('#tbl-full-marc-record').empty();
					$('#tbl-full-marc-record').html('<table class="table table-condensed table-bordered">' +
														'<thead>' +
															'<tr>' +
																'<th width="250">Field Name</th>' +
																'<th width="25">I1</th>' +
																'<th width="25">I2</th>' +
																'<th width="250">Subfield</th>' +
																'<th width="450">Data</th>' +
															'</tr>' +
														'</thead>' +
													'</table>');
					$('#call_num').val('');
					$('#price').val('');
					$('#material_type_id').val('1');
				},
				error: function( error ){
					console.log( errorThrown );
				}
			});

		}else{

			var values = {};
			var counter = 0;
			var form = $('#frm-fmc').serializeArray();
			console.log(form);
			$('tr.items').each(function(){
				var dataid = $(this).attr('dataID');
				var id = $(this).attr('id');
				var sub_id = $(this).attr('sub_id');
				var tagfield = $(this).attr('tagfield');
				var tagsubfield = $(this).attr('subfield');
				var record = id + '_' + tagfield + '_' + sub_id + '_' + tagsubfield + $(this).find('td:last-child input').val();
				values[counter] = {};
				values[counter]['records'] = record;
				counter++;
			});

			// console.log(values);
			$.ajax({
				url: "{{url('/technical/add_marc_record')}}",
				type: 'post',
				data:  { _token : "{{ csrf_token() }}", marc_records : JSON.stringify(values), form: form } ,
				success: function( data ){
					console.log(data);
					if( data > 0 ){
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> New Record Created!",
							text:"",
							sticky:false,
							time:""
						});	
					}else{
						$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Something went wrong!",
							text:"",
							sticky:false,
							time:""
						});	
					}
					$('#tbl-full-marc-record').empty();
					$('#tbl-full-marc-record').html('<table class="table table-condensed table-bordered">' +
														'<thead>' +
															'<tr>' +
																'<th width="250">Field Name</th>' +
																'<th width="25">I1</th>' +
																'<th width="25">I2</th>' +
																'<th width="250">Subfield</th>' +
																'<th width="450">Data</th>' +
															'</tr>' +
														'</thead>' +
													'</table>');
					$('#call_num').val('');
					$('#price').val('');
					$('#material_type_id').val('1');
				},
				error: function( error ){
					console.log( errorThrown );
				}
			});
				
		}
	
	});

  $(document).on('click', '#refresh-accession-book', function(e){
	  e.preventDefault();
	  e.stopPropagation();
	  call_accession_book($(this));

  });
  $(document).on('click', '#btn-delete', function(e){
	  e.preventDefault();
	  var id = $(this).attr('catalogue_id');

	  if(confirm("Are you sure you want delete this march record?")){
		  $.ajax({
			  type: 'POST',   
			  url: "{{url('/technical/deleteMarc')}}",
			  data: {  _token: "{{csrf_token()}}", 'catalogue_id': id },
			  success: function(data){
				  console.log(data);
				  call_accession_book($(this));
				  // $('#refresh-accession-book').trigger('click');
			  },
		  });
	  }

  });

	$('#modal-apply-marc-template').on('hidden.bs.modal', function(){
		tblApplyTemplate.ajax.reload();
	});
});

$(document).on('submit','#frm_edit_acc', function(e){
	e.preventDefault();
	// console.log($(this).serialize());
	$.ajax({
	  url   : "{{url('/technical/editQuick')}}", 
	  type  : 'POST',
	  data  : $(this).serialize(),
	  error : function(error){
		$.gritter.add({
			title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
			text:"Failed to load resource",
			sticky:false,
			time:""
		}); 
		return false;
	  },
	  success : function(data){
		console.log("Returned Data:");
		console.log(data);
		if( data == 'success' ){

		  $.gritter.add({
			title:"<i class='fa fa-check text-success'></i> Record edited!",
			text:"",
			sticky:false,
			time:""
		  });
		  $('#refresh-accession-book').trigger('click');
		  $('#holdings-edit-modal-dialog').modal('hide');
		} 

	  },
	});
});
$(document).on('click','#btn-edit-copy', function(e){
	e.preventDefault();
	$id= $(this).attr('toEdit')
	$.ajax({
	  type: 'POST',
	  url: "{{url('/technical/getQuickEditInfo')}}",
	  data: {  _token: "{{csrf_token()}}", 'catID': $id },
	  success: function( data ){
		// $('#template-records').html('');
		// console.log(data);
		// console.log(data.fieldValues);
		// console.log('asdasd');
		$('#editID').val($id);
		$('#editMaterial').val(data.material_type_id);
		$('#editCallNum').val(data.call_num);
		$('#editRemarks').val(data.remarks);
		$('#editPrice').val(data.price);
		data.fieldValues.forEach(function(value, key){
		  // console.log(value);
		  var val = value.value.split('_');
		  var values = {};
		  val.forEach(function(v,k){
			  if(v != ""){
				// console.log(v.charAt(0));
				// console.log(v.slice(1,v.length));
				values[v.charAt(0)] = v.slice(1,v.length);
			  }
		  });
		  // console.log(values);
		  if(value.id == 16){
			$('#editTitle').val(values['a']);
			$('#editRem').val(values['b']);
			$('#editRemPage').val(values['c']);

		  }if(value.id == 15){
			$('#editAuth').val(values['a']);
			$('#editDate').val(values['d']);
			
		  }if(value.id == 17){
			$('#editEdition').val(values['a']);
			
		  }if(value.id == 14){
			$('#editISBN').val(values['a']);
			
		  }if(value.id == 29){
			$('#editVolume').val(values['v']);
			
		  }if(value.id == 18){
			$('#editPlace').val(values['a']);
			$('#editPub').val(values['b']);
			$('#editDatePub').val(values['c']);
			
		  }if(value.id == 19){
			$('#editExtent').val(values['a']);
			$('#editSize').val(values['b']);
			$('#editOther').val(values['c']);
			
		  }
		});
		// var pData = JSON.parse(data);
	  },
	});

});
$(document).on('click','#btn-marc-edit', function(e){
	e.preventDefault();
	$('#txt-isbn').val($(this).attr('isbn'));
	$('#technical-nav-4').trigger('click');
	$('#btn-search-catalog').trigger('click');
	$('#btn-save-fmr').removeAttr('disabled');
});

function call_accession_book(element) {

	$('#accession-book-space').html('Loading...');
	$.ajax({
		type: 'POST',
		url: "{{url('/technical/accession_book')}}",
		data: {  _token: "{{csrf_token()}}" },
		success: function(data){
			$('#accession-book-space').html('');
			$('#accession-book-space').html(data);
			// $('#tbl-accession-book tbody').html(data);
			// alert(data);
			// if(element){
			// 	element.removeClass('disabled');	
			// }
		},
	});
}
function toggle_action_buttons(enable) {

	if( enable ){
		$('p.copy-buttons > a').each(function(idx, obj){
			$(obj).removeClass('disabled');
		});
		return false;
	}
	$('p.copy-buttons > a').each(function(idx, obj){
		$(obj).addClass('disabled');
	});
	return false;
}	
function get_material_types(){
	$.ajax({
		type: 'POST',
		url: "{{url('/technical/fetch')}}",
		data: {  _token: "{{csrf_token()}}" },
		success: function(data){
			// console.log(data);
			var options = '';
			for (var key in data) {
			  if (data.hasOwnProperty(key)) {
				// console.log(data[key].name);
				options += '<option value="' + data[key].material_type_id + '">' + data[key].name.toUpperCase() + '</option>';
			  }
			}
			$('#select-material-type').html(options);
			$('#marc-select-material-types').html(options);
		},
	});
}

function capitalizeFirstLetter(string) {
	return string.charAt(0).toUpperCase() + string.slice(1);
}

</script>

@endsection