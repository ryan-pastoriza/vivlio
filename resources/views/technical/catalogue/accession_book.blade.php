
<style type="text/css">
		
		#tbl-accession-book tr:hover{
				cursor: pointer;
				background-color: #f1f1f1;
		}

		 #tbl-accession-book thead tr:first-child {
				background-color: #fff;
		 }

		table.dataTable tbody>tr.selected, table.dataTable tbody>tr.selected td, table.dataTable tbody>tr>.selected {
				background-color: #f1f1f1!important;
		}

		 tr.tableHeader > td {
				font-weight: bold;
		} 

</style>
	
<h3 class="m-t-10"> Accession Book </h3>
{{-- <p class="help-block">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p> --}}

<div class="row">
		<div class="col-sm-12">
				<a href="#holdings-modal-dialog" data-toggle="modal" class="btn btn-primary btn-sm m-r-5 m-b-5 disabled" id="btn-add-copy"> <i class="fa fa-street-view"></i> View Copies</a>
				<a href="#holdings-edit-modal-dialog" data-toggle="modal" class="btn btn-danger btn-sm m-r-5 m-b-5 disabled" id="btn-edit-copy"> <i class="fa fa-pencil"></i> Edit</a>
				<a class="btn btn-danger btn-sm m-r-5 m-b-5 disabled" id="btn-marc-edit" isbn=""> <i class="fa fa-pencil"></i> Full Marc Edit</a>
				<a href="#modal-confirm-delete" data-toggle="modal" class="btn btn-danger btn-sm m-r-5 m-b-5 disabled" id="btn-delete" catalogue_id=""> <i class="fa fa-trash"></i> Delete</a>
				<button id="refresh-accession-book"><i class="fa fa-refresh"></i> Refresh </button> 
		</div>
</div>
<div class="row">
		<div class="col-sm-12">
				<table id="tbl-accession-book" class="display table-condensed table-bordered" cellspacing="0" width="100%">
						<thead>
								<tr class="tableHeader">
										<!-- <th>Accession Number</th> -->
										<!-- <th>Date Received</th> -->
										<td>ISBN</td>
										<td>Call Number</td>
										<td>Author</td>
										<td>Title</td>
										<td>Edition</td>
										<td>Volume</td>
										<td>Pages</td>
										<td>Price</td>
										<td>Copies</td>
										<td>Publishing House</td>
										<td>Copyright Year</td>  

								 {{--    <td>Call Number<input></td>
										<td>Author<input></td>
										<td>Title<input></td>
										<td>Edition<input></td>
										<td>Volume<input></td>
										<td>Pages<input></td>
										<td>Price<input></td>
										<td>Copies<input></td>
										<td>Publishing House<input></td>
										<td>Copyright Year<input></td>  
										<td>ISBN<input></td> --}}
										<!-- <td>Remarks</td> -->
								</tr>
						</thead>
						<tbody>
<?php

function single_out($field, $index) {
		
	$str = explode('_', $field);
	echo substr($str[$index], 1, strlen($str[$index]));
		
}

foreach ($records as $key => $value): ?>
	<tr id="<?php echo $value['catalogue_id']; ?>">
		<td><?php single_out(isset($value[0][0]->value) ? $value[0][0]->value : '_____', 1); ?></td>  {{-- ISBN --}}
		<td> <?php echo $value['call_num']; ?></td>
		<td><?php single_out(isset($value[0][1]->value) ? $value[0][1]->value : '_____', 1); ?></td> {{-- Author --}}
		<td><?php single_out(isset($value[0][2]->value) ? $value[0][2]->value : '_____', 1); ?></td> {{-- Title --}}
		<td><?php single_out(isset($value[0][3]->value) ? $value[0][3]->value : '_____', 1); ?></td> {{-- Edition --}}
		<td><?php single_out(isset($value[0][6]->value) ? $value[0][6]->value : '_____', 2); ?></td> {{-- Volume --}}
		<td><?php single_out(isset($value[0][5]->value) ? $value[0][5]->value : '_____', 1); ?></td> {{-- Pages --}}
		<td><?php echo $value['price'] ?></td>                                                  {{-- Price --}}
		<td><?php echo $value['copies'] ?></td>                                                 {{-- Copies --}}
		<td><?php single_out(isset($value[0][4]->value) ? $value[0][4]->value : '_____', 2); ?></td> {{-- Publishing House --}}
		<td><?php single_out(isset($value[0][4]->value) ? $value[0][4]->value : '_____', 3); ?></td> {{-- Copyright Year --}}
		<!-- <td>  -->
						<?php 
								// echo substr($value['remarks'], 0, 30).(strlen(substr($value['remarks'], 0, 30)) > 29 ? '.. .' : ''); 
						?> 
				<!-- </td> -->
	</tr>
		
