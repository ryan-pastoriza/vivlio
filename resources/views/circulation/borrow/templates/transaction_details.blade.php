<?php $count_loan = 0; ?>
<?php $count_return = 0; ?>
<?php $count_overdue = 0; ?>
<div class="col-md-12" style="height: 40px; padding: 0;"><strong>Transaction Details</strong></div>
<div class="col-md-12" style="padding: 0;">
		<ul class="nav nav-pills">
			<li style="font-size:10px;" class="{{$category == 'loan' ? 'active' : ''}} {{$category}}"><a href="#trans_loan_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/loan.fw.png')}}" height="13px;" width="13px;"> Loan</a></li>
			<li style="font-size:10px;" class="{{$category == 'return' ? 'active' : ''}}"><a href="#trans_returned_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/return.fw.png')}}" height="13px;" width="13px;"> Returned</a></li>
			<li style="font-size:10px;" class="{{$category == 'renewal' ? 'active' : ''}}"><a href="#trans_renewal_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/renewal.fw.png')}}" height="13px;" width="13px;"> Renewal</a></li>
			<li style="font-size:10px;" class="{{$category == 'reserved' ? 'active' : ''}}"><a href="#trans_reserve_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/hold_reserve.fw.png')}}" height="13px;" width="13px;"> Hold Reserved</a></li>
			<li style="font-size:10px;" class="{{$category == 'fines' ? 'active' : ''}}"><a href="#trans_fines_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/fines.fw.png')}}" height="13px;" width="13px;"> Fines</a></li>
			<li style="font-size:10px;" class="{{$category == 'overdue' ? 'active' : ''}}"><a href="#trans_overdue_{{$code}}" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/circulation/overdue.fw.png')}}" height="13px;" width="13px;"> Overdue</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade {{$category == 'loan' ? 'active in' : ''}}" id="trans_loan_{{$code}}">
				<div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" style="padding: 0;">
					<table class="table table-condensed table-bordered loan_table">
						<thead>
							<tr>
								<th class="col-md-2">Accession Number</th>
								<th class="col-md-4">Title</th>
								<th class="col-md-2">Due Date</th>
								<th class="col-md-2">Date Loaned</th>
								<th class="col-md-1">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['loan'] as $value)
								@if($value['returned'] == 0)
									<?php $due = Carbon\Carbon::parse($value['due_date']);?>
									<?php $loaned = Carbon\Carbon::parse($value['loaned_date']); ?>
									<tr>
										<td>{{$value['acc_num']}}</td>
										<td>
											<p style="font-size:11px;color:#004040;"><b>{{$value['info']['title']}}</b></p>
									 	 	<p style="font-size:10px; margin-top:-10px;">By {{$value['info']['author']}}</p>
											<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
												<strong class="text-danger">Penalty Day/s </strong>  ({{\Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now())}})
												<?php $count_overdue++;?>
											<?php else: ?>
												<strong class="text-success">Day/s Before return</strong>  ({{\Carbon\Carbon::parse($due)->diffInDays($loaned)}})
											<?php endif ?>
											</p>
										</td>
										<td class="text-{{((Carbon\Carbon::now()->between($due,$loaned))? 'success' : 'danger')}}">{{(date('F j, Y h:i A', strtotime($value['due_date']))) }}</td>
										<td>{{(date('F j, Y h:i A', strtotime($value['loaned_date'])))}}</td>
										<td><p class="text-{{($value['returned'] == 0) ? 'danger' : 'success'}}">{{($value['returned'] == 0) ? 'Unreturned' : 'Returned'}}</p></td>
									</tr>
									<?php $count_loan++; ?>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade {{$category == 'return' ? 'active in' : ''}}" id="trans_returned_{{$code}}">
			   <div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" style="padding: 0;">
					<table class="table table-condensed table-bordered loan_table">
						<thead>
							<tr>
								<th class="col-md-2">Accession Number</th>
								<th class="col-md-6">Title</th>
								<th class="col-md-2">Date Returned</th>
								<th class="col-md-1">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['loan'] as $value)
								@if($value['returned'] == 1)
									<tr>
										<td>{{$value['acc_num']}}</td>
										<td>
							 				<p style="font-size:11px;color:#004040;"><b>{{$value['info']['title']}}</b></p>
									 	 	<p style="font-size:10px; margin-top:-10px;">By {{$value['info']['author']}}</p>
							 			</td>
										<td>{{(date('F j, Y h:i A', strtotime($value['returned_date'])))}}</td>
										<td><p class="text-{{($value['returned'] == 0) ? 'danger' : 'success'}}">{{($value['returned'] == 0) ? 'Unreturned' : 'Returned'}}</p></td>
									</tr>
									<?php $count_return++; ?>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade {{$category == 'renewal' ? 'active in' : ''}}" id="trans_renewal_{{$code}}">
			   <div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" style="padding: 0;">
					<table class="table table-condensed table-bordered loan_table">
						<thead>
							<tr>
								<th class="col-md-2">Accession Number</th>
								<th class="col-md-4">Title</th>
								<th class="col-md-2">Date Loaned</th>
								<th class="col-md-2">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['loan'] as $value)
								@if($value['returned'] == 1)
									<tr>
										<td>{{$value['acc_num']}}</td>
										<td>
							 				<p style="font-size:11px;color:#004040;"><b>{{$value['info']['title']}}</b></p>
									 	 	<p style="font-size:10px; margin-top:-10px;">By {{$value['info']['author']}}</p>
							 			</td>
										<td>{{(date('F j, Y h:i A', strtotime($value['returned_date'])))}}</td>
										<td><p class="text-{{($value['returned'] == 0) ? 'danger' : 'success'}}">{{($value['returned'] == 0) ? 'Unreturned' : 'Returned'}}</p></td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade {{$category == 'reserved' ? 'active in' : ''}}" id="trans_reserve_{{$code}}">
				<div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" id="reservedID_{{$code}}" style="padding: 0;">
					 @if($category != 'reserved')
					 	<p class="text-muted">GO TO <strong id="reserve-tab-btn" style="cursor: pointer;" class="text-success"> HOLD/RESERVED </strong>TAB</p>
					 @else
					 <div class="col-md-12">
					 	<p style="font-size: 13px;">Reservation List</p>
					 </div>
					 <table class="table table-bordered table-hover loan_table">
					 	<thead>
					 		<tr>
								<th>Item</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
					 	</thead>
					 	<tbody>
					 		@foreach($data['reserve'] as $value)
					 		<tr>
					 			<td>
					 				<p style="font-size:11px;color:#004040;"><b>{{$value['info']['title']}}</b></p>
							 	 	<p style="font-size:10px; margin-top:-10px;">By {{$value['info']['author']}}</p>
					 			</td>
					 			<td> 
					 				<p style="font-size:12px;color:#004040;">{{date('F j, Y h:i A', strtotime($value['main']['reserved_date']))}}</p></td>
					 			<td class="status text-{{($value['main']['status'] == 'canceled') ? 'danger' : (($value['main']['status'] == 'pending') ? 'warning' : 'success')}}">{{$value['main']['status']}}</td>
					 			<td>
					 				@if(($value['main']['status'] == 'pending')&&($value['queue'] == 0)&&($value['availability']))
					 					<button class="fa fa-cog btn btn-xs flat btn-success hold_borrow_btn" reserve-id="{{$value['main']['reserve_id']}}" catalogue-author="{{$value['info']['author']}}" catalogue-name="{{$value['info']['title']}}" isbn="{{$value['info']['isbn']}}" no-of-page="{{$value['info']['no-of-page']}}" volume="{{$value['info']['volume']}}" remarks="{{$value['main']['remarks']}}" patron-id="{{$patron_id}}" catalogue-id="{{$value['main']['catalogue_record_id']}}" availability="{{$value['availability']}}" available_count="{{$value['available_count']}}" reserved-id="{{$value['main']['reserve_id']}}"></button>
					 				@elseif($value['queue'] > 0 )
					 					<p class="text-success" style="font-size: 10px;">QUEUE(<strong>{{$value['queue']}}</strong>)</p>
					 					<button class="fa fa-cog btn btn-xs flat btn-success hold_borrow_btn" id="cancel-reserve" reserve-id="{{$value['main']['reserve_id']}}"> Cancel</button>
					 				@elseif(($value['availability']) == false)
						 				@if($value['main']['status'] == 'canceled')
						 					<p class="text-danger" style="font-size: 10px;"><i class="fa fa-times"></i>CANCELED</p>
						 				@elseif($value['main']['status'] == 'borrowed')
										 <p class="text-success" style="font-size: 10px; line-height:20px;">BORROWED</p>
										@else
						 					<p class="text-danger" style="font-size: 11px;">UNAVAILABLE</font></p>
						 					<button class="fa fa-cog btn btn-xs flat btn-success hold_borrow_btn" id="cancel-reserve" reserve-id="{{$value['main']['reserve_id']}}"> Cancel</button>
						 				@endif
					 				@else 
					 					<p class="text-success" style="font-size: 10px;">NO ACTION</p>
					 				@endif
					 			</td>
					 		</tr>
					 		@endforeach
					 	</tbody>
					 </table>
					 @endif
				</div>
			</div>
			<div class="tab-pane fade {{$category == 'fines' ? 'active in' : ''}}" id="trans_fines_{{$code}}">
			   	<div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" style="padding: 0;">
					<table class="table table-bordered loan_table">
					    <thead style="font-size:10px;">
					        <tr>
					            <th class="col-md-3">Penalty</th>
					            <th class="col-md-4">Title</th>
					            <th class="col-md-1">Amount</th>
					            <th class="col-md-1">Status</th>
					        </tr>
					    </thead>
					    <tbody id="material_list_return">
					       <?php foreach ($data['fines'] as $value): ?>
					       			<?php $due = Carbon\Carbon::parse($value['info'][0][0]['due_date']);?>
									<?php $loaned = Carbon\Carbon::parse($value['info'][0][0]['loaned_date']); ?>
									<?php $returned = Carbon\Carbon::parse($value['info'][0][0]['returned_date']); ?>
					       		<tr>
						            <td>
						            	<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
											<strong class="text-danger">Penalty Day/s </strong>  ({{\Carbon\Carbon::parse($due)->diffInDays($returned)}})
										<?php endif ?>
						            </td>
						            <td>
						                <p style="font-size:11px;color:#004040;"><b>{{$value['info'][1]['title']}}</b>
						                </p>
						                <p style="font-size:10px; margin-top:-10px;">{{$value['info'][1]['author']}}</p>
						            </td>
						            <td class="text-danger">
						                {{number_format($value['info'][2] * \Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now()), 2, '.', ',')}}
						            </td>
						            <td style="color:#004040;">Paid</td>
						        </tr>
					       <?php endforeach ?>
					    </tbody>
					</table>
				</div>	
			</div>
			<div class="tab-pane fade {{$category == 'overdue' ? 'active in' : ''}}" id="trans_overdue_{{$code}}">
			    <div class="col-sm-12" style="height:20px;"></div>
				<div class="col-sm-12" style="padding: 0;">
					<table class="table table-condensed table-bordered loan_table">
						<thead>
							<tr>
								<th class="col-md-2">Accession Number</th>
								<th class="col-md-4">Title</th>
								<th class="col-md-2">Due Date</th>
								<th class="col-md-2">Date Loaned</th>
								<th class="col-md-1">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['loan'] as $value)
								@if($value['returned'] == 0)
									<?php $due = Carbon\Carbon::parse($value['due_date']);?>
									<?php $loaned = Carbon\Carbon::parse($value['loaned_date']); ?>
									<tr>
										<td>{{$value['acc_num']}}</td>
										<td><p class="text-success">{{$value['info']['title']}}</p>
											<p>
											<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
												<strong class="text-danger">Penalty Day/s </strong>  ({{\Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now())}})
											<?php else: ?>
												<strong class="text-success">Day/s Before return</strong>  ({{\Carbon\Carbon::parse($due)->diffInDays($loaned)}})
											<?php endif ?>
											</p>
										</td>
										<td class="text-{{((Carbon\Carbon::now()->between($due,$loaned))? 'success' : 'danger')}}">{{(date('F j, Y h:i A', strtotime($value['due_date']))) }}</td>
										<td>{{(date('F j, Y h:i A', strtotime($value['loaned_date'])))}}</td>
										<td><p class="text-{{($value['returned'] == 0) ? 'danger' : 'success'}}">{{($value['returned'] == 0) ? 'Unreturned' : 'Returned'}}</p></td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(e){
		$('.loan_table').DataTable();
		load_count({{$count_loan}},{{$count_return}},{{$count_overdue}});
		load_fines();
		@if($category == 'reserved')
			var menu = [{
		        name: 'Borrow Item',
		        img: '{{url("public/images/icons/2ndbar/circulation/borrow.fw.png")}}',
		        title: 'Borrow',
		        fun: function (data) {
		           var btn = $(data.trigger[0]);
		           $('#reserve-modal-title').html('<b>'+btn.attr('catalogue-name')+'</b>');
		           $('#reserve-modal-author').html(btn.attr('catalogue-author'));
		           $('#reserve-modal-remarks').html(btn.attr('remarks'));
		           $('#reserve-modal-ISBN').html(btn.attr('isbn'));
		           $('#reserve-modal-availability').html(btn.attr('available_count'));
				   $('.search_reserve_item').attr('catalogue-id',btn.attr('catalogue-id'))
				   $('.reserve_start_borrow').attr('reserve-id',btn.attr('reserve-id'));
		           $('#reserve_item_value').html("");
		           $('#reserved-modal-id').modal('show');
		        }
		    }, {
		        name: 'Cancel Item',
		        img: '{{url("public/images/icons/3rdbar/circulation/renewal.fw.png")}}',
		        title: 'Cancel',
		        fun: function (data) {
		        		var btn = $(data.trigger[0]);
		          	var url = 'cancelReservedItem';
								var data = {_token:"{{csrf_token()}}", _reserve_id:btn.attr('reserved-id')}
								var posting = $.post(url,data);
								posting.done(function(data){
									btn.parent('td').siblings('.status').removeClass('text-warning').addClass('text-danger').html('canceled');
									btn.parent('td').html('<p class="text-success" style="font-size: 10px;">NO ACTION</p>');
						})
		        }
		    }];
			//Calling context menu
			 $('.hold_borrow_btn').contextMenu(menu);
		@endif
		$(document).on('click','#cancel-reserve', function(){
			$.ajax({
        type: 'POST',
        url: "{{url('circulation/cancelReservedItem')}}",
        data: {  _token: "{{csrf_token()}}", _reserve_id: $(this).attr('reserved-id') },
        success: function(data){
        },
    	});
		});	

		
	});
</script> 