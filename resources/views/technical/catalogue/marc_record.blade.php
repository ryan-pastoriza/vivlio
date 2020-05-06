<div class="row">
	<form class="form-horizontal" id="frm-fmc">
		<div class="col-sm-12">
			<div class="col-sm-8">
				<div class="form-group">
			        <label class="col-sm-4 control-label">Enter ISBN: </label>
			        <div class="col-sm-8">
			            <div class="input-group">
                            <input type="text" class="form-control input-sm" id="txt-isbn" data-id="020">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-sm" id="btn-search-catalog">Search Catalog</button>
                            </div>
                        </div>
			        </div>
			    </div>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-4">
				<div class="form-group">
			        <label class="col-sm-4 control-label">Material Type: </label>
			        <div class="col-sm-8">
			            <select class="form-control input-sm" id="marc-select-material-types" name="material_type_id"></select>
			        </div>
			    </div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
			        <label class="col-sm-4 control-label">Call Number: </label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control input-sm" name="call_num" id="call_num">
			        </div>
			    </div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
			        <label class="col-sm-4 control-label">Price: </label>
			        <div class="col-sm-8">
			            <input type="text" class="form-control input-sm" name="price" id="price">
			        </div>
			    </div>
			</div>
		</div>
	</form>
	<!-- <div class="col-sm-12"> -->
		<!-- <div class="row"> -->
			<div class="col-sm-12">
				<div class="col-sm-8">
					<!--
					<div class="input-group">
	            <input type="text" class="form-control input-sm" disabled="disabled" id="input-marc-value">
	            <div class="input-group-btn">
	                <button type="button" class="btn btn-primary btn-sm disabled" id="btn-fmc-add-value">Add Value</button>
	            </div>

          </div>
           -->
				</div>
			</div>
			<div class="col-sm-2"></div>
		<!-- </div> -->

	<!-- </div> -->
	<div class="col-sm-12" style="margin-top: 5px;"></div>
	<div class="col-sm-10" id="template-records">
		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th width="250">Field Name</th>
					<th width="25">I1</th>
					<th width="25">I2</th>
					<th width="250">Subfield</th>
					<th width="450">Data</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="col-sm-2">
		<input type="hidden" id="isEdit" value="False">
		{{-- <p><a href="javascript:;" class="btn btn-white btn-block btn-sm" id="btn-field-repeat" disabled>Repeat</a></p> --}}
		<p><a href="#modal-apply-marc-template" class="btn btn-white btn-block btn-sm" data-toggle="modal">Apply Template</a></p>
		{{-- <p><a href="javascript:;" class="btn btn-white btn-block btn-sm disabled">Copies</a></p> --}}
		<br /><br />
		{{-- <p><a href="javascript:;" class="btn btn-danger btn-block btn-sm">Delete</a></p> --}}
	</div>
	<div class="col-sm-12 text-center">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<a href="javascript:;" disabled class="btn btn-primary btn-sm" id="btn-save-fmr">Save Changes</a>
			<a href="javascript:;" class="btn btn-white btn-sm">Cancel</a>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
<!-- modal --> 
<div class="modal" id="modal-apply-marc-template">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Choose a template</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
							<table class="table table-condensed table-bordered" id="tbl-show-marc-template">
								<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-sm btn-white" id="btn-select-template-apply">Ok</a>
				<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Cancel</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">    
	
	// console.log(""+1+0);
	// console.log(""-1+0);
	// console.log(true+false);
	// console.log(6/3);
	// console.log("2"*"3");
	// console.log(4+5+"px");
	// console.log("$"+4+5);
	// console.log("4"-2);
	// console.log("4px"-2);
	// console.log(7/0);
	// console.log("-9\n"+5);
	// console.log(null+1)
	// window.onload = function() {

	//     if (window.jQuery) {  
	//         // jQuery is loaded  
	//         alert("Yeah!");
	//     } else {
	//         // jQuery is not loaded
	//         alert("Doesn't Work");
	//     }

	//     console.log(window.jQuery);

	// }

	// $(function(){

	// 	alert('tsk');

	// });

</script>