<?php endforeach; ?>

						</tbody>
				</table>
		</div>
</div>
<div class="modal" id="holdings-edit-modal-dialog">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Accession Book <small>(Technical/Catalogue)</small></h4>
						</div>
						<div class="modal-body">
								<div class="row">
										 <div class="col-md-12">
													<div class="col-sm-12" style="padding: 10px; border: 1px solid #CCC; background-color: #f1f1f1;">
														 
															<form id="frm_edit_acc" class="form-horizontal">
																<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
																<input type = "hidden" name="catalogue_id" id="editID">
																	<fieldset>
																
																<div class="col-sm-10">
																	<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
																		<h5 class="m-t-0">Title Statement</h5>

																		<div class="form-group">
																									<label class="col-sm-3 control-label">Title: </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" placeholder="Title Proper" name="val[16][a]" required="" id="editTitle">
																									</div>
																							</div>

																							<div class="form-group">
																									<label class="col-sm-3 control-label">Remainder of Title: </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" name="val[16][b]" placeholder="Subtitles, etc." id="editRem">
																									</div>
																							</div>
																							<div class="form-group">
																									<label class="col-sm-3 control-label">Remainder of Title Page: </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" name="val[16][c]" placeholder="Statement of Responsibility" id="editRemPage">
																									</div>
																							</div>  
																	</div>

																	<div class="col-sm-12" style="margin-top: 10px;"></div>

																	<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
																		<h5 class="m-t-0">Main Entry  
																		<!--  <button class="btn btn-primary btn-xs" id="btn-add-main-entry"><i class="fa fa-plus"></i></button>
																			<button class="btn btn-danger btn-xs" id="btn-remove-main-entry"><i class="fa fa-minus"></i></button> -->
																		</h5>
																			<div id="main-entry-original-copy">
																				<div class="form-group" id="copy-1">
																											<label class="col-sm-3 control-label">Author: </label>
																											<div class="col-sm-4">
																												 <input type="text" class="form-control input-sm" name="val[15][a]" placeholder="Name" id="editAuth">
																											</div>
																											<label class="col-sm-1 control-label">Dates: </label>
																											<div class="col-sm-4">
																														<input type="text" class="form-control input-sm" name="val[15][d]" placeholder="Dates associated with a name" id="editDate">
																											</div>
																									</div>
																								</div>
																	</div>

																	<div class="col-sm-12" style="margin-top: 10px;"></div>
															
																	<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
																		<h5 class="m-t-0">Publication, Distribution, etc. (Imprint) </h5>
																		<div class="form-group">
																									<label class="col-sm-3 control-label">Place: </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm input-sm" name="val[18][a]" placeholder="Place of Publication, distribution, etc." id="editPlace">
																									</div>
																							</div>

																							<div class="form-group">
																									<label class="col-sm-3 control-label">Publisher: </label>
																									<div class="col-sm-9">
																										 <input type="text" class="form-control input-sm input-sm" name="val[18][b]" placeholder="Name of Publisher, distributor, etc." required="" id="editPub">
																									</div>
																							</div>

																							<div class="form-group">
																								<label class="col-sm-3 control-label">Date: </label>
																									<div class="col-sm-9">
																												<input type="text" class="form-control input-sm input-sm" name="val[18][c]" placeholder="Date of Publication, distribution, etc." id="editDatePub">
																									</div>
																							</div>
																	</div>

																	<div class="col-sm-12" style="margin-top: 10px;"></div>
																	
																	<div class="col-sm-12"  style="border-bottom: 1px solid #ccc;">
																		<h5 class="m-t-0">Physical Description</h5>

																		<div class="form-group">
																									<label class="col-sm-3 control-label">Extent: </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" name="val[19][a]" placeholder="Number of pages" id="editExtent">
																									</div>
																							</div>
													
																		<div class="form-group">
																			 <label class="col-sm-3 control-label">Size: </label> 
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" name="val[19][b]" placeholder="Dimensions" id="editSize">
																									</div>
																		</div>

																							<div class="form-group">
																									<label class="col-sm-3 control-label">Other Details : </label>
																									<div class="col-sm-9">
																											<input type="text" class="form-control input-sm" name="val[19][c]" placeholder="Other Physical details" id="editOther">
																									</div>
																							</div>
																	</div>

																	<div class="col-sm-12" style="margin-top: 10px;"></div>

																	<div class="col-sm-12">
																		<h5 class="m-t-0"> Other Details </h5>
																		<div class="form-group">
																									<label class="col-sm-3 control-label">Material Type: </label>
																									<div class="col-sm-4">
																										<select class="form-control input-sm" id="editMaterial" name="material_type_id" required=""></select>
																									</div>

																									<label class="col-sm-1 control-label">Edition: </label>
																									<div class="col-sm-4">
																											<input type="text" class="form-control input-sm" name="val[17][a]" id="editEdition">
																									</div>
																							</div>

																							<div class="form-group">
																									<label class="col-sm-3 control-label">ISBN: </label>
																									<div class="col-sm-4">
																										<input type="text" class="form-control input-sm" name="val[14][a]" required="" id="editISBN">
																									</div>
																									<label class="col-sm-1 control-label">Price: </label>
																									<div class="col-sm-4">
																											<input type="text" class="form-control input-sm" name="price" id="editPrice">
																									</div>
																							</div>

																							<div class="form-group">
																								<label class="col-sm-3 control-label">Call Number: </label>
																									<div class="col-sm-4">
																											<input type="text" class="form-control input-sm" name="call_num" id="editCallNum">
																									</div>
																									<label class="col-sm-1 control-label">Volume: </label>
																									<div class="col-sm-4">
																											<input type="text" class="form-control input-sm" name="val[29][v]" id="editVolume">
																									</div>
																							</div>

																							<div class="form-group">
																								<label class="col-sm-3 control-label">Remarks: </label>
																									<div class="col-sm-9">
																											<textarea class="form-control input-sm" name="remarks" style="resize: none;" rows="4" id="editRemarks"></textarea>
																									</div>
																							</div>
																	</div>
																	
																</div>

																<div class="col-sm-2"></div>

																<div class="col-sm-10 text-right">
																	<input type="submit" name="submit" class="btn btn-sm btn-success">
																</div>

																<div class="col-sm-2"></div>
																		 
																	</fieldset>
															</form>
												 </div>
										 </div>
								</div>
						</div>
						<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						</div>
				</div>
		</div>
