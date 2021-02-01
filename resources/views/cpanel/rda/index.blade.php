@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/css/fonts-custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/parsley/src/parsley.css')}}" rel="stylesheet" />
	<!-- <link href="{{asset('public/_color/plugins/DataTables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet"/> -->
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>


	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		.accordion-toggle-styled, .panel-title>span{
			background: #fff;
			color: #004040;
		}
		.panel-danger>.panel-heading, .panel-info>.panel-heading, .panel-inverse>.panel-heading, .panel-primary>.panel-heading, .panel-success>.panel-heading, .panel-warning>.panel-heading,.todolist-title{
			color: #004040;
			font-weight: bold;
		}

		.gritter-item {
			font-family: verdana!important;
		}
		
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab"><i class="fa fa-tty fa-1x"></i>  Create RDA </a></li>
				<li><a href="#nav-pills-tab-2" data-toggle="tab"><i class="fa fa-newspaper-o fa-1x"></i> Create Template </a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				     @include('cpanel.rda.rda.index')
				</div>
				<div class="tab-pane fade " id="nav-pills-tab-2">
				     @include('cpanel.rda.template.index')
				</div>
			</div>
		</div>
	</div>
</div>

<!--  ////////////////////////// modals //////////////////////////////////  -->

<div class="modal" id="tag-modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Modal Without Animation</h4>
			</div>
			<div class="modal-body">
				<form id="frm-rda-tags-update">
                    <fieldset>
                        <div class="col-sm-12">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <input type = "hidden" name = "_type" value = "marc_tag_structure">
                            <input type = "hidden" name="id" id="input-rda-tag-id">
                            <h4 class="m-t-10">Create RDA Tags</h4>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Tag</label>
                                <input autocomplete="false" type="text" name="tagfield" id="tagfield" class="form-control" required="">
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Tag Name</label>
                                <input autocomplete="false" type="text" name="tagname" id="tagname" class="form-control" required="" >
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Repeatable</label>
                                <select class="form-control" name="repeatable" id="repeatable" required="">
                                    <option value="r" selected="">Repeatable</option>
                                    <option value="nr">Non Repeatable</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>

                     	<div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Record Type</label>
                                <select class="form-control" name="record_type" id="record_type" required="">
                                    <option value="bibliographic" selected="">Bibliographic</option>
                                    <option value="authority">Authority</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 text-right">
                            <div class="form-group">
                                <!-- <label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</label> -->
                                <button type="submit"  class="btn btn-xs btn-success" style="margin-top:23px;"> Save Changes </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="subfield-modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Add Subfield</h4>
			</div>
			<div class="modal-body">
				<form id="frm-rda-subfield-add">
                    <fieldset>
                        <div class="col-sm-12">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <input type = "hidden" name = "_type" value = "marc_subfield_structure">
                            <input type = "hidden" name="id" id="input-rda-tag-id">
                            <h4 class="m-t-10">Add Subfield</h4>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Subfield Code</label>
                                <input autocomplete="false" type="text" name="tagsubfield" id="tag" class="form-control" required="">
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Subfield Name</label>
                                <input autocomplete="false" type="text" name="tagsubfieldname" id="tag_name" class="form-control" required="" >
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Repeatable</label>
                                <select class="form-control" name="repeatable" id="tag_repeatable" required="">
                                    <option value="r" selected="">Repeatable</option>
                                    <option value="nr">Non Repeatable</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 text-right">
                            <div class="form-group">
                                <!-- <label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</label> -->
                                <button type="submit"  class="btn btn-xs btn-success" style="margin-top:23px;"> Save </button>
                            </div>
                        </div>
                    
                    </fieldset>
                </form>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="subfield-modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Add Subfield</h4>
			</div>
			<div class="modal-body">
				<form id="frm-rda-subfield-edit">
                    <fieldset>
                        <div class="col-sm-12">
                            <input type = "hidden" name="_token" value = "<?php echo csrf_token(); ?>">
                            <input type = "hidden" name="_type" value = "marc_subfield_structure">
                            <input type = "hidden" name="id" id="edittagsubfieldid">
                            <h4 class="m-t-10">Add Subfield</h4>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Subfield Code</label>
                                <input autocomplete="false" type="text" name="tagsubfield" id="edittagsubfield" class="form-control" required="">
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Subfield Name</label>
                                <input autocomplete="false" type="text" name="tagsubfieldname" id="edittagsubfieldname" class="form-control" required="" >
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Repeatable</label>
                                <select class="form-control" name="repeatable" id="edittagsubfieldrepeatable" required="">
                                    <option value="r" selected="">Repeatable</option>
                                    <option value="nr">Non Repeatable</option>
                                    <option value="none">None</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 text-right">
                            <div class="form-group">
                                <!-- <label>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</label> -->
                                <button type="submit"  class="btn btn-xs btn-success" style="margin-top:23px;"> Save </button>
                            </div>
                        </div>
                    
                    </fieldset>
                </form>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="template-modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>



