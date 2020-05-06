<div class="row">

	<div class="col-sm-12">
		<h5>Loan Rules</h5>	
	</div>

	<div class="col-sm-12">
		
		<form id="frm-add-loan-rules">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="col-sm-3" style="padding: 10px; background-color: #f1f1f1; border: 1px solid #CCC;">
				
				<div class="form-group">
                    <label for="">Patron Category</label>
                    <select class="form-control input-sm" id="select-loans-patron-category-type" name="patron_category_id"></select>
                </div>

               <!--  <div class="form-group">
                    <label for="">Material Type</label>
                    <select class="form-control input-sm" id="select-material-type" name="material_type_id"></select>
                </div> -->

                <div class="form-group">
                    <label for="">Fine</label>
                    <input type="text" class="form-control input-sm" name="fine" />
                </div>

                <div class="form-group">
                    <label for="">Max Loan Quantity </label>
                    <input type="number" class="form-control input-sm" name="max_loan_qty" />
                    <span class="help-block">Description goes here.. .</span>
                </div>

                <div class="form-group">
                    <label for="">Loan Length </label>
                    <input type="number" class="form-control input-sm" name="length_loan" />
                    <span class="help-block">Description goes here.. .</span>
                </div>

                <div class="form-group text-right">
                   <button class="btn btn-sm btn-primary">Save</button>
                   <button class="btn btn-sm btn-default" id="btn-loan-rules-clear">Clear</button>
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
    
				<table class="table table-condensed table-bordered" id="tbl-loan-rules">
					<thead>
						<tr>
							<th>Category Type</th>
							<th>Fine</th>
							<th>Max Loan Quantity</th>
							<th>Loan Length</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<!-- <div class="col-sm-3"></div> -->

        </form>

	</div>
</div>