</div>
<div class="modal" id="holdings-modal-dialog">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Holdings</h4>
						</div>
						<div class="modal-body">
							 <div class="row">
										
										<div class="col-sm-12">
												<div class="col-sm-12" style="padding: 10px; border: 1px solid #CCC; background-color: #f1f1f1;">
														
														<form class="form-horizontal" id="frm_add_copy">
																
																<div class="col-sm-12 text-center">
																		<h5>Copy Information - Create Single Item</h5>
																		<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
																		<input type="hidden" id="catalogue_id_copy" name="catalogue_id">
																		<input type="hidden" id="copy_id" name="copy_id">
																</div>

																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-4 control-label">Barcode: <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
																				<div class="col-md-8">
																						<input type="text" required class="form-control" name="barcode" id="barcode">
																				</div>
																		</div>
																</div>
																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-5 control-label">Accession Number: <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
																				<div class="col-md-7">
																						<input type="text" required class="form-control" name="acc_num" id="acc_num">
																				</div>
																		</div>
																</div>
																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-4 control-label">Date Received: <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
																				<div class="col-md-8">
																						<input type="date" required class="form-control" name="date_received" id="date_received">
																				</div>
																		</div>
																</div>
																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-4 control-label">Issues: </label>
																				<div class="col-md-8">
																						<input type="text" class="form-control" name="issues" id="issues">
																				</div>
																		</div>
																</div>
																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-4 control-label">Source: </label>
																				<div class="col-md-8">
																						<input type="text" class="form-control" name="source" id="source">
																				</div>
																		</div>
																</div>
																<div class="col-sm-6">
																		<div class="form-group">
																				<label class="col-md-4 control-label">Note: </label>
																				<div class="col-md-8">
																						<input type="text" class="form-control" name="note" id="note">
																				</div>
																		</div>
																</div>

																<div class="col-sm-12 text-right">
																	 <button class="btn btn-sm btn-primary" id="btn_save_add_copy">Save</button>
																</div>

																
														</form>
														

												</div>
										</div>

										<div class="col-sm-12" style="margin-top: 10px;"></div>

										<div class="col-sm-12">

												<table class="table table-condensed table-bordered" id="acc_tbl_copies">
														<thead>
																<tr>
																		<!-- <td>Call Number</td> -->
																		<!-- <td>Material Type</td> -->
																		<!-- <td>Price</td> -->
																		<td>Barcode</td>
																		<td>Accession Number</td>
																		<td>Date Received</td>
																		<td>Copy Number</td>
																		<td>Source</td>
																		<td>Issues</td>
																		<td>Note</td>
																		<td>Status</td>
																		<td>Actions</td>
																</tr>
														</thead>
												</table>
												<tbody>
												</tbody>

										</div>

							 </div>
						</div>
						<div class="modal-footer">
								<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
						</div>
				</div>
		</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	get_material_types();
	let curCatID;

	var tblAB = $('#tbl-accession-book').DataTable({

			"bPaginate": true,
			// "bPaginate": false,
			"bLengthChange": false,
			"bFilter": true,
			"bInfo": false,
			"bAutoWidth": false,
			"pageLength": 100
	});
	// PER ROW SEARCHING
	tblAB.columns().every( function () {
				var that = this;
 
				$( 'input', this.header() ).on( 'keyup change clear', function () {
						if ( that.search() !== this.value ) {
								that
										.search( this.value )
										.draw();
						}
				} );
		} );
	var tblCopies = $('#acc_tbl_copies').DataTable();


	$('#tbl-accession-book tbody').on( 'click', 'tr', function () {
			if ( $(this).hasClass('selected') ) {
					$(this).removeClass('selected');
					$('#btn-add-copy').addClass('disabled');
					$('#btn-edit-copy').addClass('disabled');
					$('#btn-marc-edit').addClass('disabled');
					$('#btn-delete').addClass('disabled');
			}
			else {
					tblAB.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');

					// console.log($(this).index());


					// var idx = tblAB.cell('.selected', 0).index();
					// console.log(idx);
					// var data = tblAB.row( idx.row ).data();
					// console.log(data);
					// var data = tblAB.row( $(this).index() ).data();
					// console.log(data);

					var id = $(this).attr('id')
					var clickedISBN = $(this).context.children[0].innerHTML;

					curCatID= id;
					// console.log(clickedISBN);

					$("#btn-edit-copy").attr('toEdit',id);
					$("#btn-marc-edit").attr('isbn', clickedISBN);
					
					get_copies(id, tblCopies);

					$('#holdings-modal-dialog #catalogue_id_copy').val('');
					$('#holdings-modal-dialog #catalogue_id_copy').val(id);
					$('#btn-delete').attr('catalogue_id',id);
					$('#btn-add-copy').removeClass('disabled');
					$('#btn-delete').removeClass('disabled');
					$('#btn-marc-edit').removeClass('disabled');
					$('#btn-edit-copy').removeClass('disabled');
			}
	} );

	



				
				$(document).on('submit', '#frm_add_copy', function(e){
						e.preventDefault();
						var form = $(this);
						$.ajax({
								url     : "{{url('/technical/add_copy')}}", 
								type    : 'POST',
								data    : form.serialize(),
								error   : function(error){
										$.gritter.add({
														title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
														text:"Failed to load resource or Duplicate entry",
														sticky:false,
														time:""
										}); 
										return false;
								},
								success : function(data){
										// console.log(data)
										if( data == 1 ){

												$.gritter.add({
														title:"<i class='fa fa-check text-success'></i> New Copy added!",
														text:"",
														sticky:false,
														time:""
												}); 

										}else if(data == 2){

												$.gritter.add({
														title:"<i class='fa fa-check text-success'></i> Copy edited!",
														text:"",
														sticky:false,
														time:""
												}); 
										}else{
													$.gritter.add({
																title:"<i class='fa fa-warning text-danger'></i> Something went wrong",
																text:"",
																sticky:false,
																time:""
												}); 
										}  
										get_copies(curCatID, tblCopies);
										form[0].reset();
								},
						});
				});

				$(document).on('click', '.editCopy', function(e){
					e.preventDefault();
					$('#copy_id').val( $(this).attr('data-id') )
					$('#barcode').val( $(this).attr('data-barcode') )
					$('#acc_num').val( $(this).attr('data-acc') )
					$('#source').val( $(this).attr('data-source') )
					$('#note').val( $(this).attr('data-note') )
					$('#issues').val( $(this).attr('data-iss') )
					$('#date_received').val( $(this).attr('data-date') )
						
				});

				$(document).on('click', '.deleteCopy', function(e){
					e.preventDefault();
					console.log('DELETE THIS')
					console.log( $(this).attr('data-id') );
					$.ajax({
						url     : "{{url('/technical/delete_copy')}}", 
						type    : 'POST',
						data    : { _token: "{{csrf_token()}}", id: $(this).attr('data-id')} ,
						error   : function(error){
							$.gritter.add({
								title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
								text:"Something Went wrong",
								sticky:false,
								time:""
							}); 
							return false;
						},
						success : function(data){
							// console.log(data)
							if( data > 0 ){
								get_copies(curCatID, tblCopies);

								$.gritter.add({
									title:"<i class='fa fa-check text-success'></i> Copy Deleted!",
									text:"",
									sticky:false,
									time:""
								}); 

							}else{
								$.gritter.add({
									title:"<i class='fa fa-warning text-danger'></i> Something went wrong",
									text:"",
									sticky:false,
									time:""
								}); 
							}  
						},
					});
				});


		function get_copies(id, table) {

				$.ajax({
								type: 'POST',   
								url: "{{url('/technical/get_copies')}}",
								data: {  _token: "{{csrf_token()}}", 'catalogue_id': id },
								success: function(data){

										table.clear();
										table.draw();
										data.forEach(function(entry){

												var actions = '<a href="#" data-id="'+entry.copy_id+'" class="deleteCopy"><i class="fa fa-times text-danger"></i></a>'+
												'<a href="#" class="editCopy" data-id="'+entry.copy_id+'" data-barcode="'+entry.barcode+'" data-acc="'+entry.acc_num+'" data-date="'+entry.date_received+'" data-source="'+(entry.source?entry.source:'')+'" data-iss="'+(entry.issues?entry.issues:'')+'" data-note="'+(entry.note?entry.note:'')+'"><i class="fa fa-edit text-success"></i></a>';

												table.row.add( [
													// entry.call_num,
													// entry.name,
													// entry.price,
													entry.barcode,
													entry.acc_num,
													entry.date_received,
													entry.copy_number,
													entry.source,
													entry.issues,
													entry.note,
													entry.status,
													actions
												] ).draw( false );

										});

								},
						});

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
					$('#editMaterial').html(options);
				},
			});
		}
});
</script>