@include('cpanel.rda.layout.subtags')
@endsection

@section('custom_js')
	
<script src="{{asset('public/_color/plugins/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>
<script src="{{asset('public/_color/plugins/parsley/dist/parsley.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/gritter/js/jquery.gritter.js')}}"></script>
	
<script type="text/template" class="display" id="child_table">
    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th style="width: 50px;">Code</th>
                <th>Subfield Description</th>
                <th>Repeatable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jen</td>
                <td>100</td>
                <td>Left</td>
                <td></td>
            </tr>
            <tr>
                <td>Sal</td>
                <td>88</td>
                <td>Right</td>
                <td></td>
            </tr>
        </tbody>
    </table>    
</script>
	
<!-- rda tags js goes here -->
<script type="text/javascript">

	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();

		var currentRow;

		var table = $('#tbl-rda-tags').DataTable( {
	        ajax: {
	        	url: "{{url('/rda/fetch/marc')}}",
	        	type: 'POST',
	        	data: { _token: "{{csrf_token()}}" }
	        },
	        columns: [
	            {
	                "className":      'details-control',
	                "orderable":      false,
	                "data":           null,
	                "defaultContent": ''
	            },
	            { "data": "tagfield" },
	            { "data": "tagname" },
	            { "data": "repeatable" },
	            { "data": "record_type" },
	            { "data": "action", 
	            	render: function ( data, type, row ) {

	            		$('[data-toggle="tooltip"]').tooltip();

				        return '<a id="' + row.id + '" class="btn btn-xs btn-success disabled cls-modal-add-subfield" data-toggle="tooltip" data-placement="top" title="Add Subfield"><i class="fa fa-plus"></i></a> ' +
				        	   '<a id="' + row.id + '" class="btn btn-xs btn-primary cls-modal-edit" data-toggle="tooltip" data-placement="top" title="Edit Tag"><i class="fa fa-pencil"></i></a> ' +
        					   '<a id="' + row.id + '" class="btn btn-xs btn-danger cls-tag-remove" data-toggle="tooltip" data-placement="top" title="Remove Tag"><i class="fa fa-remove"></i></a> ';
				    } } 
	        ],
	        bLengthChange: false,
	        paging: false,
	        order: [[1, 'asc']]
	    });
		 // Add event listener for opening and closing details
	    $('#tbl-rda-tags tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row( tr );
	 		currentRow = row;
	        if ( row.child.isShown() ) { 
	        	tr.find('.cls-modal-add-subfield').addClass('disabled');
	            // This row is already open - close it
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	        	tr.find('.cls-modal-add-subfield').removeClass('disabled');
	            // Open this row
	            row.child( format(row.data()) ).show();
	            tr.addClass('shown');
	        }
	    });
		// edit tags
		$(document).on('click', '.cls-modal-edit', function(e){
			e.preventDefault();

			var id = this.id;
			var rowData;

			table.rows(function(idx, data, node){
				if( data.id == id ){
					rowData = data;
					return;
				}
			});
			
			$(document).on('show.bs.modal', '#tag-modal-edit', function (event) {

			  	var modal = $(this);
			  	modal.find('.modal-title').html(' <i class="fa fa-pencil"></i> [Edit] ' + rowData.tagfield + ' ' + rowData.tagname);
			  	modal.find('#input-rda-tag-id').val(id);
			  	modal.find('#tagfield').val(rowData.tagfield);
				modal.find('#tagname').val(rowData.tagname);
				modal.find('#repeatable').val(rowData.repeatable.toLowerCase());
				modal.find('#record_type').val(rowData.record_type.toLowerCase());
			});
			
			$('#tag-modal-edit').modal('show');
		});
		// remove tags
		$(document).on('click', '.cls-tag-remove', function(e){
			e.preventDefault();
			
			var id = this.id;
			var url = "{{url('/rda/remove')}}";
			var data = { id: id, type: 'main_tag', _token: "{{csrf_token()}}" };
			
			var posting = $.post(url, data);
				posting.done(function(data){
					console.log(data);
					if( typeof data == 'string' && data == 'true'){

						$.gritter.add({
							title:"<i class='fa fa-remove text-danger'></i> Tag Removed!",
							text:"",
							sticky:false,
							time:""
						});

						table.ajax.reload();
						return false;
					}

					$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Unable to remove tag!",
							text: data,
							sticky:false,
							time:""
						});
					
					
				});
		});
		// remove Subfield
		$(document).on('click', '.subfield-modal-remove', function(e){
			e.preventDefault();
			
			var id = this.id;
			var url = "{{url('/rda/remove')}}";
			var data = { id: id, type: 'sub_field', _token: "{{csrf_token()}}" };
			
			var posting = $.post(url, data);
				posting.done(function(data){
					console.log(data);
					if( typeof data == 'string' && data == 'true'){

						$.gritter.add({
							title:"<i class='fa fa-remove text-danger'></i> Tag Removed!",
							text:"",
							sticky:false,
							time:""
						});

						table.ajax.reload();
						return false;
					}

					$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Unable to remove tag!",
							text: data,
							sticky:false,
							time:""
						});
					
					
				});
		});
		// update tags
	    $(document).on('submit', '#frm-rda-tags-update', function(e){
	    	e.preventDefault();

	    	var form = $(this);

	    	$.ajax({
	    		url 	: "{{url('/rda/update')}}",
	    		type 	: 'POST',
	    		data 	: form.serialize(),
	    		success : function(data){

	    			$('#tag-modal-edit').modal('hide')
	    			// add notification
					$.gritter.add({
						title:"<i class='fa fa-check text-success'></i> Tag Updated!",
						text:"",
						sticky:false,
						time:""
					});
					// reload table
	    			table.ajax.reload();
	    		},
	    	});
	    });
	    // add tag - submit
		$(document).on('submit', '#frm-rda-tags', function(e){
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url		: "{{url('/rda/store')}}", 
				type 	: 'POST',
				data 	: form.serialize(),
				success : function(data){
				
					if(typeof data == 'string' && data == 'unique'){
						$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Warning!",
							text:"SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '100' for key 'tagfield' (SQL: insert into `marc_tag_structure` (`tagfield`, `tagname`, `repeatable`, `updated_at`, `created_at`) values (100, gdfg, R, 2017-05-30 03:29:00, 2017-05-30 03:29:00)). ",
							sticky:false,
							time:""
						});

						return false;
					}
					
					// reset form - clear field values
					form[0].reset();
					// add notification
					$.gritter.add({
						title:"<i class='fa fa-check text-success'></i> New Tag created!",
						text:"",
						sticky:false,
						time:""
					});
					// reload table
	    			table.ajax.reload();
				},
			});

			return false;
		});
		// clear fields in tag - form
		$(document).on('click', '#btn-tags-clear, #btn-template-clear', function(e){
			e.preventDefault();

			var form_id = $(this).closest('form').prop('id');
			var form = $('#' + form_id);
			form[0].reset();
		});
		/*  subfields  */
		//call subfield modal - add
		$(document).on('click', '.cls-modal-add-subfield', function(e){
			e.preventDefault();

			var id = this.id;
			var parentRowData;
			var form = $('#frm-rda-subfield-add');
			var modal = $('#subfield-modal-add');

			form[0].reset();

			table.rows(function(idx, data, node){
				if( data.id == id ){
					parentRowData = data;
					return;
				}
			});

			modal.find('.modal-title').html( parentRowData.tagfield + ' ' + parentRowData.tagname + '<br /><small>[ Add Subfield ]</small>' );
			modal.find('#input-rda-tag-id').val( id );
			
			modal.modal('show');
		});
		// submit form
		$(document).on('submit', '#frm-rda-subfield-add', function(e){
			e.preventDefault();

			var form = $(this);
			var modal = $('#subfield-modal-add');

			$.ajax({
				url		: "{{url('/rda/store')}}",
				type 	: 'POST',
				data 	: form.serialize(),
				success : function(data){

					if(typeof data == 'string' && data == 'unique'){
						$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Warning!",
							text:"SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '100' for key 'tagfield' (SQL: insert into `marc_tag_structure` (`tagfield`, `tagname`, `repeatable`, `updated_at`, `created_at`) values (100, gdfg, R, 2017-05-30 03:29:00, 2017-05-30 03:29:00)). ",
							sticky:false,
							time:""
						});

						return false;
					}		
					// reset form - clear field values
					form[0].reset();
					// add notification
					$.gritter.add({
						title:"<i class='fa fa-check text-success'></i> Subfield Added!",
						text:"",
						sticky:false,
						time:""
					});
					
					currentRow.child( format(currentRow.data()) ).show();
					modal.modal('hide');
				},
			});

			return false;		
		});


		$(document).on('click', '.subfield-modal-edit', function(e){
			e.preventDefault();

			var id = this.id;
			var rowData = $(this).closest('tr')[0].cells;
			// childTable.rows(function(idx, data, node){
			// 	// console.log(data)
			// 	// console.log(idx)
			// 	// console.log(node)
			// 	if( data.id == id ){
			// 		rowData = data;
			// 		return;
			// 	}
			// });
			
			console.log(rowData[0].innerHTML);
			$(document).on('show.bs.modal', '#subfield-modal-edit', function (event) {

			  	var modal = $(this);
			  	modal.find('.modal-title').html(' <i class="fa fa-pencil"></i> [Edit] ' + rowData[0].innerHTML + ' : ' + rowData[1].innerHTML);
			  	modal.find('#edittagsubfieldid').val(id);
			  	modal.find('#edittagsubfield').val(rowData[0].innerHTML);
				modal.find('#edittagsubfieldname').val(rowData[1].innerHTML);
				modal.find('#edittagsubfieldrepeatable').val(rowData[2].innerHTML.toLowerCase());
			});
			
			$('#subfield-modal-edit').modal('show');
			
		});

	    $(document).on('submit', '#frm-rda-subfield-edit', function(e){
	    	e.preventDefault();

	    	var form = $(this);

	    	$.ajax({
	    		url 	: "{{url('/rda/update')}}",
	    		type 	: 'POST',
	    		data 	: form.serialize(),
	    		success : function(data){

	    			$('#tag-modal-edit').modal('hide')
	    			// add notification
					$.gritter.add({
						title:"<i class='fa fa-check text-success'></i> Tag Updated!",
						text:"",
						sticky:false,
						time:""
					});
					// reload table
	    			table.ajax.reload();
	    		},
	    	});
	    });

	});

    /* Formatting function for row details - modify as you need */
    function format ( d ) {
    	
    	var $table = $($('#child_table').html());
        $table.css('width','100%');

        var childTable = $table.DataTable({ 
        	ajax: {
	        	url: "{{url('/rda/fetch/marc_subfield')}}",
	        	type: 'POST',
	        	data: { _token: "{{csrf_token()}}", id: d.id }
	        },
            columns:[
                { "data": "tagsubfield" },
	            { "data": "tagsubfieldname" },
	            { "data": "repeatable" },
	            { "data": "action", 
	            	render: function ( data, type, row ) {
				        return '<a id="' + row.sub_id + '" class="btn btn-xs btn-default subfield-modal-edit"><i class="fa fa-pencil"></i></a> ' +
        						' <a id="' + row.sub_id + '" class="btn btn-xs btn-default subfield-modal-remove"><i class="fa fa-remove"></i></a>';
				    } } 
            ],
            bLengthChange: false,
            searching: false,
            paging: false,
            order:[],
        });

		return childTable.table().container();
    }

