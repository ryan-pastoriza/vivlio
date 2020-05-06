<?php $start_date = 0;?>
<?php $carbon = \Carbon\Carbon::now()?>
@if($semester == '1')
	<?php $star_date = \Carbon\Carbon::create($carbon->year,6,1);?>
@elseif($semester == '2')
	<?php 
	 $star_date = \Carbon\Carbon::create($carbon->year,6,1);
	?>
@endif
@foreach($data as $value)
	@foreach($value->patron_information as $value_info)
		 <div id="patron-info" class="">
		 		@if(empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration)))))
		 			<div class="alert alert-warning fade in info_expire">
	                    <span class="close" data-dismiss="alert"><i class="fa fa-times"></i></span>
	                    <p>This patron was expired and need to be renew in order to continue library transaction</p>
	                    <p><strong>EXPIRED DATE : </strong> {{(date('F j, Y', strtotime($value->expiration)))}}</p>
	                    <p><strong>DAY/s </strong> ({{\Carbon\Carbon::parse($value->expiration)->diffInDays(\Carbon\Carbon::now())}}) </p>
	                </div>
		 		@endif
		 		<div class="checkbox">
		 			<label>
		 				<input type="checkbox" value="" onchange="editPatron()">
		 				<span class="text-success" style="font-size:13px;">Edit Profile </span>
		 			</label>
		 		</div>
		    	<div class="media media-md">
				<div class="col-md-3" style="padding: 0px; padding-top:4%;">
					 <img src="{{url('public/images/user-default.fw.png')}}" class="img img-responsive" >
				</div>
				<div class="col-md-9">
					<div class="col-md-12" style="padding:0;">
						<a class="media-left" href="javascript:;">
							<!-- <img src="{{asset('public/images/user-1.fw.png')}}" alt="" class="media-object"> -->
						</a>
						<div class="media-body">
							<h3 class="media-heading media-c_lname"  style="font-size:18px;"><span id="patron-full-name" data-id="{{$value->patron_id}}" data-entity="patron_information" style="font-weight:400;">{{strtoupper($value_info->full_name)}}</span></h3>
							<p class="media-c_fname" style="font-weight:400;"><strong>Status :</strong> {{ucwords($value->patron_type)}}</p>
							<p class="media-c_course"><b>Course / Position:</b> <span style="color:#00acac;">{{strtoupper($value_info->course)}}</span></p>
							<p style="">Employee/Student ID: <span style="font-size:15px;">{{$value_info->student_id}}</span></p>
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw text-success spiiner hidden"></i>
							<span id="container_renew">
							<p class="{{((empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration))))) ? 'text-danger' : '' )}}"><strong>EXPIRED DATE : </strong> <span class="{{((empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration))))) ? 'text-danger' : 'text-success' )}}">{{(date('F j, Y', strtotime($value->expiration)))}}  
							@if(empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration)))))
					 			<button class="btn btn-success btn-xs btn_renew_patron">Renew Library Card</button>
					 		@endif
							</span> </p>
							</span>
							<span id="container_cv" class="hidden">
							    <p>Are you sure ? 
							    <button class="btn btn-success btn-xs " id="confirm_btn" pat-id="{{$value->patron_id}}"><i class="fa fa-check"></i></button>
								<button class="btn btn-danger btn-xs btn_yes" id="cancel_btn" pat-id="{{$value->patron_id}}"><i class="fa fa-times"></i></button> 
								</p>
								
							</span>
						</div>
				</div>
				</div>
				<div class="col-md-12" style="padding:0; height:5px;"></div>
				<div class="col-md-12" style="padding:0;">
					<h5><b>Personal Information</b></h5>
					<p style="color:#00acac"><b style="color:gray;">Birthdate: <span class="hidden text-danger" id="editor-dob-ss" >(EDITOR:YYYY-MM-DD)</span> </b>  <span data-entity="patron_information" id="patron-dob" data-value="{{$value_info->dob}}" data-id="{{$value->patron_id}}">{{date('F j, Y', strtotime($value_info->dob))}}</span></p>
					<p style="color:#00acac"><b style="color:gray;">Age:</b> {{\Carbon\Carbon::parse($value_info->dob)->age}}</p>
					<p style="color:#00acac"><b style="color:gray;">Gender:</b> <span data-id="{{$value->patron_id}}" data-value="{{$value_info->gender}}" id="patron-gender" data-entity="patron_information"> {{ucfirst($value_info->gender)}}</span></p>
					<p style="color:#00acac"><b style="color:gray;">Contact No:</b> <span data-entity="patron_information" id="patron-contact"data-id="{{$value->patron_id}}">{{$value_info->contact_no}}</span></p>
					<p style="color:#00acac"><b style="color:gray;">Address:</b> <span data-entity="patron_information" id="patron-address"data-id="{{$value->patron_id}}">{{$value_info->address}}</span></p>
				</div>
				<div class="col-md-12 hidden" style="height:230px;">
					 <center>
					 	<div class="col-md-12 " style="height:60px;"></div>
					 	<span style="color:#004040;font-size:18px;">NO LIBRARY INFORMATION YET <font style="font-size:10px;"><br>(<a href="">add Library Info</a>)</font></span>
					 	<div id="patron-default-img " class="col-md-12" style="text-align:center;">
	                    	<img class="img img-responsive" src="{{asset('public/img/work.fw.png')}}" draggable="false">
	                    </div>
					 </center>
				</div>
				<div class="">
					<div class="col-md-12" style="padding:0;">
						<h5><b>Library Information</b></h5>
						<p style="color:#00acac"><b style="color:gray;">Library card no:</b> LBA123998727</p>
						<p style="color:#00acac"><b style="color:gray;">Membership Exp:</b> November 12, 2017

						<p style="color:#00acac"><b style="color:gray;">SY:</b> 2016-2017
						<p style="color:#00acac"><b style="color:gray;">Sem:</b> 2nd</p>
					</div>
					<div class="col-md-12" style="padding:0;">
						<h5><b>Summary Transaction</b></h5>
						<table class="table">
						 	 <thead>
						 	 	 <tr style="border-bottom:0px;">
							 	 	<th style="color:#00acac;">Loan</th>
							 	 	<th style="color:#00acac;">Return</th>
							 	 	<th style="color:#00acac;">Renew</th>
							 	 	<th style="color:#00acac;">Reserved</th>
							 	 	<th style="color:#00acac;">Overdue</th>
							 	 </tr>
						 	 </thead>
						 	 <tbody>
						 	 	 <tr style="">
						 	 	 	 <td class="text-center"><span style="font-size:27px; color:#004040; font-weight:bold;">13</span></td>
							 	 	 <td class="text-center"><span style="font-size:27px; color:#004040; font-weight:bold;">52</span></td>
							 	 	 <td class="text-center"><span style="font-size:27px; color:#004040; font-weight:bold;">11</span></td>
							 	 	 <td class="text-center"><span style="font-size:27px; color:#004040; font-weight:bold;">51</span></td>
							 	 	 <td class="text-center"><span style="font-size:27px; color:#004040; font-weight:bold;">16</span></td>
						 	 	 </tr>
						 	 </tbody>
						 </table>

					</div>
					<div class="col-md-12" style="padding:0;">
						<h5><b>Action</b></h5>
						<div class="col-md-12" style="height:10px;"></div>
						<div class="col-md-12 col-lg-offset-5">
							<button class="btn btn-success btn-sm">Add</button>
							<button class="btn btn-danger btn-sm">Deactivate</button>
							<button class="btn btn-warning btn-sm">Renew</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
