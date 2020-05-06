<div class="row">

	<div class="col-sm-12">
		<h5>Patron Categories</h5>
	</div>


	<div class="col-sm-12">
		
		<form id="frm-add-patron-category">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" name="category" value="patron_category">
			<div class="col-sm-3" style="padding: 10px; background-color: #f1f1f1; border: 1px solid #CCC;">
				<div class="form-group">
                    <label for="" style="width: 100%;">Patron Category Type 
                    	<a href="#modal-add-patron-category-type" class="btn btn-xs btn-warning pull-right" data-toggle="modal">Add / Edit</a>
                    </label>
                    <select class="form-control input-sm" id="select-patron-category-type" name="category_type_id"></select>
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" style="resize: none;" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="">Enrollment Period</label>
                    <select class="form-control input-sm" id="select-enrollment-period" name="enrollment">
                    	<option value="m">In months</option>
                    	<option value="y">Until date</option>
                    </select>
                    
                    <div style="border: 1px solid #CCC; padding: 20px; margin: 5px;">
                    	<div class="row">
                                <input type="number" name="inmonth" id="in-months" class="form-control input-sm hidden" placeholder="In months">
                                <input type="date" name="untildate" id="until-date" class="form-control input-sm hidden">
                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                   <button class="btn btn-sm btn-primary">Save</button>
                   <button class="btn btn-sm btn-default" id="btn-clear-add-patron-category">Clear</button>
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
    
				<table class="table table-condensed table-bordered" id="tbl-patron-category">
					<thead>
						<tr>
							<th>Patron Category Type</th>
							<th>Description</th>
							<th>Enrollment Period</th>
							<th>Enrollment Period Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

		</form>

	</div>

</div>