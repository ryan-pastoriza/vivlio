<h3 class="m-t-10"> Quick Editor </h3>
<p class="help-block">Full Marc Record Quick Editor.</p>
<div class="row">						
	<div class="col-sm-12">
	    <form id="frm-quick-add" class="form-horizontal">
	    	<input type = "hidden" name="_token" value="<?php echo csrf_token(); ?>">
	        <fieldset>
				
				<div class="col-sm-10">
					<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
						<h5 class="m-t-0">Title Statement</h5>

						<div class="form-group">
	                        <label class="col-sm-3 control-label">Title: </label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" placeholder="Title Proper" name="245[a]" required="">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Remainder of Title : </label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" name="245[b]" placeholder="Subtitles, etc.">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Remainder of Title Page : </label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" name="245[c]" placeholder="Statement of Responsibility">
	                        </div>
	                    </div>	
					</div>

					<div class="col-sm-12" style="margin-top: 10px;"></div>

					<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
						<h5 class="m-t-0">Main Entry  
						<!-- 	<button class="btn btn-primary btn-xs" id="btn-add-main-entry"><i class="fa fa-plus"></i></button>
							<button class="btn btn-danger btn-xs" id="btn-remove-main-entry"><i class="fa fa-minus"></i></button> -->
						</h5>
							<div id="main-entry-original-copy">
								<div class="form-group" id="copy-1">
			                        <label class="col-sm-3 control-label">Author </label>
			                        <div class="col-sm-4">
			                        	 <input type="text" class="form-control input-sm" name="100[a]" placeholder="Name">
			                        </div>
			                        <label class="col-sm-1 control-label">Dates </label>
			                        <div class="col-sm-4">
			                              <input type="text" class="form-control input-sm" name="100[d]" placeholder="Dates associated with a name">
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
	                            <input type="text" class="form-control input-sm input-sm" name="264[a]" placeholder="Place of Publication, distribution, etc.">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Publisher </label>
	                        <div class="col-sm-9">
	                        	 <input type="text" class="form-control input-sm input-sm" name="264[b]" placeholder="Name of Publisher, distributor, etc." required="">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-3 control-label">Date </label>
	                        <div class="col-sm-9">
	                              <input type="text" class="form-control input-sm input-sm" name="264[c]" placeholder="Date of Publication, distribution, etc.">
	                        </div>
	                    </div>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;"></div>
					
					<div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
						<h5 class="m-t-0">Physical Description</h5>

						<div class="form-group">
	                        <label class="col-sm-3 control-label">Extent: </label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" name="300[a]" placeholder="Number of pages">
	                        </div>
	                    </div>
	
						<div class="form-group">
							 <label class="col-sm-3 control-label">Size: </label> 
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" name="300[b]" placeholder="Dimensions">
	                        </div>
						</div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Other Details : </label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control input-sm" name="300[c]" placeholder="Other Physical details">
	                        </div>
	                    </div>
					</div>

					<div class="col-sm-12" style="margin-top: 10px;"></div>

					<div class="col-sm-12">
						<h5 class="m-t-0"> Other Details </h5>
						<div class="form-group">
	                        <label class="col-sm-3 control-label">Material Type: </label>
	                        <div class="col-sm-4">
	                        	<select class="form-control input-sm" id="select-material-type" name="material_type_id" required=""></select>
	                        </div>

	                        <label class="col-sm-1 control-label">Edition: </label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-sm" name="250[a]">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">ISBN: </label>
	                        <div class="col-sm-4">
	                        	<input type="text" class="form-control input-sm" name="020[a]" required=""required=>
	                        </div>
	                        <label class="col-sm-1 control-label">Price: </label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-sm" name="price">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-3 control-label">Call Number: </label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-sm" name="call_num">
	                        </div>
	                        <label class="col-sm-1 control-label">Volume: </label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-sm" name="440[v]">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                    	<label class="col-sm-3 control-label">Remarks: </label>
	                        <div class="col-sm-9">
	                            <textarea class="form-control input-sm" name="remarks" style="resize: none;" rows="4"></textarea>
	                        </div>
	                    </div>
					</div>
					
				</div>

				<div class="col-sm-2"></div>

				<div class="col-sm-10 text-right">
					<button class="btn btn-sm btn-success">Save</button>
					<button class="btn btn-sm btn-white" id="btn-quick-add-clear">Cancel</button>
				</div>

				<div class="col-sm-2"></div>
	           
	        </fieldset>
	    </form>
	</div>
</div>	