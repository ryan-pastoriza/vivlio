@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />


	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}


	.tab-content{background: none;}
	.media-d_color{color: #004040!important;}
	.media-c_lname{color: #238484!important;}
	.media-c_fname{color: #004040!important;}
	.media-c_course{color: #004040!important;}
	.media-c_year{color: #004040!important;}
	.nav.nav-tabs.nav-tabs-inverse>li>a, .nav.nav-tabs.nav-tabs-inverse>li>a:focus, .nav.nav-tabs.nav-tabs-inverse>li>a:hover, .tab-overflow .nav-tabs-inverse .next-button>a, .tab-overflow .nav-tabs-inverse .prev-button>a{background: #004040; color:white;}
	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important; color: white!important;}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-monitor" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/LMU/monitor.fw.png')}}" height="20px;" width="20px;"> Monitor</a></li>
				<li><a href="#nav-pills-tab-report" class="hidden" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/LMU/report.fw.png')}}" height="20px;" width="20px;"> Report</a></li>
				<li><a href="#nav-pills-tab-statistics"class="hidden" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/LMU/statistic.fw.png')}}" height="20px;" width="20px;"> Statistics</a></li>
			</ul>
			<div class="tab-content" style="background:transparent;">
				<div class="tab-pane fade active in" id="nav-pills-tab-monitor">
				    <div class="row">
				    	 <div class="item-details-container col-md-12" style="padding:0;">
				    	 	<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
								<input type="tel" name="Search" id="inputSearch" class="form-control LMU_barcode" value="" required="required" title="" placeholder="Enter Barcode">
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:20px;"></div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="LMU_item_container" style="min-height: 200px;">
										<div class="col-md-12 text-center" style="padding:40px;">
											<img src="{{url('public/images/vivlio_677.fw.png')}}" draggable="false" width="40%" alt="vivlio">
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
				    	 <div class="gen-usage-container col-md-6 hidden">
				    	 	 <div class="panel ">
				    	 	 	  <div class="panel-heading">
				    	 	 	  	  <h4 class="panel-title"><i class="fa fa-desktop"></i> General Item Usage Counter Monitor</h4>
				    	 	 	  </div>
						    	  <div class="panel-body" style="max-height:700px; overflow:auto;">
						    	     <div class="row">
						    	     	  <div class="col-md-12" id="lmu-usage-container">
						    	     	  	
						    	     	  </div>
						    	     </div>
						    	 </div>
						    </div>
				    	 </div>
				    </div>
				</div>
				<div class="tab-pane fade " id="nav-pills-tab-report">
				    <div class="row">
				    	 <div class="col-md-12" style="padding:0;">
				    	 	<div class="panel panel-default">
								<div class="panel-body">
									<div class="col-md-12 no-padding">
										<div class="col-md-12 no-padding">
											<p style="font-size:18px;color:#004040;"><b class="lmu-details-title"> </b><small class="pull-right">(Reports)</small></p>
											<p style="font-size:10px; margin-top:-10px; text-align:justify;" class="lmu-detials-note"></p>
											<p style="font-size:18px;color:#00acac;" id="lmu-details-edition">1 <sup>st</sup> Edition</p>
											<p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;"><b >Author:</b></span> <span class="lmu-detials-author"></span></p>
										</div>
										<div class="col-md-12" id="lmu-details-container-report">
											
										</div>
									</div>
								</div>
							</div>
						</div>
				    </div>
				</div>
				<div class="tab-pane fade " id="nav-pills-tab-statistics">
					<div class="row">
							<div class="col-md-12" style="padding:0;">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-md-12 no-padding">
											<div class="col-md-12 no-padding">
												<p style="font-size:18px;color:#004040;"><b class="lmu-details-title"> </b><small class="pull-right">(Statistics)</small></p>
												<p style="font-size:10px; margin-top:-10px; text-align:justify;" class="lmu-detials-note"></p>
												<p style="font-size:18px;color:#00acac;" id="lmu-details-edition">1 <sup>st</sup> Edition</p>
												<p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;"><b >Author:</b></span> <span class="lmu-detials-author"></span></p>
											</div>
										</div>
										<div class="col-md-12">
											 <div id="chart_data" style="height:200px; width:100%;"></div>
											 <span id="legend_container_1" style="padding:15px;"></span>

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
@section('custom_js')
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function(e){
			$(document).on('change','.LMU_barcode',function(e){
				e.preventDefault();
				__searchItem($(this).val());
				__clearVal($(this));
			});
		});
		
		function __clearVal(elem){
			elem.val('');
		}
		function __searchItem(barcode){
			var url  = 'getUtilItem';
			var data = {_token:"{{csrf_token()}}", _barcode:barcode}
			var posting = $.post(url,data);
				posting.done(function(data){
					if(data === '0'){
						$('#LMU_item_container').html('<div class="col-md-12">'+
															'<h3 style="color:#004040;">Item Not Found</h3>'+
															'<small class="text-muted">Use Barcode to get the data of the item </small>'+
														'</div>');
							$('.item-details-container').addClass('col-md-12').removeClass('col-md-6');
							$('.gen-usage-container').addClass('hidden');
							$('[href="#nav-pills-tab-report"],[href="#nav-pills-tab-statistics"]').addClass('hidden');
					}else{
						$('#LMU_item_container').html(data);
						$('#nav-pills-tab-report').removeClass('hidden');
						$('#nav-pills-tab-statistics').removeClass('hidden');
						$('.gen-usage-container').removeClass('hidden');

					}
				

				});
			$('.item-details-container').removeClass('col-md-12').addClass('col-md-6');
		}
		function __init_gen(data){
			var tr = '';
			var table = '';
			var tbl_report = '';
			$.each(JSON.parse(data),function(k,v){
				console.log(v.returned_date);
				tr = tr.concat('<tr style="">'+
								'<td>'+v.acc_num+'</td>'+
								'<td><font style="color:#004040;">'+v.patron_name+'</font></td>'+
								'<td>'+v.loaned_date+'</td>'+
								'<td>'+v.returned_date+'</td>'+
								'</tr>');
			});
			$('#lmu-usage-container').html('<table class="table" id="list-gen-usage-monitor">'+
													'<thead>'+
														'<tr>'+
														'<th style="font-size:8px;">ITEM ACC_NUM</th>'+
														'<th style="font-size:8px;">NAME</th>'+
														'<th style="font-size:8px;">LOANED DATE</th>'+
														'<th style="font-size:8px;">RETURNED DATE</th>'+
														'</tr>'+
													'</thead>'+
													'<tbody>'
														+tr+
													'</tbody>'+
											'</table>');
			$('#lmu-details-container-report').html('<table class="table" id="list-gen-usage-report">'+
								'<thead>'+
									'<tr>'+
									'<th>ITEM ACC_NUM</th>'+
									'<th>NAME</th>'+
									'<th>LOANED DATE</th>'+
									'<th>RETURNED DATE</th>'+
									'</tr>'+
								'</thead>'+
								'<tbody>'
									+tr+
								'</tbody>'+
						 '</table>')
			__toDataTable($('#list-usage-monitor_head'));									
			__toDataTable($('#list-gen-usage-monitor'));	
			__toDataTable($('#list-gen-usage-report'));	

			$('.lmu-details-title').text($('#lmu-display-title').text());
			$('.lmu-detials-note').text($('#lmu-display-note').text());
			$('.lmu-details-edition').text($('#lmu-display-edition').text());
			$('.lmu-detials-author').text($('#lmu-display-author').text());

			$('[href="#nav-pills-tab-report"],[href="#nav-pills-tab-statistics"]').removeClass('hidden');
		}
		function __initDataChart(items_data){
			console.log(items_data);
			var DATA_OBJ = [[1,"JAN"],[2,"FEB"],[3,"MAR"],[4,"APR"],[5,"MAY"],[6,"JUN"],[7,"JLY"],[8,"AUG"],[9,"SEP"],[10,"OCT"],[11,"NOV"],[12,"DEC"]];
			 var DATA_INFO = [    						{
					            data:items_data, label:"Patrons Created", color:"#004040", lines: {
					                show: true, fill: true, lineWidth: 2
					            }
					            , points: {
					                show: true, radius: 10, fillColor: "#fff"
					            }
					            , shadowSize:0
						     },
    					];
			Graph_1 = createChart('#legend_container_1',DATA_OBJ,DATA_INFO,$('#chart_data'));
		}

		function createChart(CONTAINER,DATA_OBJ,DATA_INFO,ELEMENT){
				var Graph;
				function e(e, t, n) {
					$('<div id="tooltip" class="flot-tooltip">'+n+"</div>").css( {
						top: t-45, left: e-55
					}
					).appendTo("body").fadeIn(200)
				}
				if(ELEMENT.length!==0) {
					Graph =  $.plot(ELEMENT, DATA_INFO , {
						xaxis: {
							tickColor: "#b3b5b5	", tickSize: 1, ticks:DATA_OBJ
						}
						, yaxis: {
							tickColor: "#b3b5b5", tickSize:10,min:0
						}
						, grid: {
							hoverable: true, clickable: true, tickColor: "#ccc", borderWidth: 1, borderColor: "#ddd"
						}
						, legend:{ show: true, container: CONTAINER }
					});
					var r=null;
					$(ELEMENT).bind("plothover", function(t, n, i) {
						$("#x").text(n.x.toFixed(0));
						$("#y").text(n.y.toFixed(0));
						if(i) {
							if(r!==i.dataIndex) {
								r=i.dataIndex;
								$("#tooltip").remove();
								var s=i.datapoint[1].toFixed(0);
								var o=i.series.label+" "+s;
								e(i.pageX, i.pageY, o)
							}
						}
						else {
							$("#tooltip").remove();
							r=null
						}
						t.preventDefault()
					})
			};
			return Graph;
		}
		function __toDataTable(tbl){
			tbl.DataTable( {
					"lengthMenu": [[3, 10, 25, -1], [3, 10, 25, "All"]]
				});
		}
		
	</script>
@endsection