@endforeach
<script type="text/javascript">
	$(document).ready(function(e){
		$('#confirm_btn').click(function(e){
			$(this).attr('disabled',true);
			$('.spiiner').removeClass('hidden');
			$(this).closest('p').addClass('hidden');
			var token  = "{{csrf_token()}}";
			var name = "expiration";
			var id = $(this).attr('pat-id');
			var url = 'edit';

			var posting = $.post(url,{_token:token, name:name, _id:id});
				posting.done(function(data){
					$('#container_renew').append('<p class=""><strong>EXPIRED DATE : </strong> <span class="text-success">October 29, 2017 </span> </p>')
					$('.info_expire').addClass('hidden');
					$('.spiiner').addClass('hidden');
				});
		})
		$('#cancel_btn').click(function(e){
			$('#container_cv').addClass('hidden');
			$('#container_renew').removeClass('hidden');
		})
		$('.btn_renew_patron').click(function(e){
			$('#container_cv').removeClass('hidden');
			$('#container_renew').addClass('hidden');
		});
	});
	var count = 0;
		function editPatron(){
			  $('#editor-dob-ss').removeClass('hidden');
			  if(count == 0){
			  	 $('#patron-full-name').editable({
			  		mode:'inline',
			        url: 'edit',
			        pk: 1,
			        params: function(params) {
			        	params._token  = "{{csrf_token()}}";
			        	params._option = "edit_each_info";
			        	params._entity = $(this).attr('data-entity');
			        	params._id = $(this).attr('data-id');
			        	return params;

			        },
			        success: function(response, newValue) {
				        reload();
				    }
			    });
			  	 $('#patron-dob').editable({
			  		mode:'inline',
			        url: 'edit',
			        pk: 1,
			        params: function(params) {
			        	params._token  = "{{csrf_token()}}";
			        	params._option = "edit_each_info";
			        	params._entity = $(this).attr('data-entity');
			        	params._id = $(this).attr('data-id');
			        	return params;
			        },
			         success: function(response, newValue) {
				        reload();
				    }
			    });
			  	$('#patron-contact').editable({
			  		mode:'inline',
			        url: 'edit',
			        pk: 1,
			        params: function(params) {
			        	params._token  = "{{csrf_token()}}";
			        	params._option = "edit_each_info";
			        	params._entity = $(this).attr('data-entity');
			        	params._id = $(this).attr('data-id');
			        	return params;
			        },
			         success: function(response, newValue) {
				        reload();
				    }
			    });
			    $('#patron-address').editable({
			  		mode:'inline',
			        url: 'edit',
			        pk: 1,
			        params: function(params) {
			        	params._token  = "{{csrf_token()}}";
			        	params._option = "edit_each_info";
			        	params._entity = $(this).attr('data-entity');
			        	params._id = $(this).attr('data-id');
			        	return params;
			        },
			         success: function(response, newValue) {
				        reload();
				    }
			    });
				$('#patron-gender').editable({
				  		mode:'inline',
				        url: 'edit',
				        type:'select',
				        pk: 1,
				        value:$(this).attr('data-value'),
				        source:[{value:'male',text:'male'},
				        		{value:'female',text:'female'}],
				        params: function(params) {
				        	params._token  = "{{csrf_token()}}";
				        	params._option = "edit_each_info";
				        	params._entity = $(this).attr('data-entity');
				        	params._id = $(this).attr('data-id');
				        	return params;
				        },
			         success: function(response, newValue) {
				        reload();
				    }
				  })
				
				count = 1;
			  }else{
			  	 $('#editor-dob-ss, #editor-label-ss').addClass('hidden');
			  	 $('#patron-gender').editable('destroy');
			  	 $('#patron-full-name').editable('destroy');
			  	 $('#patron-dob').editable('destroy');
			  	 $('#patron-contact').editable('destroy');
			  	 $('#patron-address').editable('destroy');
			  	 $('#patron-gender').editable('destroy');
			  	 count = 0;
			  }
			  
			  
		}
</script>