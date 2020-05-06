@extends('layouts.app')
@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/plugins/contextMenu/contextMenu.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />


	<style type="text/css">
		 .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important;border-color:#004040!important;}
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		#tbl-catalog-records_filter>{
			display: none;
		}
		#tbl-catalog-records tr{
	    	cursor: pointer;
	    }
	    #tbl-cataglog-records tr:hover{
	    	background: gray;
	    }
	    .ui-menu .ui-menu-item a{
	    	padding: 5px;
		    color:#004040;
		    font-size: 15px;
		    font-family: open-sans-regular;
		    cursor: pointer;
		}
		.iw-mSelected{
			background:#004040;
			color:white;
			padding: 20px;
		}
		.ui-state-active,
		.ui-widget-content .ui-state-active,
		.ui-widget-header .ui-state-active, 
		.ui-autocomplete, .ui-autocomplete:hover, 
		.ui-menu-item, .ui-menu-item:hover,
		.ui-menu-item a, .ui-menu-item a:hover,
		.ui-widget-content .ui-state-focus,
		.ui-widget-header .ui-state-focus,
		.ui-widget-content .ui-state-hover,
		.ui-widget-header .ui-state-hover,
		.ui-menu .ui-menu-item a.ui-state-focus,
		.ui-menu .ui-menu-item a.ui-state-active,
		.ui-menu .ui-menu-item a
		{ background: #ffffff none no-repeat; 
		  border-color: #ffffff;
		}
	</style>
