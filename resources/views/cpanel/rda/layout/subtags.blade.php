<tr class="odd gradeX">
    <td class="tags-panel" style="border-top:0px;">
	<div class="panel panel-inverse overflow-hidden hidden" id="panel_clone">			
		<div class="panel-heading">
			<h3 class="panel-title">
				<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion_tags" href="#tags_collapse_43" aria-expanded="false">
				    <i class="fa fa-plus-circle pull-right"></i> 
					<span style="font-size:14px;"><b class="tag_field">56</b>  <font class="tag_name">asd</font> - (<font class="repeatation">NR</font>)</span>
				</a>
			</h3>
		</div>
		<div id="tags_collapse_43" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		<div class="panel-body">
				<span class="editable_tags" style="font-size:14px;" id="43"><b class="tag_field">56</b>  <font class="tag_name">asd</font> - (<font class="repeatation">NR</font>)
				</span>
				<a class="btn btn-xs  btn-success display_subForm" resp="close" data-toggle="collapse"><i class="fa fa-plus"></i></a>
				<a class="btn btn-xs btn-danger pull-right btn_main_delete" cval="" token="{{csrf_token()}}">Remove MainTag</a>
				<form class="form-inline hidden collapse_sub">
				 		<input type="hidden" name="_token" value="">
				 		<input type="hidden" name="id" value="43">
				 		<input type="hidden" name="_type" value="marc_subfield_structure">
					<h4>Add Subtags</h4>
					<div class="form-group m-r-10"></div>
					<div class="form-group m-r-10">
						<input autocomplete="false" type="number" name="tagsubfield" id="tag" class="form-control" placeholder="Tag" required="">
					</div>
					<div class="form-group m-r-10">
						<input autocomplete="false" type="text" name="tagsubfieldname" id="tag_name" class="form-control" placeholder="Name" required="">
					</div>
					<div class="form-group ">
						<select class="form-control" name="repeatable" id="subtag_repeatable" required="">
	                        <option value="R" selected="">Repeatable</option>
	                        <option value="NR">Non Repeatable</option>
	                        <option value="null">Nullable</option>
	                    </select>
					</div>
					<div class="form-group m-r-10">
						<button type="submit" class="btn btn-sm btn-success sub_tags_btn"><i class="fa fa-check" data-click="panel-reload"> </i> Add Sub Tags</button>
					</div>
				</form>
				<div class="col-md-12" style="height:20px;"></div>
			<span class="pull-right">
				<span>Option:</span>
				<span class="editable_tags">Non Repeatable</span>
			</span>
			<ul class="todolist todolist_const" id="">
	         		
	        </ul>
		</div>
	</div>

	</div>
  </td>
</tr>

<li class="hidden" id="sub_tags_clone">
    <a href="javascript:;" class="todolist-container" data-click="todolist" id="subfield_101">
       <div class="todolist-title">-$  -<span class="subtag_field">a</span> 
	       <span class="subtag_name">Internation Standard Book Number</span>  
	       - (<span class="subtag_repeatable">R</span>) 
	       <i class="btn_opt fa fa-pencil text-success" type="edit" cval="" token="" data-toggle="tooltip" data-placement="top" title="Edit"></i>  
	       <i class="btn_opt fa fa-trash text-danger" type="delete" cval="" token="" data-toggle="tooltip" data-placement="top" title="Delete"></i> 
       </div>
    </a>
</li>