</script>

<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<!-- rda template js goes here -->
<script type="text/javascript">

	$(document).ready(function(){

		$(document).on('submit', '#frm-cat-template', function(e){
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url		: "{{url('/rda/store')}}", 
				type 	: 'POST',
				data 	: form.serialize(),
				success : function(data){
					
					if(typeof data == 'string' && data == 'unique'){
						$.gritter.add({
							title:"<i class='fa fa-warning text-danger'></i> Warning!",
							text:"SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry",
							sticky:false,
							time:""
						});

						return false;
					}
					// reset form - clear field values
					form[0].reset();
					// add notification
					$.gritter.add({
						title:"<i class='fa fa-check text-success'></i> New Template created!",
						text:"",
						sticky:false,
						time:""
					});

					populate_template($('#select-template-list'));
				},
			});

			return false;
		});

		$(document).on('change', '#select-template-list', function(){

			var value = $(this).val();
			$('#template_id-checkbox').val(value);
			// fetch all tags associated to this template - value: template_id
			$.ajax({
				url		: "{{url('/template/fetch_tags')}}", 
				type 	: 'POST',
				data 	:  { _token: "{{csrf_token()}}", template_id: value },
				success : function(data){
					// console.log(data);
					toggle_tags_template(data);
				},
			});
			// check all checkboxes which has the same tag id's
			if( this.value == 8 ){
				$('#btn-update-template-tags, #btn-remove-template-tags, #btn-change-template-name').addClass('disabled');
			}else{
				$('#btn-update-template-tags, #btn-remove-template-tags, #btn-change-template-name').removeClass('disabled');
			}
		});

		$(document).on('click', '#btn-update-template-tags', function(e){
			e.preventDefault();

			var form = $('#frm-checkbox-tags');

			$.ajax({
				url		: "{{url('/template/add_to_template')}}", 
				type 	: 'POST',
				data 	:  form.serialize(),
				success : function(data){
					if( typeof data == 'string' && data == 'true' ) {
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> Template has been Updated!",
							text:"",
							sticky:false,
							time:""
						});
					}
					
				},
			});
		});

		$(document).on('click', '#btn-remove-template-tags', function(e){
			e.preventDefault();
			var value = $('#select-template-list').val();

			$.ajax({
				url		: "{{url('/template/remove_template')}}", 
				type 	: 'POST',
				data 	:  { _token: "{{csrf_token()}}", template_id: value },
				success : function(data){
					if( data == 1 ) {
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> Template has been Removed!",
							text:"",
							sticky:false,
							time:""
						});
					}else{
						$.gritter.add({
							title:"<i class='fa fa-check text-success'></i> Failed to remove template!",
							text:"",
							sticky:false,
							time:""
						});
					}

					populate_template($('#select-template-list'));	
					
				},
			});
			//get id from select.
		});

		$(document).on('click', '#btn-change-template-name', function(e){
			e.preventDefault();
			// modal.. .to change template name
		});

		populate_template($('#select-template-list'));	
		// toggle_tags_template($('#select-template-list option:selected').val());
		toggle_tags_template("");
	});

	function populate_template( select ) {

		select.empty();

		$.ajax({
			type: 'POST',
			url: "{{url('/template/populate')}}",
			data: {  _token: "{{csrf_token()}}" },
			success: function(data){

				var options = '';

				for (var key in data) {
				  if (data.hasOwnProperty(key)) {
				  	options += '<option value="' + data[key].template_id + '">' + data[key].template_name.toUpperCase() + 
				  	' - ' + data[key].description.toUpperCase() + '</option>';
				  }
				}
				select.html(options);
				select.trigger('change');
			},
		});
	}

	function toggle_tags_template( data ) {

		if( data.length > 0 ){
			
			$('.template-with-tags').each(function(idx, v){

				var tag_id = parseInt($(v).prop('id'));

				for(var key in data){
					if(data.hasOwnProperty(key)){

						if( tag_id == data[key].id ){
							$(v).prop('checked', true);
							break;
						}

						$(v).prop('checked', false);	
					}
				}
			});

			return true;
		}

		$('.template-with-tags').each(function(idx, v){
			// console.log($(v).prop('id'));
			$(v).prop('checked', false);
		});

		return false;
	}

</script>
@endsection
<!-- // <button class="btn btn-xs btn-primary"> Add Subfield </button> -->