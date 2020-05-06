@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/bootstrap-datepicker/css/datepicker.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/DataTables/extensions/Scroller/css/scroller.bootstrap.min.css')}}" rel="stylesheet" />

	<style type="text/css">
		@media print {
		    html, body {
		        height: auto;    
		    }
		}
		.dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, .dataTables_wrapper table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before{
			background: #004040;
		}
		.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important;border-color:#004040!important;}
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		div.dt-buttons{
			position:absolute;
			right: 220px;
		}
		.dt-button{
			margin-right:20px;
		}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="col-md-12 panel panel-default">
		<div class="panel-heading">
			<div class="col-md-1">
				<small class="text-muted"><strong style="font-size:11px">Commands</strong></small>
				<span class="text-muted" style="font-size:11px">Year <span class="date_ text-success">*.*</span></span>
			</div>
			<div class="col-md-2">
				<small class="text-success">Year</small>
				<select name="" id="select-year" class="form-control" required="required">
					 <option>-select-</option>
                     <?php for($x = 4; $x>0;$x--){?>
                       <option>{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}</option>
                     <?php }?>
				</select>
			</div>
			<div class="col-md-2">
				<small class="text-success">Month</small>	
				<select name="" id="select-mnt" class="form-control" required="required">
					<option value="">-select-</option>
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
			<div class="col-md-5">
				<small class="text-success">Date From and To</small>
				<div class="col-md-12">
					<div class="input-group input-daterange">
						<input type="text" class="form-control date_range_input" id="date_range_start" name="start" placeholder="Date Start" />
						<span class="input-group-addon"><small class="text-success">to</small></span>
						<input type="text" class="form-control date_range_input" id="date_range_end" name="end" placeholder="Date End" />
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<small class="text-success">Other specification</small>
				<div class="col-md-12" style="padding:0;">
					<div class="input-group">
						<input type="text" class="form-control" name="start" placeholder="Other" />
						<span class="input-group-addon"><small class="text-success">Search</small></span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row" >
				<div class="col-md-12" style="border-top:1px dashed gray; margin-top:13px;">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5">
						                <small class="text-success">Date From and To</small>
										<div class="col-md-12">
											<span style="font-size:19px;">*.*</span>
										</div>
									</div>
									<div class="col-md-3">
						                <small class="text-success">Academic Year</small>
										<div class="col-md-12">
											<span style="font-size:19px;">*.*</span>
										</div>
									</div>
								</div>
							</div>
						  	<div class="row">
						  	     <div class="col-md-12" style="height:10px;"></div>
						  		 <div class="col-md-12" style="min-width:300px; overflow:auto;">
						  		 	 <table class="table table-striped table-hover" id="borrow-table" style="">
						  		 	 	<thead>
						  		 	 		<tr>
						  		 	 			<th class="">Patron_ID</th>
						  		 	 			<th class="">Account Number</th>
						  		 	 			<th class="">Due Date</th>
						  		 	 			<th class="">Loaned</th>
						  		 	 			<th class="">Returned</th>
						  		 	 		</tr>
						  		 	 	</thead>
						  		 	 	<tbody>
						  		 	 	</tbody>
						  		 	 </table>
						  		 </div>
						  		 <div class="col-md-12">
						  		 	 <div class="col-md-3">
						  		 	 	 <span class="text-muted"> PATRON TOTAL : <span class="text-success" id="total_patron"></span></span>
						  		 	 </div>
						  		 	  <div class="col-md-3">
						  		 	 	 <span class="text-muted"> TOTAL VISIT: <span class="text-success" id="total_visit"></span></span>
						  		 	 </div>
						  		 	 <div class="col-md-3">
						  		 	 	 <span class="text-muted"> AVERAGE VISIT: <span class="text-success" id="total_average"></span></span>
						  		 	 </div>
						  		 </div>
						  	</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-12" style="height:50px;"></div>
							<div class="row">
								<div class="col-md-12">
									 <div id="success-graph" style="height:200px;"></div>
								</div>
								<div class="col-md-12" style="margin-top:15px;">
									 <div id="legend-container-graph"></div>
									 <div class="col-md-12" style="height:10px;"></div>
									 <div class="col-md-12">
									 	<h5>Legend : </h5>
									 	<div class="col-md-3"><span><small>[1] => CBA</small></span></div>
									 	<div class="col-md-3"><span><small>[2] => BSIT</small></span></div>
									 	<div class="col-md-3"><span><small>[3] => BSBA</small></span></div>
									 	<div class="col-md-3"><span><small>[4] => BSCS</small></span></div>
									 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
@endsection

