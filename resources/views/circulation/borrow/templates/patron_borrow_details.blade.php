<?php $carbon = \Carbon\Carbon::now();?>
<?php $start_date = 0;?>
<?php $carbon = \Carbon\Carbon::now()?>
<?php $patron_id = '';?>
@if($semester == '1')
	<?php $star_date = \Carbon\Carbon::create($carbon->year,6,1);?>
@elseif($semester == '2')
	<?php 
	 $star_date = \Carbon\Carbon::create($carbon->year,6,1);
	?>
@endif

@if(count($data) == 0)
<div class="col-md-12">
	<h3 style="color:#004040;">Patron Not Found</h3>
	<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron Name</span>)</small>
</div>
@else
<div class="row">
	 <div class="col-md-12" style="padding:0;">
	 	 <div class="col-md-6">
	 	 	 <div class="col-md-12" style="border-top:1px dashed #004040;"></div>
	 	 	 <div class="media media-md">
	 	 	 <div class="">
				<div class="col-md-7" style="">
					<div class="col-md-3" style="padding: 0px; padding-top:4%;">
						 <img src="{{url('public/images/user-default.fw.png')}}" class="img img-responsive" >
					</div>
					<div class="col-md-9">
						@foreach($data as $value)
							@foreach($value['patron_information'] as $value_info)
								<?php $expireDate = $value_info->expiration;?>
								<?php $patron_id = $value_info->patron_id;?>
								<div class="media-body" style="padding:10px;">
									<h4 class="media-heading">{{strtoupper($value_info->full_name)}}</h4>
									<div class="col-md-12" style="height:10px;"></div>
									<p class="media-c_course text-warning">STUDENT ID: <span class="text-success">{{$value_info->student_id}}</span></p>
									<p class="media-c_course text-warning">COURSE: <span class="text-success">{{strtoupper($value_info->course)}}</span></p>
									<p class="text-warning">ADDRESS : <span class="text-success">{{strtoupper($value_info->address)}}</span> </p>
									<p class="text-warning">EXPIRED DATE : <span class="text-{{(empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration))))) ? 'danger' : 'success'}}">{{(date('F j, Y', strtotime($value->expiration)))}}</span> </p>
								</div>
							@endforeach
						@endforeach
					</div>
				</div>
				<div class="col-md-5" style="padding:0;">
					<div class="col-md-12" style="padding:0;">
						<small class="pull-right"> <font class="media-d_color">Summary :</font>  <font class="media-c_lname text-success">SY : {{($semester == '1') ? ($carbon->year).'-'.($carbon->year+1) : $carbon->year.'-'.($carbon->year+1)}}</font>  <font class="media-d_color">Sem :</font>  <font class="media-c_lname text-success">{{($semester == '1') ? '1st' : '2nd'}}</font></small>
					</div>
					<div class="col-md-12" style="height:30px;"></div>
					<div class="col-md-12">
						 <table class="table">
						 	 <thead>
						 	 	 <tr>
							 	 	<th class="text-success">Loan</th>
							 	 	<th class="text-success">Return</th>
							 	 	<th class="text-success">Overdue</th>
							 	 </tr>
						 	 </thead>
						 	 <tbody>
						 	 	 <tr>
						 	 	 	<center>
						 	 	 		 <td><span style="font-size:27px; color:#004040;" id="patron_co_loan_{{$code}}">0</span></td>
								 	 	 <td><span style="font-size:27px; color:#004040;" id="patron_co_return_{{$code}}">0</span></td>
								 	 	 <td><span style="font-size:27px; color:#004040;" id="patron_co_overdue_{{$code}}">0</span></td>
						 	 	 	</center>
						 	 	 </tr>
						 	 </tbody>
						 </table>
					</div>
					<div class="col-md-12" style="margin-top:10px;margin-left:15px;padding:0;" >
						<div class="col-md-12">
							<b class="text-success">Total Fines :</b> 
							<font class="text-danger" style="font-size:25px;" id="fines_d_{{$code}}">‎₱{{$fines}}</font>
						</div>
					</div>
				</div>
			</div>
			</div>
			@if(empty((\Carbon\Carbon::create()->between(\Carbon\Carbon::create($start_date),\Carbon\Carbon::parse($value->expiration)))))
					<div class="col-md-12" style="padding-top:20px;" ></div>
		 			<div class="alert alert-warning fade in info_expire">
	                    <span class="close" data-dismiss="alert"><i class="fa fa-times"></i></span>
	                    <p>This patron was expired and need to be renew in order to continue library transaction</p>
	                    <p><strong>EXPIRED DATE : </strong> {{(date('F j, Y', strtotime($value->expiration)))}}</p>
	                    <p><strong>DAY/s </strong> ({{\Carbon\Carbon::parse($value->expiration)->diffInDays(\Carbon\Carbon::now())}}) </p>
	                </div>
	        @elseif(($borrowLimit <= $totalUnreturned) && ($category !='return') && ($category != 'renewal') && ($category != 'fines')&& ($category != 'overdue') && ($category == 'reserve'))
			        <div class="col-md-12" style="padding-top:20px;" ></div>
		 			<div class="alert alert-warning fade in info_expire">
	                   <p class="text-success">Patron Borrow Items Reach the limit</p>
	                </div>
		 	@elseif($category == 'return')
		 		<div class="col-md-12" style="height: 20px;" ></div>
		 		<div class="col-md-12">
		 			<h4>Transaction Return Details</h4>
		 		</div>
		 		<?php if (count($items) == 0): ?>
		 		<div class="col-md-12">
		 			<div class="alert alert-warning fade in info_expire">
		 				<h5 class="margin:auto;">No items to be returned</h5>
		 			</div>
		 		</div>
		 		<?php else: ?>
		 			<table class="table table-bordered table-hover" id="list-borrow-item">
		  				<thead>
		  					<tr>
		  						<th class="col-md-1">Accession No.</th>
		  						<th class="col-md-4">Title</th>
		  						<th class="col-md-2">Due Date</th>
		  						<th class="col-md-2">Date to Return</th>
		  						<th class="col-md-1">Action</th>
		  					</tr>
		  				</thead>
		  				<tbody id="material_list_return">
		  					<?php foreach ($items as $key => $v): ?>
		  						<?php $due = Carbon\Carbon::parse($v['due_date']);?>
								<?php $loaned = Carbon\Carbon::parse($v['loaned_date']); ?>
		  						 <?php if ($v['returned'] == 0): ?>
								   <?php if (Carbon\Carbon::now()->between($due,$loaned)): ?>
										<tr>
											<td>{{$v['acc_num']}}</td>	  	
											<td><p style="font-size:11px;color:#004040;"><b>{{$v['info']['title']}}</b></p>
												<p style="font-size:10px; margin-top:-10px;">By {{$v['info']['author']}}</p>
												<p>
													<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
														<strong class="text-danger">Penalty Day/s </strong>  ({{\Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now())}})
													<?php else: ?>
														<strong class="text-success">Day/s Before return</strong>  ({{\Carbon\Carbon::parse($due)->diffInDays($loaned)}})
													<?php endif ?>
												</p>

											</td>	  	
											<td class="text-{{((Carbon\Carbon::now()->between($due,$loaned))? 'success' : 'danger')}}">{{(date('F j, Y h:i A', strtotime($v['due_date']))) }}
											
											</td>
											<td>{{(date('F j, Y h:m:s A', strtotime($v['due_date'])))}}</td>			
											<td>
												<p id="refer-return">
													<button class="btn btn-success btn-xs btn-flat ret_btn" item-id="{{$v['acc_num']}}" patron-id={{$patron_id}}><i class="fa fa-refresh"></i> Return</button>
												</p>
											</td>	  	
										</tr>
								   <?php endif ?>
		  						 <?php endif ?>
		  					<?php endforeach ?>
		  				</tbody>
		  			</table>
		 		<?php endif ?>
			<div class="col-md-12" style="height: 20px;" ></div>
			@elseif(($category =='renewal'))
				<div class="col-md-12"  style="height:20px;"></div>
		 		<div class="col-md-12">
		 			<h5><strong>L</strong>ist of renewable Items</h5>
		 		</div>
		 		<div class="col-md-12">
		 			 <div class="col-md-12">
		 			 	  <p style="color: #004040;"> </p>
		 			 </div>
		 			 <table class="table table-bordered list-renew-item">
		 			 	  <thead style="font-size:10px;">
		 			 	  	 	<th class="col-md-2">Accession #</th>
		  						<th class="col-md-4">Title</th>
		  						<th class="col-md-2">Status</th>
		  						<th class="col-md-3">Action</th>
		 			 	  </thead>
		 			 	  <tbody id="material_list_return">
			 			 	  	<?php $id_list  = [];?>
			  					<?php foreach ($items as $key => $v): ?>
		  						 		<?php if ($v['info']['status'] == 'available'): ?>
		  						 			<?php if (!in_array($v['acc_num'], $id_list)): ?>
		  						 			<?php array_push($id_list, $v['acc_num']) ?>
			  						 			<tr>
													<td>{{$v['acc_num']}}</td>	  	
													<td>
										 				<p style="font-size:11px;color:#004040;"><b>{{$v['info']['title']}}</b></p>
												 	 	<p style="font-size:10px; margin-top:-10px;">By {{$v['info']['author']}}</p>
													</td>	  	
													<td>	
														<p class="text-success">
															{{ucwords($v['info']['status'])}}
														</p>
													</td>
													<td>
														<p id="refer-return">
															<button class="btn btn-success btn-xs btn-flat" id="renewal_Btn" item-id="{{$v['acc_num']}}" patron-id={{$patron_id}}><i class="fa fa-refresh"></i> Renew</button>
														</p>
													</td>	  	
							  					</tr>
		  						 			<?php endif ?>
		  						 		<?php endif ?>
			  					<?php endforeach ?>
			  				</tbody>
		 			 </table>
		 		</div>
		 	@elseif(($category =='reserved'))
		 		<div class="modal fade" id="reserved-modal-id">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					
		 					<div class="modal-body">
		 						<div class="invoice">
					                <div class="invoice-company">
					                    <span><img src="{{url('public/images/logo.fw.png')}}" height="25" width="50"> Vivlio Library System</span>
					                	<div class="col-md-12" style="height:20px;"></div>
											<input class="form-control search_reserve_item" catalogue-id="reserve" type="text" autofocus="true" style="" placeholder="Get Item">
					                	<div class="col-md-12" style="height:20px;"></div>
					                </div>
					                <div class="invoice-content">
					                    <div class="table-responsive" id="">
					                    		<div class="col-md-12 " id="material-reserve-details">
			
										 	 	 <div class="col-md-3">
										 	 	 	<img class="img img-responsive" src="{{url('public/images/book-default.fw.png')}}">
										 	 	 </div>
										 	 	 <div class="col-md-9">
										 	 	 	 <p style="font-size:18px;color:#004040;" id="reserve-modal-title"><b>???</b></p>
											 	 	 <p style="font-size:10px; margin-top:-10px;" id="reserve-modal-author">
											 	 	 ???</p>
											 	 	 <div class="col-md-12" style="padding: 0px;">
											 	 	 	
											 	 	 	 <div class="col-md-6">
											 	 	 	 	 <p class="text-left" style="color: #004040;"> <b>ISBN</b></p>
										 	 		 		 <p class="text-left" id="reserve-modal-ISBN">???</p>
											 	 	 	 </div>
											 	 	 	 <div class="col-md-6">
											 	 	 	 	 <p class="text-left" style="color: #004040;"> <b>Count</b></p>
										 	 				 <p class="text-left" id="reserve-modal-availability">???</p>
											 	 	 	 </div>
											 	 	 </div>
										 	 	 </div>
										 	 	   <div class="col-md-12">
									 	 	 	 	 <p class="text-left" style="color: #004040;"> <b>Remarks</b></p>
								 	 				 <p class="text-left" id="reserve-modal-remarks">???</p>
									 	 	 	 </div>
										 	 	 <div class="col-md-12" style="height: 2px; background: #336666;"></div>
										 	 	 <div class="col-md-12" style="height: 25px;"></div>
										 	 </div>
					                    </div>
					                    <div class="invoice-price">
					                        <div class="invoice-price-right" style="background: #004040;">
					                            <small>BARCODE</small> 
												<span id="reserve_item_value">-</span>
					                        </div>	
					                    </div>
					                    <div class="col-md-12" style="height: 20px;"></div>
					                    
					                </div>
					                <div class="invoice-note">
					                    * Make all cheques payable to ACLC College of Butuan<br>
					                    * Payment is due within 30 days<br>
					                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
					                </div>
					                <div class="invoice-footer text-muted">
					                    <p class="text-center m-b-5 text-center">
					                        THANK YOU
					                    </p>
					                    <p class="text-center">
					                        <span class="m-r-10"><i class="fa fa-globe"></i> ACLC College Of Butuan</span>
					                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
					                        <span class="m-r-10"><i class="fa fa-envelope"></i> aclccollegeofbutuan@gmail.com</span>
					                    </p>
					                   
										<form class="hidden reserve_start_borrow text-right" action="">
											<button class="btn btn-xs flat btn-success iw-mTrigger" ><i class="fa fa-book"></i> | Borrow Item</button>
										</form>
					                </div>
					            </div>
		 					</div>
		 					
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-md-12" style="height: 20px;"></div>
		 		<div class="col-md-12 panel">
		 			<h5 style="color: #004040;"><strong><i class="fa fa-edit"></i> Reservation Transaction</strong></h5>
		 			<hr>
		 			<div class="col-md-12" style="height: 20px;"></div>
		 			<div class="col-md-12 form-group">
		 				  <input class="form-control" type="text" name="materials" id="autocomplete-materials" placeholder="Search book" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"/>
		 			</div>
		 			<div class="col-md-12" id="container-reserve-details"></div>
		 		</div>
		 		<div class="modal fade" id="reserve-modal">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-body">
		 						<div class="row">
		 							<div class="col-md-12">
		 								<div id='material-reserve-container'></div>
		 								<div class="col-md-12" style="height:10px"></div>
										<form id="form-reserve">
											<div class="form-group col-md-6">
												<label for=""><p>Priority</p> <small class="text-info">illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</small></label>
												<select id="_reserve_priority" name="reserve-priority" class="form-control" required="required">
													<option value="">-Select-</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label for=""><p>Reserve Date</p> <small class="text-info">illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</small></label>
												<input id="_reserve_date" type="date" class="form-control" name="reserve-date" placeholder="Input field" required="required">
											</div>
											<div class="form-group col-md-12">
												<label for="">Remarks</label>
												<textarea class="form-control" id="reserve_remarks" name="reserve-remarks" rows="8" required="required"></textarea>
											</div>
											<p class="pull-right" style="padding:15px;">
												<button class="btn btn-xs btn-success flat" catalogue-id="" patron-id="" id="btn-reserve-save"><i class="fa fa-check"></i> Save Reservation</button>
											</p>	
										</form>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	@elseif(($category =='fines'))
		 		<div class="col-md-12" style="height: 20px;"></div>
		 		<div class="col-md-12" style="height: 3px;background: #004040;"></div>
		 		<div class="col-md-12" style="height: 20px;"></div>
		 		<div class="col-md-12 panel">
		 			<h5 style="color: #004040;"><strong><img src="{{url('public/images/fines-symbol.fw.png')}}" height="40px;" width="40px;"> Fines Transactions</strong></h5>
		 			<p style="font-size:14px; color:#004040;">Please select the fines/fees you would like to pay. You current Library Online Account balance is <font class="text-danger" id="fines_d_container_{{$code}}">‎₱{{$fines}}</font> </p>
		 		</div>	
		 		<div class="col-md-12" style="height: 3px;background: #004040;"></div>
		 		<div class="col-md-12" style="height:10px;"></div>
				
		 		<div class="col-md-12" id="container-fines">
					
		 			<table class="table table-bordered" id="fines_list_table">
		 			 	  <thead style="font-size:10px;">
		 			 	  	 	<th class="col-md-1">Penalty</th>
		  						<th class="col-md-4">Title</th>
		  						<th class="col-md-1">Action</th>
		 			 	  </thead>
		 			 	  <tbody>
			 			 	  	<tbody id="material_list_return">
								  <?php foreach ($items as $key => $v): ?>
			  						<?php $due = Carbon\Carbon::parse($v['due_date']);?>
									<?php $loaned = Carbon\Carbon::parse($v['loaned_date']); ?>
									<?php $r_date = Carbon\Carbon::parse($v['returned_date'])?>
			  						 <?php if ($v['returned'] == 0): ?>
			  						 	<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
			  						 		<tr acc-num="{{$v['info']['acc_num']}}" loan-id="{{$v['loan_id']}}" patron-id="{{$patron_id}}" amount="{{number_format($fines_rules * \Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now()), 2, '.', ',')}}">
												<td>
													<p>
														<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
															<strong class="text-danger">Penalty Day/s </strong>({{\Carbon\Carbon::parse($due)->diffInDays($r_date)}})
														<?php endif ?>
													</p>
												</td>	  	
												<td>
									 				<p style="font-size:11px;color:#004040;"><b>{{$v['info']['title']}}</b></p>
											 	 	<p style="font-size:10px; margin-top:-10px;">By {{$v['info']['author']}}</p>
													
												</td>	  	
													
												<td class="text-danger">
													{{number_format($fines_rules * \Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now()), 2, '.', ',')}}
												</td>	  	
						  					</tr>
						  				<?php endif ?>
			  						 <?php endif ?>
			  					<?php endforeach ?>
			  				</tbody>
		 			 	  </tbody>
					  </table>
					
		 		</div>	
				
		 		<div class="col-md-12 text-right">
		 			 <p class="text-success" style="font-size: 13px;">Total Selected : <strong class="text-danger" style="font-size: 15px;">₱{{$fines}}</strong></p>
		 		</div>
		 		<div class="col-md-12 text-right">
					@if(floatval($fines) > 0)
						<button id="12" class="btn btn-flat btn-sm btn-success fines-botton-modal"><i class="fa fa-money"></i> Pay Fines</button>
					@endif
		 		</div>
		 		<div class="col-md-12" style="height:30px;"></div>
		 		<div class="modal fade" id="fines-modal">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-body">
	 						<!-- begin invoice -->
								<div class="invoice">
					                <div class="invoice-company">
					                    <span class="pull-right hidden-print">
					                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10 fines-botton-pay hidden" id="pay_fines_btn"><i class="fa fa-print m-r-5"></i>Pay Fines</a>
					                    </span>
					                    <span><img src="{{url('public/images/logo.fw.png')}}" height="25" width="50"> Vivlio Library System</span>
					                </div>
					                <div class="invoice-content">
					                    <div class="table-responsive" id="fines_list_table_container">
					                        
					                    </div>
										<div class="col-md-12" style="height:20px;"></div>
					                    <div class="invoice-price">
					                        <div class="invoice-price-left">
					                           
					                        </div>
					                        <div class="invoice-price-right" style="background: #004040;">
					                            <small>TOTAL</small> {{$fines}}
					                        </div>
					                    </div>
										
					                </div>
					                <div class="invoice-note">
					                    * Make all cheques payable to ACLC College of Butuan<br />
					                    * Payment is due within 30 days<br />
					                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
					                </div>
					                <div class="invoice-footer text-muted">
					                    <p class="text-center m-b-5 text-center">
					                        THANK YOU
					                    </p>
					                    <p class="text-center">
					                        <span class="m-r-10"><i class="fa fa-globe"></i> ACLC College Of Butuan</span>
					                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
					                        <span class="m-r-10"><i class="fa fa-envelope"></i> aclccollegeofbutuan@gmail.com</span>
					                    </p>
					                </div>
					            </div>
								<!-- end invoice -->
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	@elseif(($category =='overdue'))
		 		<div class="col-md-12" style="height: 20px;"></div>
		 		<div class="col-md-12 panel">
		 			<div class="col-md-12" style="height:10px;"></div>
		 			<h5 style="color:#004040;"><i class="fa fa-warning"></i> Overdue Transaction</h5>
			 		<table class="table table-bordered" id="fines_list_table">
		 			 	  <thead style="font-size:10px;">
		 			 	  	 	<th class="col-md-1">Penalty</th>
		  						<th class="col-md-4">Title</th>
		  						<th class="col-md-1">Action</th>
		 			 	  </thead>
		 			 	  <tbody>
			 			 	  	<tbody id="material_list_return">
			  					<?php foreach ($items as $key => $v): ?>
			  						<?php $due = Carbon\Carbon::parse($v['due_date']);?>
									<?php $loaned = Carbon\Carbon::parse($v['loaned_date']); ?>
			  						 <?php if ($v['returned'] == 0): ?>
			  						 	<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
			  						 		<tr>
												<td>
													<p>
														<?php if (!Carbon\Carbon::now()->between($due,$loaned)): ?>
															<strong class="text-danger">Penalty Day/s </strong>  ({{\Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now())}})
														<?php endif ?>
													</p>
												</td>	  	
												<td>
									 				<p style="font-size:11px;color:#004040;"><b>{{$v['info']['title']}}</b></p>
											 		<p style="font-size:10px; margin-top:-10px;">By {{$v['info']['author']}}</p>
													
												</td>	  	
													
												<td class="text-danger">
													{{number_format($fines_rules * \Carbon\Carbon::parse($due)->diffInDays(Carbon\Carbon::now()), 2, '.', ',')}}
												</td>	  	
						  					</tr>
						  				<?php endif ?>
			  						 <?php endif ?>
			  					<?php endforeach ?>
			  				</tbody>
		 			 	  </tbody>
		 			 </table>
		 		</div>
		 	@else
	        <div class="">
				<div class="col-md-12" style="border-bottom:1px dashed #004040;"></div>
				<div class="col-md-12" style="height:15px;"></div>
				<div class="col-md-12 ui-sortable" style="padding:0;">
				<div class="col-md-6 pull-right">
					<div class="input-group">
                    	<input class="form-control" id="search_book" type="text" autofocus="true" style="" placeholder="Search Book">
                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
	                </div>
				</div>
	    	     	 <div class="panel panel-default">
		    	 	 	  <div class="panel-heading">
		    	 	 	  	  <h4 class="panel-title"><i class="fa fa-book"></i> Items</h4>
		    	 	 	  </div>	
				    	  <div class="panel-body" style="max-height:700px; overflow:auto;">
				    	  <div class="col-md-12" style="height:13px;"></div>
				    	  <div class="col-md-12 hidden" style="">
	    	  				 <p class="pull-right">Transaction Date : <font class="text-success">July 20, 2017</font></p>
	 	 	  	  			<p class="pull-left">Transaction Code : <font style="font-size:16px; color:#004040;">VIV-{{$code}}-{{\Carbon\Carbon::now()->year}}</font></p>
	    	  			</div>	
			    	  	<div class="col-md-12 hidden">
			  					<h3 style="color:#004040;">No Items Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the items (<span class="text-success">Book, Newspaper</span>)</small>
			  				</div>
		    	  			<div id="container_item" class="col-md-12" style="min-height:100px; padding:0!important;">
		    	  				<div class="">
		    	  					<h3 style="color:#004040;">No Item</h3>
		    	  					<small class="text-muted">Use Barcode to get the data of the item (name, accession, author)</small>
		    	  				</div>
		    	  			</div>
				    	 </div>
				    	 <div class="col-md-12">
				    	 	<h5>Item List
				    	 		<p class="pull-right" id="due_date">
				    	 			<div class="col-md-12" style="height:20px;"></div>
				    	 			<div class="form-group hidden">
				    	 				<label><i class="fa fa-calendar"></i> DUE DATE:</label>
				    	 				<input type="date" name="" id="input" class="form-control" value="" required="required" title="">
				    	 			</div>
				    	 		</p>
				    	 	</h5> 
				    	 	<div class="col-md-12" id="containerItem" style="padding: 0;">
				    	 		<table class="table table-bordered table-hover" id="list-borrow-item">
			    	  				<thead>
			    	  					<tr>
			    	  						<th class="col-md-6">Name</th>
			    	  						<th class="col-md-5">Accession No.</th>
			    	  						<th class="col-md-1">Action</th>
			    	  					</tr>
			    	  				</thead>
			    	  				<tbody id="material_list">
			    	  				</tbody>
			    	  			</table>
				    	 	</div>
				    	 </div>
				    	 <div class="col-md-12">
				    	 	 <p class="pull-right"> <button class="btn btn-flat btn-md btn-success" id="save_patron_items"><i class="fa fa-floppy-o fa-1x"></i></button></p>
				    	 </div>
					</div>
	    	     </div>
			</div>
		 	@endif
	 	 </div>
	 	 <div class="col-md-6 class_trans_{{$code}}" id="transact_loan_container_{{$code}}">
	 	 	 <div class="col-md-12" style="height: 200px;"></div>
	 	 	 <div class="col-md-12"  style="height: 200px;">
	 	 	 	 <center>
					<i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color:#004040;" aria-hidden="true"></i>
					<span class="sr-only">Saving. Hang tight!</span>
	 	 		 </center>
	 	 	</div>
	 	 	 <div class="col-md-12" style="height: 200px;"></div>
	 	 </div>
	 </div>
</div>
<script type="text/javascript">
	$(document).ready(function(e){
		borrowLimit = "{{$borrowLimit}}";
		totalUnreturned = "{{$totalUnreturned}}";
		patron_id.id = {{$patron_id}};
		$('#search_book').focus();
		var category = "{{$category}}";
		if(category === 'loan'){
			patron_id.loan = {{$patron_id}};
		}
		load_transaction_details({{$patron_id}},category);
		@if($category == 'renewal')
			$('.list-renew-item').DataTable({
				"lengthMenu": [5, 10, 20, 30, 100],
			});
		@elseif($category == 'reserved')
			fetchCatalogue({{$patron_id}});
		
		@endif
	});
	function load_transaction_details(ID,CATEGORY){
		var url = 'getTransactionDetails';
		code = '{{$code}}';
		var data = {_token:"{{csrf_token()}}",_patron_id:ID, _category:CATEGORY};
		var posting = $.post(url,data);
			posting.done(function(data){
				$('#transact_loan_container_'+code).html(data);
			});
	}
</script>
@endif