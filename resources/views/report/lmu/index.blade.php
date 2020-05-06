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
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
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
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12 panel panel-default">
				<div class="panel-heading"></div>
				<div class="panel-body">
					<h5><i class="fa fa-line-chart"></i> <span style="color:#004040;">LMU Statistical Report</span></h5>
					<div class="col-md-1">
						<small class="text-muted"><strong style="font-size:11px">Commands</strong></small>
						<span class="text-muted" style="font-size:11px">Year <span class="date_ text-success">*.*</span></span>
					</div>
					<div class="col-md-2">
						<small class="text-success">Year</small>
						<select name="" id="select-year" class="form-control" required="required">
							<option value="{{(date('Y', strtotime(\Carbon\Carbon::now())))}}">-select-</option>
							<?php for($x = 4; $x>0;$x--){?>
							<option value="{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}">{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}</option>
							<?php }?>
						</select>
					</div>
					<div class="col-md-2">
						<small class="text-success">Month</small>	
						<select name="" id="select-mnt" class="form-control" required="required">
							<option value="">-select-</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
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
					<div class="col-md-12">
						<table class="table table-bordered" id="lmu-table">
							<thead>
								<tr>
									<th class="">ACC_NUM</th>
									<th class="">BARCODE</th>
									<th class="">TITLE</th>
									<th class="">TOTAL LOANED</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
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
			fetch_lmu();
			loadEvents();
		});
		function loadEvents(){
			$(document).on('change','#select-year',function(e){
				e.preventDefault();
				var url = "{{url('report/fetch_data_by_date')}}";
				var posting = $.post(url,{_token:"{{csrf_token()}}",yr:$(this).val(),mnt:"",category:"lmu"});
					posting.done(function(data){
						createDataTable($('#lmu-table'),'LMU Information','fetch_patron',data);
					});
			});
			$(document).on('change','#select-mnt',function(e){
				e.preventDefault();
				var url = "{{url('report/fetch_data_by_date')}}";
				var posting = $.post(url,{_token:"{{csrf_token()}}",yr:$('#select-year').val(),mnt:$(this).val(),category:'lmu'});
					posting.done(function(data){
						createDataTable($('#lmu-table'),'LMU Information','fetch_patron',data);
					});
			});
			$(document).on('blur','.date_range_input',function(e){
				e.preventDefault();
				if(($('input[name=start]').val()!= '')&& ($('input[name=end]').val()!= '')){
					var url = "{{url('report/fetch_data_by_range')}}";
					var data = {_token:"{{csrf_token()}}",start:$('input[name=start]').val(),end:$('input[name=end]').val(),category:'lmu'};
					var posting = $.post(url,data);
						posting.done(function(data){
							console.log(data);
							createDataTable($('#lmu-table'),'Patron Information','fetch_patron',data);
						})
				}
			});
		}	
		function fetch_lmu(){
			var url = "{{url('/report/fetch/lmu')}}";
			var posting = $.post(url,{_token:"{{csrf_token()}}"});
				posting.done(function(data){
					createDataTable($('#lmu-table'),'LMU Information','fetch_patron',data);
				});
		}
		function createDataTable(ELEMENT,MESSAGE,URL,DATA){
				ELEMENT.DataTable().destroy();
				ELEMENT.DataTable({
					"lengthMenu": [[5, 10 -1], [5, 10, "All"]],
					data:JSON.parse(DATA),
			        deferRender:"true",
			        responsive: true,
					columns:[
						{"data" : "acc_num", 
								render : function(id){
									return '<span class="text-success">'+id+'</span>'
								}},
						{"data" : "barcode"},
						{"data" : "title",
								render : function(id){
									return '<span class="text-success">'+id+'</span>'
								}},
						{"data" : "totalLoan" 
							},
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