@section('custom_scripts')
	<script src="{{asset('public/_color/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('public/_color/plugins/bootstrap-daterangepicker/moment.js')}}"></script>
    <script src="{{asset('public/_color/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('public/_color/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/_color/plugins/DataTables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>



	<script type="text/javascript">
		$(document).ready(function(e){
			$(".input-daterange").datepicker({
					dateFormat: 'YYYY-MM-DD h:m:s'
			});
			fetch_borrow()
			{{--  init_details('patron');  --}}
			{{--  init_graph();  --}}

			$(document).on('change','#select-year',function(e){
				e.preventDefault();
				var url = "{{url('report/fetch_data_by_date')}}";
				var posting = $.post(url,{_token:"{{csrf_token()}}",yr:$(this).val(),mnt:"",category:"borrow"});
					posting.done(function(data){
						createDataTable($('table#borrow-table'),'Borrow Information','fetch_patron',JSON.parse(data));
					});
			})
			$(document).on('change','#select-mnt',function(e){
				e.preventDefault();
				var url = "{{url('report/fetch_data_by_date')}}";
				var posting = $.post(url,{_token:"{{csrf_token()}}",yr:$('#select-year').val(),mnt:$(this).val(),category:"borrow"});
					posting.done(function(data){
						createDataTable($('table#borrow-table'),'Borrow Information','fetch_patron',JSON.parse(data));
					});
			})
			$(document).on('blur','.date_range_input',function(e){
				e.preventDefault();
				if(($('input[name=start]').val()!= '')&& ($('input[name=end]').val()!= '')){
					var url = "{{url('report/fetch_data_by_range')}}";
					var data = {_token:"{{csrf_token()}}",start:$('input[name=start]').val(),end:$('input[name=end]').val(),category:'patron'};
					var posting = $.post(url,data);
						posting.done(function(data){
							createDataTable($('table#borrow-table'),'Borrow Information','fetch_patron',JSON.parse(data));
						})
				}
			});
		});
	    function init_details(category){
	    	var url = "report/fetch/p_details";
	    	var posting = $.post(url,{_token:"{{csrf_token()}}",_category:category});
				posting.done(function(data){
					var a = JSON.parse(data);
					$('#total_patron').text(a.total_patron);
					$('#total_average').text(a.average.toFixed(2));
					$('#total_visit').text(a.total_visit);
				});
	    }
	   {{--   function init_graph(){
	    	var datasets = [{
			    "label": "Enrolled ",
			    "data": [[0,2],[1,6],[2,1],[3,1]],
			    "color":"#006666",
			    "bars": {
			      "borderWidth": 0.5,
			      "order": 1,
			    }
			  }, {
			    "label": "Visit",
			    "data": [[0,3],[1,2],[2,2],[3,2]],
			    "color":"#00B2B2",
			    "bars": {
			      "borderWidth": 0.5,
			      "order": 2,
			    }
			  var options = {
			    "series": {
			      "lines": {
			  }, {
			    "label": "Average",
			    "data": [[0,1],[1,3],[2,3],[3,3]],
			    "color":"#00D9A3",
			    "bars": {
			      "borderWidth": 0.5,
			      "order": 3
			    },
			  }];
			        "show": false,
			        "fill": true,
			        "steps": false
			      },
			      "bars": {
			        "show": true,
			        "fill": 1,
			        "align": "left",
			        "barWidth":0.33,	
			        "lineWidth": 0
			      }
			    },
			    "xaxis": {
			      "ticks": [
			        [0, "1"],
			        [1, "2"],
			        [2, "3"],
			        [3, "4"],
			        [4, "5"]
			      ]
			    },
			    "yaxis": {
			      "min": 0,
			      "tickDecimals": 0,
			      "minTickSize": 10
			    },
			    "grid": {
			      "clickable": true,
			      "hoverable": true
			    },
			    "legend": {
			      "noColumns": 3,
			      "container": '#legend-container-graph'
			    },
			    grid: {
	                hoverable: true, clickable: true, tickColor: "#ccc", borderWidth: 1, borderColor: "#ddd"
	            },
			  };
			  $.plot($("#success-graph"), datasets, options);
		}  --}}
		function fetch_borrow(){
			var url = "{{url('/report/fetch/borrow')}}";
			var posting = $.post(url,{_token:"{{csrf_token()}}"});
				posting.done(function(data){
					createDataTable($('table#borrow-table'),'Patron Information','fetch_patron',JSON.parse(data));
				});
		}
		function createDataTable(ELEMENT,MESSAGE,URL,DATA){
				ELEMENT.DataTable({
					destroy:true,
					"lengthMenu": [[5, 10 -1], [5, 10, "All"]],
					data:DATA,
			        deferRender:"true",
			        responsive: true,
					columns:[
						{"data" : "patron_id", 
								render : function(id){
									return '<span class="text-success">'+id+'</span>'
								}},
						{"data" : "acc_num"},
						{"data" : "due_date",
								render : function(id){
									return '<span class="text-success">'+id+'</span>'
								}},
						{"data" : "loaned"
							},
						{"data" : "returned",
								render : function(id){
									return '<span class="text-success">'+id+'</span>'
								}},
					],
					dom: 'Bfrtip',
		              buttons: [{
				              extend: 'print',
				               customize: function ( 	 ) {
				                    $(win.document.body)
				                        .css( 'font-size', '10pt' )
				                        .prepend(
				                            ['<img src="{{url("public/images/logo.fw.png")}}" style="position:absolute; top:20; left:0;" />','']
				                        );
				                    $(win.document.body).find('table').addClass('display').css('font-size', '9px');
				                    $(win.document.body).find( 'table' )
				                        .addClass( 'compact' )
				                        .css( 'font-size', 'inherit' );
				                    $(win.document.body).find('h1').css('text-align','center').css('font-size','20px').text(MESSAGE);
				              },
				              message:'',
				              text:      '<i class="fa fa-print" ></i>',
				              // titleAttr: 'print',
				              className:'btn btn-sm btn-success text-white',
				              exportOptions: {
				                             	columns: ':visible	' 
				                             }
				          },
				      ]
				});
			}
	</script>
@endsection