@endsection
@section('content')
<!-- begin #content -->
<?php static $counter = 1;?>
<div id="content" style="margin-left: 91px!important;">
	<div class="col-md-12" style="height: 20px;"></div>
	<div class="col-md-12">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#cir_loan" data-toggle="tab" category="loan"><img src="{{url('public/images/icons/3rdbar/circulation/loan.fw.png')}}" height="20px;" width="20px;"> Loan</a></li>
				<li><a href="#cir_return" data-toggle="tab" category="return"><img src="{{url('public/images/icons/3rdbar/circulation/return.fw.png')}}" height="20px;" width="20px;"> Return</a></li>
				<li><a href="#cir_renewal" data-toggle="tab" category="renewal"><img src="{{url('public/images/icons/3rdbar/circulation/renewal.fw.png')}}" height="20px;" width="20px;"> Renewal</a></li>
				<li><a href="#cir_reserved" data-toggle="tab" category="reserved"><img src="{{url('public/images/icons/3rdbar/circulation/hold_reserve.fw.png')}}" height="20px;" width="20px;"> Hold Reserved</a></li>
				<li><a href="#cir_fines" data-toggle="tab" category="fines"><img src="{{url('public/images/icons/3rdbar/circulation/fines.fw.png')}}" height="20px;" width="20px;"> Fines</a></li>
				<li><a href="#cir_overdue" data-toggle="tab" category="overdue"><img src="{{url('public/images/icons/3rdbar/circulation/overdue.fw.png')}}" height="20px;" width="20px;"> Overdue</a></li>
			</ul>
		</div>
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane fade active in" id="cir_loan">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="loan" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="cir_return">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="return" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron_return">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="cir_renewal">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="renewal" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron_renewal">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="cir_reserved">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="reserved" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron_reserved">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="cir_fines">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="fines" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron_fines">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="cir_overdue">
					<div class="row">
						<div class="col-md-3">
							<p class="text-success"><i class="fa fa-user"></i> Patron Information</p>
						</div>
						<div class="col-md-3 pull-right">
							<div class="input-group">
		                    	<input class="form-control search_borrow_patron" category="overdue" type="text" autofocus="true" style="" placeholder="Search Patron">
		                    	<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
			                </div>
						</div>
						<div id="container_patron_overdue">
							<div class="col-md-12 text-center" style="padding:40px;">
								 <img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
							</div>
							<div class="col-md-12">
			  					<h3 style="color:#004040;">No Patron Selected</h3>
			  					<small class="text-muted">Use Barcode to get the data of the patron (<span class="text-success">Patron name, fines etc.</span>)</small>
			  				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal modal-sm fade" id="modal-item-list">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body" style="width:200px;">
							<div class="" id="modal_item_container">
								<p><img class="img img-responsive" height="50px;" width="50px;" src="{{asset('public/images/logo.fw.png')}}"> Save change ?</p>
								<p style="padding: auto;">
									<button class="btn btn-success btn-flat btn-sm" id="save_patron_items1" patron_id=""><i class="fa fa-check"></i> Save</button>
									<button class="btn btn-danger btn-flat btn-sm" id="cancel_trans_loan"><i class="fa fa-times"></i> Cancel</button>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('custom_js')
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('public/_color/plugins/contextMenu/contextMenu.js')}}"></script>
	<script src="{{asset('public/_color/plugins/jqueryAutoComplete/jquery.autocomplete.js')}}"></script>
	<script type="text/javascript">
		var patron_id = new Object();
		var borrowLimit = '';
		var totalUnreturned = '';
		var totalOrder = 0;
		var itemList = [];
		var code = '';
		var material_id = '';
		var category = '';
		var barcode = '';
		$(document).ready(function(e){
			autoTrigger();
			$(document).on('change','.search_borrow_patron',function(e){
				var el = '<div class="col-md-12 text-center" style="padding-top:5%; padding-bottom:5%;"><i class="fa fa-spinner fa-pulse fa-4x fa-fw" style="color:#004040;" aria-hidden="true"></i><span class="sr-only">Saving. Hang tight!</span></div>';
				e.preventDefault();
				category = $(this).attr('category');
				barcode = $(this).val();
				if(!hasWhiteSpace(barcode)){
					var url = 'getPatronByBarcode';
					var data = {_token:"{{csrf_token()}}",_barcode:barcode,option:"borrow",_category:category}
					var posting = $.post(url,data);
						if(category === 'loan'){
							
							$('#container_patron').html(el);
							posting.done(function(data){
								$('#container_patron').html(data);
								$('.search_borrow_patron').val('');
							});
						}else{
							if(category === 'return'){
								$('#container_patron_return').html(el)
								posting.done(function(data){
									$('#container_patron_return').html(data);
									$('.search_borrow_patron').val('');
								});
							}else{
								if(category === 'renewal'){
									$('#container_patron_renewal').html(el)
									posting.done(function(data){
										$('#container_patron_renewal').html(data);
										$('.search_borrow_patron').val('');
									});
								}else{
									if(category == 'reserved'){
										$('#container_patron_reserved').html(el)
										posting.done(function(data){
											$('#container_patron_reserved').html(data);
											$('.search_borrow_patron').val('');
										});
									}else{
										if(category == 'fines'){
											$('#container_patron_fines').html(el)
											posting.done(function(data){
												$('#container_patron_fines').html(data);
												$('.search_borrow_patron').val('');
											});
										}else{
											if(category == 'overdue'){
												$('#container_patron_overdue').html(el)
												posting.done(function(data){
													$('#container_patron_overdue').html(data);
													$('.search_borrow_patron').val('');
												});
											}else{
												
											}
										}
									}
								}
							}
						}
				}else{
					$('#search_book').val('');
				}
			});
			$(document).on('change','#search_book',function(e){
				e.preventDefault();
				var barcode = $(this).val();
				var url = 'getItemByBarcode';
				var data = {_token:"{{csrf_token()}}",_barcode:barcode,option:"borrow", _list:itemList}
				var posting = $.post(url,data);
					$('#container_item').html('<div class="col-md-12 text-center" style="padding-top:5%; padding-bottom:5%;"><i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="color:#004040;" aria-hidden="true"></i><span class="sr-only">Saving. Hang tight!</span></div>')
					posting.done(function(data){
						$('#container_item').html(data);
						$('#search_book').val('');
					});
			});
			var f_counter_item = 0;
			$(document).on('click','.fines-botton-modal',function(e){
				f_counter_item = 0;
				
				var table = $('#fines_list_table').clone();
				if(!$('.fines-botton-pay').hasClass('hidden')){
					$('.fines-botton-pay').addClass('hidden');
				}
				table.addClass('fines_modal_table_');
				$.each($(table.find('tbody')[1]).find('tr'),function(index,value){
					$(value).append('<td id="fines-remarks-container-td-'+$(value).attr('loan-id')+'"><p class="text-danger bold"><strong>Remarks <p id="remarks_msg'+$(value).attr('loan-id')+'"></p> </strong></p><div class="form-group">'+
									'<label for=""></label>'+
									'<textarea class="form-control"  id="fines_remarks_'+$(value).attr('loan-id')+'" rows="3"></textarea>'+
									'</div>'+
									'<p class="text-right"><button loan-id="'+$(value).attr('loan-id')+'" class="btn btn-flat btn-xs btn-success fines-btn-remarks"><i class="fa fa-check"></i> save remarks</button></p></td>');
					$(value).attr('id','fines-remarks-container-'+$(value).attr('loan-id'));
					f_counter_item++;
				});
				$('#fines_list_table_container').html(table);
				$('')
				$('#fines-modal').modal('show');
			});
			$(document).on('click','.fines-btn-remarks',function(e){
				e.preventDefault();
				var loan_id = $(this).attr('loan-id');
				if($('#fines_remarks_'+loan_id).val() === ''){
					$('#remarks_msg'+loan_id).html('Add some Remarks what happen and why this item not returned');
				}else{
					$('#fines-remarks-container-'+loan_id).attr('remarks-msg',$('#fines_remarks_'+loan_id).val());
					$('#fines-remarks-container-td-'+loan_id).html('<p class="text-center"><i class="fa fa-check fa-3x text-success"></i></p>')
					if(--f_counter_item === 0){
						if($('.fines-botton-pay').hasClass('hidden')){
							$('.fines-botton-pay').removeClass('hidden');
						}
					}
				}
			});
			$(document).on('click','#pay_fines_btn',function(e){
				e.preventDefault();
				var primary_data = [];
				table = $('.fines_modal_table_');
				$.each($(table.find('tbody')[1]).find('tr'),function(index,value){
					primary_data.push({acc_num:$(value).attr('acc-num'), loan_id:$(value).attr('loan-id'),patron_id:$(value).attr('patron-id'),amount:$(value).attr('amount'),remarks:$(value).attr('remarks-msg')});
				});
				var url = 'payFines';
				var data = {_token:"{{csrf_token()}}",primary_data};
				var posting = $.post(url,data);
					posting.done(function(data){
						$('#fines_modal').modal('hide');
						$('.modal-backdrop').hide();
						$(".search_borrow_patron[category='fines']").val(barcode).trigger('change');
						
					});
			});
			$(document).on('click','.btn-item-add',function(e){
				var totalCount = (parseInt(borrowLimit)-parseInt(totalUnreturned));
				var el = '<tr class="" id="'+$(this).attr('acc-num')+'">'
	  						+'<td><span class="" style="color:#004040;">'+$(this).attr('item-name')+'</span></td>'
		  					+'<td><span class="text-success">'+$(this).attr('item-accession')+'</span></td>'
		  					+'<td><button class="btn btn-flat btn-danger btn-xs remove-item"><i class="fa fa-trash"></i></button></td>'
	  					+'</tr>';
	  			console.log(totalOrder+">="+totalCount);
				if((totalOrder >= (totalCount)) || (totalOrder >= (borrowLimit))){
					$('#itemBtnContainer').html('<p class="text-success" >Reach the limit</p>');
				}else{
					itemList.push($(this).attr('acc-num')); 
		  			$('#itemBtnContainer').html('<i class="fa fa-check fa-2x text-success"></i>')
					$('#material_list').append(el);
					totalOrder++;
				}
				$('#search_book').focus();
			});
			$(document).on('click','.remove-item',function(e){
				e.preventDefault(); 
				var row  = $(this).closest('tr');
				var removedItem = $(this).closest('tr').attr('id');
				itemList = jQuery.grep(itemList, function(value) {
				  return value != removedItem;
				});
				row.remove();
				$('#containerItem').html($('#list-borrow-item').clone());
				$('#search_book').focus();
			});
			$(document).on('click','#save_patron_items',function(e){
				 $('#modal-item-list').css('width', '165px');
   				 $('#modal-item-list').css('margin', '50px auto 50px auto');
				 $('#modal-item-list').modal('show');
			});
			$(document).on('click','#cancel_trans_loan',function(e){
				$('#modal-item-list').modal('hide');
				$('#search_book').focus();
			});
			$(document).on('click','#save_patron_items1',function(e){
				var url = 'saveLoanItem';
				var data = {_token:"{{csrf_token()}}",_list:itemList,_patron:patron_id.loan, request:"loan"}
				var posting = $.post(url,data);
					posting.done(function(data){
						$('#modal_item_container').html('<p></p>')
						$('#modal-item-list').modal('hide');
						$('#modal-item-list').on('hidden.bs.modal',function(e){
							$(".search_borrow_patron[category='loan']").val(barcode).trigger('change');
						});
					});
			});
			
			$(document).on('click','.ret_btn',function(e){
				addBTN($(this),'<div style="min-width:50px;"><p>Are you Sure ? </p><button class="btn btn-success btn-xs btn-flat conf_btn_accept" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-check"></i></button> <button class="btn btn-danger btn-xs btn-flat conf_btn_cancel" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-times"></i></button></div>');
			});
			$(document).on('click','.conf_btn_cancel',function(e){
				addBTN($(this),'<button class="btn btn-success btn-xs btn-flat ret_btn" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-refresh"></i> Return</button>');
			});
			$(document).on('click','.conf_btn_renew',function(e){
				addBTN($(this),'<button class="btn btn-success btn-xs btn-flat ret_btn" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-refresh"></i> Renew</button>');
			});
			$(document).on('click','.btn-renewal',function(e){
				e.preventDefault();
				$('#modal_renewal').modal('show');
			})
			$(document).on('click','.conf_btn_accept',function(e){
				var url = 'edit';
				var button = $(this);
				var data = {_token:"{{csrf_token()}}",_acc_num:$(this).attr('item-id'), _patron_id:$(this).attr('patron-id'),_option:"borrow_return"};
				var posting = $.post(url,data);
					posting.done(function(data){
						if(data === "1"){
							button.closest('tr').remove();
							load_transaction_details(patron_id.id,'return');
						}
					})
			});
			$(document).on('click','#btn-transaction-reserve',function(e){
				e.preventDefault();
				$('#material-reserve-container').html('');
				$('#btn-reserve-save').attr('catalogue-id',$(this).attr('catalogue-id'));
				$('#btn-reserve-save').attr('patron-id',$(this).attr('patron-id'));
				var el = $('#material-reserve-details').clone().css('background','#f9f9f9')
														.css('padding','10px')
				el.find('#btn-transaction-reserve').remove();
				el.appendTo('#material-reserve-container');
				$('#reserve-modal').modal('show');
			});
			$(document).on('click','#reserve-tab-btn',function(e){
				e.preventDefault();
				$('a[href="#cir_reserved"]').trigger('click');
				$(".search_borrow_patron[category='reserved']").val(barcode).trigger('change');
			});
			$(document).on('click','.conf_renew_accept',function(e){
				e.preventDefault();
				var row  = $(this).closest('tr');
				var url = 'saveRenewItem';
				var data = {_token:"{{csrf_token()}}",_acc_num:$(this).attr('item-id'), _patron_id:$(this).attr('patron-id')}
				var posting = $.post(url,data);
					posting.done(function(data){
						row.remove();
					})
			});
			$(document).on('click','#renewal_Btn',function(e){
				e.preventDefault();
				addBTN($(this),'<div style="min-width:50px;"><p>Are you Sure ? </p><button class="btn btn-success btn-xs btn-flat conf_renew_accept" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-check"></i></button> <button class="btn btn-danger btn-xs btn-flat conf_btn_renew" item-id="'+$(this).attr('item-id')+'" patron-id="'+$(this).attr('patron-id')+'"><i class="fa fa-times"></i></button></div>');
			});
			$(document).on('submit', '#form-reserve', function(e){
				e.preventDefault();
				var url = 'saveReserveItem';
				var posting = $.post(url,{_token:"{{csrf_token()}}",_reserve_priority:$('#_reserve_priority').val(),_reserve_date:$('#_reserve_date').val(), _patron_id:$('#btn-reserve-save').attr('patron-id'),_catalogue_id:$('#btn-reserve-save').attr('catalogue-id'),_reserve_remarks:$('#reserve_remarks').val()});
					posting.done(function(data){
						refreshReservationTransaction();
						load_transaction_details(patron_id.id,category);
					});
			});
			$('#tbl-catalog-records tbody').on( 'click', 'tr', function () {
		        if ( $(this).hasClass('selected') ) {
		            $(this).removeClass('selected');
		            toggle_action_buttons(false);
		            tbl_add_copies.clear().draw();
		        }
		        else {
		            table.$('tr.selected').removeClass('selected');
		            $(this).addClass('selected');
		            toggle_action_buttons(true);
		            tbl_add_copies.clear().draw();
		            var idx = table.cell('.selected', 0).index();
					var data = table.row( idx.row ).data();
					var id = data.catalogue_id;
	                
		        }
   			});
			$(document).on('change','.search_reserve_item',function(e){
				e.preventDefault();
					var text = $(this);
					var url = "checkItem";
					var posting = $.post(url,{_token:"{{csrf_token()}}", _barcode:$(this).val(), _catalogue_id:$(this).attr("catalogue-id")});
						posting.done(function(data){
							var btn = $('.reserve_start_borrow')
							if(data === '0'){
								$('#reserve_item_value').html('<span>Invalid Barcode ('+text.val()+')</span><span><small style="margin-top:50px;">Your barcode is either not available or not exist</small></span>');
								if(!btn.hasClass('hidden')){
									btn.addClass('hidden');
								}
							}else if(data === '1'){
								var totalCount = (parseInt(borrowLimit)-parseInt(totalUnreturned));
								$('#reserve_item_value').html("<small style='margin-top:20px;'>Ready To Borrow</small>"+text.val()+" <i class='fa fa-check text-white'>");
								if(totalCount == 0){
									$('.reserve_start_borrow').html('<strong class="text-danger">Reach The Available Limit of Borrowing</strong>');
									$('.reserve_start_borrow').removeClass('hidden');
								}else{
									if(btn.hasClass('hidden')){
										btn.attr('patron-id',patron_id.id);
										btn.attr('barcode',text.val());
										btn.removeClass('hidden');
										
									}
								}
								
							}
							text.val('');
						});
				
			});
			
			$(document).on('submit','.reserve_start_borrow',function(e){
				e.preventDefault();
				var url = 'saveLoanItem';
				var data = {_token:"{{csrf_token()}}",_barcode:$(this).attr('barcode') ,_patron:patron_id.id, request:"reserve", reserve_id:$(this).attr('reserve-id')}
				var posting = $.post(url,data);
					posting.done(function(data){
						$('#reserved-modal-id').modal('hide');
						$('#reserved-modal-id').on('hidden.bs.modal',function(e){
							$(".search_borrow_patron[category='reserved']").val(barcode).trigger('change');
						});
					});
			});
		});
		function refreshReservationTransaction(){
			$('#_reserve_priority, #_reserve_date, #reserve_remarks, #autocomplete-materials').val('');
			$('#container-reserve-details').html('');
			$('#reserve-modal').modal('hide');
		}
		function fetchCatalogue(id){
			$.ui.autocomplete.prototype._renderItem = function (ul, item) {
			    return $("<li></li>")
			      .data("item.autocomplete", item)
			      .append($("<a></a>").html(item.value))
			      .appendTo(ul);
			}			
			var list_templates = [];
			var posting = $.post("{{url('/technical/populate')}}",{_token:"{{csrf_token()}}"});
				posting.done(function(data){
					$.each(data,function(index){
						$.each(data[index],function(i,v){
							var templates = {};
							templates.patron_id = id;
							templates.data = v.catalogue_id;
							templates.value = v.title + '<p class="text-danger" style="font-size:10px;"><strong>'+v.author+'</strong></p>';
							templates.label = v.title;
							list_templates.push(templates);
						});
					});
					$('#autocomplete-materials').autocomplete({
						minLength: 0,
      					source: list_templates,
				      	select: function( event, ui ) {
					     	$( "#autocomplete-materials" ).val( ui.item.label );
					     	var posting = $.post("{{url('/circulation/getMaterialReservationDetails')}}",{_token:"{{csrf_token()}}", catalogue_id:ui.item.data, patron_id:ui.item.patron_id})
					     		$('#container-reserve-details').html('<div class="col-md-12 text-center" style="padding-top:5%; padding-bottom:5%;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw" style="color:#004040;" aria-hidden="true"></i><span class="sr-only">Saving. Hang tight!</span></div>');
					     		posting.done(function(data){
					     			$('#container-reserve-details').html(data);
					     		});
					        return false;
					      }
					});
				});
			}
			function addBTN(el,cont){
				el.closest('p').html(cont);
			}
			function hasWhiteSpace(s) {
			  return s.indexOf(' ') >= 0;
		}
		/*optional*/
		function autoTrigger(){
			$(document).on('click','.nav-pills>li>a',function(e){
   				if(barcode != ''){
					var cat = $(this).attr('category');
					$(".search_borrow_patron[category='"+cat+"']").val(barcode).trigger('change');
				}

			});
		}
		/*patron_co_return
		patron_co_overdue*/
		function load_count(_loan,_return,_overdue){
			$('#patron_co_loan_'+code).html(_loan);
			$('#patron_co_return_'+code).html(_return);
			$('#patron_co_overdue_'+code).html(_overdue);
		}
		function load_fines(){
			$('#fines_d_'+code).html();
		}

	</script>
@endsection

