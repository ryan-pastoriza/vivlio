@extends('layouts.app')
@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" />


	<style type="text/css">
	  .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important;border-color:#004040!important;}
	  .gritter-close{margin-top: 13px; background:#004040!important;}
	  .patron-selector{cursor: pointer;}
	  .patron-selector:hover{background:rgba(0, 64, 64, 0.21); ;}
	  
	</style>
@endsection
@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		
		<div class="col-md-12" >
			<div class="col-md-8" style="padding:0;">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default" data-sortable-id="ui-widget-4" data-init="true">
			                <div class="panel-heading " style="border-bottom:1px gray dashed">
			                    <h4 class="panel-title"><i class="fa fa-list"></i> Patron List</h4>
			                    <div class="col-md-12" style="height: 20px;"></div>
			                    <div class="col-md-12" style="padding: 0;">
			                    	
			                    	 <div style="padding: 0;" class="col-md-3 " class="pull-right">
			                    	 	<p class="pull-left">
					                    	<div class="form-group">
					                    		<label>Patron Type</label>
						                    	<select name="p-type" id="patron-type" class="form-control" required="required">
						                    		<option value="0">All</option>
					                    			<option value="1">Student</option>
					                    			<option value="2">Staff</option>

					                    		</select>
					                    	</div>
					                    </p>
			                    	 </div>
			                    	 <div class="col-md-9"></div>
			                    </div>
			                </div>
			                <div class="panel-body" style="max-height:674px; overflow:auto;">
							<button class="btn btn-info btn-xs ref-button" val="patron-list">Refresh</button>
			                    <table class="table list-table-loan" id="patron-list">
								 	 <thead>
								 	 	<tr>
								 	 	 	<th class="col-md-3">Name</th>
								 	 	 	<th class="col-md-3">Barcode</th>
								 	 	 	<th class="col-md-3">Birthday</th>
								 	 	 	<th class="col-md-3">Course / Position</th>
								 	 	 	<th>Action</th>
								 	 	 </tr>
								 	 </thead>
								 	 <tbody>
								 	 </tbody>
								 </table>
			                </div>
			            </div>
					</div>
					<div class="col-md-12" style="height:5px;"></div>
					<div class="col-md-6">
						<a class="btn btn-primary btn-sm btn-warning" data-toggle="modal" href='#modal-add-manual' data-keyboard="true">
							<i class="fa fa-plus fa-2x pull-left"></i>
								Manually Add <br>
								<small>Patrons</small>
						</a>
						<a class="btn btn-primary btn-sm btn-success" id="absorb-database" data-toggle="modal" href='#modal-add-absorb' data-keyboard="true">
							<i class="fa fa-plus fa-2x pull-left"></i>
								Absorb From Database (SIS)<br>
								<small>Patrons</small>
						</a>
					</div>
					<div class="col-md-12" style="height:50px;">
					</div>
				</div>
			</div>
			<!-- MODAL -->
			<div class="modal fade" id="modal-add-manual" tabindex='-1'>
				<div class="row">
					<div class="col-md-12" style="padding:0;">
						 <div class="col-md-5 col-md-offset-1  col-sm-offset-1" style="padding:0;">
						 	<div class="modal-dialog">
									<div class="modal-content modal-sm">
										<div class="modal-header" style="background:#004040;">
											<h4 class="modal-title" style="color:white;font-size:12px;">Insert Patron Information</h4>
										</div>
										<form id="patron-form" >
											<div class="modal-body" style="max-height:500px; overflow:auto;">
												<p style="color:#004040;"><strong><i class="fa fa-user"></i> Personal Information</strong></p>
													<div class="form-group" style="padding:0;">
														<label for="">Student ID</label>
														<input type="text" class="form-control" id="" name="patron-student-id" placeholder="12-01-33-0013" required="">
													</div>
													<p>Name</p>
													<div class="form-group col-md-4" style="padding:0;">
														<label for="">First</label>
														<input type="text" class="form-control" id="" name="patron-first" placeholder="" required="">
													</div>
													<div class="form-group col-md-4">
														<label for="">Last</label>
														<input type="text" class="form-control" id="" name="patron-last" placeholder="" required="">
													</div>
													<div class="form-group col-md-4" style="padding:0;">
														<label for="">Middle</label>
														<input type="text" class="form-control" id="" name="patron-middle" placeholder="">
													</div>
													<div class="form-group col-md-7" style="padding:0;">
														<label for="">Birthdate</label>
														<input type="date" class="form-control" id="" name="patron-birthdate" placeholder="" required="">
													</div>
													<div class="form-group col-md-5" style="padding-right:1px;">
														<label for="">Gender</label>
														<select class="form-control" name="patron-gender" required="">
							                                <option>-select-</option>
							                                <option>Male</option>
							                                <option>Female</option>
							                            </select>
													</div>
													<div class="form-group">
														<label for="">Contact No.</label>
														<input type="number" class="form-control" name="patron-contact" id="" placeholder="Contact Number" >
													</div>
													<div class="form-group">
														<label for="">Address</label>
														<input type="text" class="form-control" name="patron-address" id="" placeholder="Address" required="">
													</div>
													<div class="form-group ">
														<label for="">Patron Type</label>
														<select class="form-control" name="patron-type">
															<option value="">-select-</option>
							                                @foreach($data['patron_type'] as $type)
							                                	<option value="{{$type->patron_category_id}}">{{ucwords($type->patron_category_type->category_name)}}</option>
							                                @endforeach
							                            </select>
													</div>
													<div class="form-group ">
															<label for="">Course / Position</label>
															<select class="form-control" name="patron-course">
																<option value="">-select-</option>
																<option value="FACULTY">FACULTY (Non-Student)</option>
								                                @foreach($data['program_list'] as $course)
								                                	<option value="{{$course->prog_name}}">{{ucwords($course->prog_name)}} ({{$course->prog_abv}}) - {{$course->prog_type}}</option>
								                                @endforeach
								                            </select>
													</div>
													<div class="form-group hidden">
														 <input type="hidden" name="_token" value="{{csrf_token()}}">
													</div>
											</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary btn-sm btn-warning" id="manual-button"><i class="fa fa-check"></i> Save</button>
											<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
										</div>
										</form>
								 </div>
							</div>
						 </div>
						 <div class="col-md-5" style="padding:0;margin-left:-260px;">
						 	<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header" style="background:#004040;">
										<h4 class="modal-title" style="color:white;font-size:12px;">Patrons</h4>
									</div>
									<div class="modal-body">
									<button class="btn btn-info btn-xs ref-button" val="patron-list-modal">Refresh</button>
										  <table class="table list-table-loan" id="patron-list-modal">
										 	 <thead>
										 	 	 <tr>
										 	 	 	<th>Name</th>
										 	 	 	<th>barcode</th>
										 	 	 	<th>Birthday</th>
										 	 	 	<th>Course / Position</th>
										 	 	 	<th>Action</th>
										 	 	 </tr>
										 	 </thead>
										 	 <tbody>
										 	 </tbody>
										 </table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary btn-sm btn-success" >Save changes</button>
									</div>
								</div>
							</div>
						 </div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modal-add-absorb" tabindex='-1'>
				<div class="row">
					
					<div class="col-md-12" style="padding:0;">
					
						 <div class="col-md-5" style="padding:0;margin-left: 17%;">
						 	<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header" style="background:#004040;">
										<h4 class="modal-title" style="color:white;font-size:12px;">Manual Choose Patrons</h4>
									</div>
									<div class="modal-body" id="sample_modal">
										 <div class="col-md-4">
												 <div class="form-group" style="padding:0;">
												<label for="">School Year</label>
												<select name="p-type" id="" class="form-control" required="required">
						                    		<option value="0">All</option>
					                    			<option value="1">Student</option>
					                    			<option value="2">Staff</option>
					                    		</select>
											</div>
										 </div>
										 <div class="col-md-4">
											 <div class="form-group" style="padding:0;">
												<label for="">Semester</label>
												<select name="p-type" id="" class="form-control" required="required">
						                    		<option value="0">All</option>
					                    			<option value="1">1st Semester</option>
					                    			<option value="2">2nd Semester</option>
					                    		</select>
											</div>
										 </div>
										 <div class="col-md-4">
											 <div class="form-group" style="padding:0;">
												<label for="">Program list</label>
												<select name="p-type" id="" class="form-control" required="required">
													<option value="">-select-</option>
						                    		@foreach($data['program_list'] as $course)
														<option value="{{$course->prog_name}}">{{ucwords($course->prog_name)}} ({{$course->prog_abv}}) - {{$course->prog_type}}</option>
													@endforeach
					                    		</select>
											</div>
										 </div>
										 <div class="col-md-12" style="height:20px;"></div>
										 <button class="btn btn-info btn-xs ref-button" val="patron-list-sis">Refresh</button>
										 <table class="table list-table-loan" id="patron-list-modal-sis">
										 	 <thead>
										 	 	 <tr>
										 	 	 	<th>Name</th>
										 	 	 	<th>Birthday</th>
										 	 	 	<th>Barcode</th>
										 	 	 	<th>Course</th>
										 	 	 	<th>Action</th>
										 	 	 </tr>
										 	 </thead>
										 	 <tbody>
										 	 </tbody>
										 </table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary btn-sm btn-success" >Save changes</button>
									</div>
								</div>
							</div>
						 </div>
					</div>
				</div>
			</div>
			<!-- END MODAL -->
			<div class="col-md-4" >
				<div class="panel panel-default" data-sortable-id="ui-widget-4" data-init="true">
	                <div class="panel-heading">
	                    <h4 class="panel-title"><i class="fa fa-list"></i> Patron Information</h4>
	                    <div class="input-group">
	                    	<input class="form-control" id="search_patron" type="text" autofocus="true" style="">
	                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
	                    </div>
	                </div>
	                <div class="panel-body " id="patron_container">
	                    <div id="patron-default-img " class="col-md-12" style="text-align:center;">
	                    	<img class="img img-responsive" src="{{asset('public/img/work.fw.png')}}" draggable="false">
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
		$.fn.dataTable.ext.errMode = 'throw';
		$(document).ready(function(e){
			table1  = get_patron($('#patron-list',0));
			table2  = get_patron($('#patron-list-modal'),0);
			counter = 0;
			$(document).on('click','#absorb-database',function(e){
				e.preventDefault();
				if(counter == 0){
					table3 = get_student($('#patron-list-modal-sis'),0);
					counter++;
				}
			});
			$(document).on('change','.barcode_update',function(e){
				var id = $(this).attr('patron-id');
				var barcode = $(this).val();
				var url = 'edit';
				$('#barcode_label_'+id).addClass('hidden');
				$('#barcode_input_'+id).addClass('hidden');
				$('#barcode_loading_'+id).removeClass('hidden');
				var data = {_token:"{{csrf_token()}}",_barcode:barcode, _patron_id:id, _option:'update_barcode'}
				var posting = $.post(url,data)
					posting.done(function(data){
						if(data === '1'){
							$('#barcode_success_'+id).removeClass('hidden');
							$('#barcode_loading_'+id).addClass('hidden');

						}else{
							if(data === '0'){
								$('#barcode_label_'+id).removeClass('hidden');
								$('#barcode_label_'+id).html('<i class="fa fa-barcode"></i> Add Barcode <br> (<span style="color:red;">Invalid Barcode</span>)');
								$('#barcode_input_'+id).removeClass('hidden');
								$('#barcode_input_'+id).children('input').val('').focus();
								$('#barcode_input_'+id).focus();
								$('#barcode_loading_'+id).addClass('hidden');
							}
						}
					})
			});
			$(document).on('change','#search_patron',function(e){
				e.preventDefault();
				var barcode = $(this).val();
				var url = "getPatronByBarcode";
				var data = {_token:"{{csrf_token()}}",_barcode:barcode}
				var text = $('#search_patron');
				var posting = $.post(url,data)
					posting.done(function(data){
						$('#patron-default-img').addClass('hidden');
						$('#patron_container').html(data);
					});
				text.val("");
			});
			$(document).on('submit','#patron-form',function(e){
				e.preventDefault();
				$('#manual-button').addClass('disabled');
				var form_values = $('#patron-form').serialize();
				var url = "manual_save";
				var posting = $.post(url,form_values)
					posting.done(function(data){
						if(data === '1'){
							reload();
							$('#patron-form')[0].reset();
							$('#manual-button').removeClass('disabled');
						}
					});
			});
			$(document).on('click','.patron-selector',function(e){
				e.preventDefault();
				var id = $(this).attr('id');
				var data = {_token:"{{csrf_token()}}", _id:id }
				var url = "getPatronByID";
				var posting = $.post(url,data)
					posting.done(function(data){
						$('#patron-default-img').addClass('hidden');
						$('#patron_container').html(data);
					});
			});
			$(document).on('change','#acad_year',function(e){
				e.preventDefault();
				var value = $(this).val();
				var url = "getStudentDataFromYear";
				var data = {_token:"{{csrf_token()}}", _year:value }
				var posting = $.post(url,data)
				posting.done(function(data){
					var data_1 = JSON.parse(data)
					/*$('#sample_modal').html(data_1);*/
					console.log(data_1);
				});
			});
			$(document).on('click','.ref-button',function(e){
				e.preventDefault();
				var a = $(this).attr('val');
				if(a === 'patron-list'){
					$('#patron-list').DataTable().ajax.reload();
				}else if(a === 'patron-list-modal'){
					$('#patron-list-modal').DataTable().ajax.reload();
				}else if(a === 'patron-list-sis'){
					$('#patron-list-sis').DataTable().ajax.reload();
				}
			});
			
			/*ABSORB STUDENT FROM DATABASE*/
			$(document).on('click','.absorb-student',function(e){
				e.preventDefault();
				var stud_id = $(this).attr('student-id');
				var stud_name = $(this).attr('student-name');
				var stud_stud_id = $(this).attr('student-stud-id');
				var stud_gender = $(this).attr('student-gender');
				var stud_address = $(this).attr('student-address');
				var stud_contact = $(this).attr('student-contact');
				var stud_course = $(this).attr('student-course');
				var stud_birthday = $(this).attr('student-birthday');
				var stud_csrf = $(this).attr('student-csrf-token')
				var data = {_id:stud_id, _name:stud_name, _gender:stud_gender, _address:stud_address, _contact:stud_contact, _birthday:stud_birthday, _course:stud_course, _student_id:stud_stud_id, _token:stud_csrf};
				var button = $(this);
				var url = "saveStudentFromDB";
					var posting = $.post(url,data);
						posting.done(function(data){
							button.next().removeClass('hidden');
							button.addClass('hidden');
							reload_sis();
							reload();
							$.gritter.add({
								title:"<i class='fa fa-check text-success fa-2x'></i> New Patron Added!",
								text:"",
								sticky:true,
								time:""
							});
						});
			})
	});
	function get_student(TABLE,TYPE){
		var list_table = TABLE.dataTable({
				"lengthMenu": [[5, 8, 25, 50, -1], [5, 8, 25, 50, "All"]],
				ajax: {
			        	url: "{{url('/circulation/fetch_students')}}",
			        	type: 'POST',
			        	data: { _token: "{{csrf_token()}}", _type : TYPE}
			        },
			        deferRender:"true",
			        responsive: true,
					columns:[
						{"data" : "name"},
						{"data" : "dob"},
						{"data" : "barcode"},
						{"data" : "course"},
						{"data" : "action"}
					],
					dom: 'Bfrtip',
					createdRow : function(row ,data, index){
						$(row).addClass('patron-selector');
						$(row).attr('id',data.id);
					}
			});
	}
	function reload(){
		$('#patron-list').DataTable().ajax.reload();
		$('#patron-list-modal').DataTable().ajax.reload();
	}
	function reload_sis(){
		$('#patron-list-modal-sis').DataTable().ajax.reload();
	}
	function destroy(){
		table1.fnDestroy();
		table2.fnDestroy();
	}
	function get_patron(TABLE,TYPE){
		var list_table = TABLE.dataTable({
				"lengthMenu": [[5, 8, 25, 50, -1], [5, 8, 25, 50, "All"]],
				ajax: {
			        	url: "{{url('/circulation/fetch_patrons')}}",
			        	type: 'POST',
			        	data: { _token: "{{csrf_token()}}", _type : TYPE}
			        },
			        deferRender:"true",
			        responsive: true,
					columns:[
						{"data" : "name"},
						{"data" : "barcode"},
						{"data" : "dob"},
						{"data" : "course"},
						{"data" : "action"}
					],
					dom: 'Bfrtip',
					createdRow : function(row ,data, index){
						$(row).addClass('patron-selector');
						$(row).attr('id',data.id);
					}
			});
		return list_table;
	}
	$(document).on('change','#patron-type',function(e){
		var type = $(this).val();
		destroy();
		table1  = get_patron($('#patron-list'),type);
		table2  = get_patron($('#patron-list-modal'),type);
	});
	</script>
@endsection