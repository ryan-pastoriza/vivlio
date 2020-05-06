@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				 <div class="panel-heading"><h5><i class="fa fa-edit"></i> Statistics (<span class="text-info">Circulation</span>) <span style="padding-top:10px;" id="legend_container_1"></span> <span class="pull-right" id="date_bni">{{date('F Y', strtotime(\Carbon\Carbon::now()))}}</span> </h5></div>
				 <div class="panel-body">
				 	<div class="row">
						<div class="col-md-12">
							 <div class="col-md-3">
							 	 <label>Year</label>
							 	 <select name="" class="form-control" id="data_year">
								 	<option value="">-Select-</option>
								 	 <?php for($x = 4; $x>0;$x--){?>
					                   <option value="{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}">{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}</option>
					                <?php }?>
							 </select>
							 </div>
							 <div class="col-md-2">
							 	 <label class="pull-right">Month of <span id="date_sort_bni" var-value="{{date('Y', strtotime(\Carbon\Carbon::now()))}}">{{date('Y', strtotime(\Carbon\Carbon::now()))}}</span></label>
							 	 <select name="" class="form-control" id="data_month">
								 	<option value="">-Select-</option>
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
							 <div class="col-md-3 pull-right">
							 	 <label class="pull-right">Sorted By</label>
							 	 <select name="" class="form-control" id="data_ranges">
								 	<option value="">-Select-</option>
								 	<option value="day">Day</option>
								 	<option value="month">Month</option>
								 	<option value="year">Year</option>

								 </select>
							 </div>
							  <div class="col-md-3 pull-right">
									<div id="legend_container_1"></div>
								</div>
						</div>
					</div>
					<div id="statistic_container">
						 @include('circulation.layout.circulation_chart_1')
					</div>
					<div class="col-md-12">
						<div class="col-md-12" style="height:10px;"></div>
						<a class="btn btn-inverse btn-icon btn-circle pull-right print_graph" content="patron"><i class="fa fa-print"></i></a>
					</div>
				<div class="col-md-12" style="height:30px; border-bottom:1px dashed;"></div>
				<div class="col-md-12" style="height:30px;"></div>
				<div class="panel panel-default">
				 <div class="panel-heading"><h5><i class="fa fa-edit"></i> Statistics (<span class="text-danger">Entry Logs</span>)<span style="padding-top:10px;" id="legend_container_2"></span> <span class="pull-right" id="date_bni_entry">{{date('F Y', strtotime(\Carbon\Carbon::now()))}}</span> </h5></div>
				 <div class="panel-body">
				 	<div class="row">
						<div class="col-md-12">
							 <div class="col-md-3">
							 	 <label>Year</label>
							 	 <select name="" class="form-control" id="data_year_entry">
								 	<option value="">-Select-</option>
								 	 <?php for($x = 4; $x>0;$x--){?>
					                   <option value="{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}">{{(date('Y', strtotime(\Carbon\Carbon::now()))-4 + $x)}}</option>
					                <?php }?>
							 </select>
							 </div>
							 <div class="col-md-2">
							 	 <label class="pull-right">Month of <span id="date_sort_bni_entry" var-value="{{date('Y', strtotime(\Carbon\Carbon::now()))}}">{{date('Y', strtotime(\Carbon\Carbon::now()))}}</span></label>
							 	 <select name="" class="form-control" id="data_month_entry">
								 	<option value="">-Select-</option>
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
							 <div class="col-md-3 pull-right">
							 	 <label class="pull-right">Sorted By</label>
							 	 <select name="" class="form-control" id="data_ranges_entry">
								 	<option value="">-Select-</option>
								 	<option value="day">Day</option>
								 	<option value="month">Month</option>
								 	<option value="year">Year</option>
								 </select>
							 </div>
						</div>
					</div>
					<div id="statistic_container_entry">
						 @include('circulation.layout.circulation_chart_2')
					</div>
					<div class="col-md-12">
						<div class="col-md-12" style="height:10px;"></div>
						<a class="btn btn-inverse btn-icon btn-circle pull-right print_graph" content="entry"><i class="fa fa-print"></i></a>
					</div>
                </div>
			</div>
                </div>
			</div>
	</div>
</div>
@endsection
@section('custom_scripts')
<script src="{{asset('public/_color/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.stack.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.crosshair.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/flot/jquery.flot.categories.js')}}"></script>
<script type="text/javascript">
	var Graph_1;
	var Graph_2;
	 $(document).ready(function(e){
	 	var DATA_OBJ = {!!$data['data_day']!!};
        var DATA_INFO = [@foreach($data['statistics_data'] as $statistic)
    						{
					            data:{!!$statistic['data']!!}, label:"{{$statistic['label']}}", color:"{{$statistic['color']}}", lines: {
					                show: true, fill: true, lineWidth: 2
					            }
					            , points: {
					                show: true, radius: 3, fillColor: "#fff"
					            }
					            , shadowSize:0
						     },
    					@endforeach];
    	var DATA_STATISTICS_ENTRY = [@foreach($data['statistics_data_entry'] as $statistic)
		    						{
							            data:{!!$statistic['data']!!}, label:"{{$statistic['label']}}", color:"{{$statistic['color']}}", lines: {
							               show: true, fill: true, lineWidth: 2
							            }
							            , points: {
							                 show: true, radius: 3, fillColor: "#fff"
							            }
							            , shadowSize:0
								     },
		    					@endforeach];
	 	Graph_1 = createChart('#legend_container_1',DATA_OBJ,DATA_INFO,$('#chart_data'));
	 	Graph_2 = createChart('#legend_container_2',DATA_OBJ,DATA_STATISTICS_ENTRY,$('#chart_data_entry'));
	 });
	 $('.print_graph').click(function(e){
	 	var content = $(this).attr('content');
	 	if(content === 'entry'){
	 		ConvertToImg(Graph_2,'ENTRY GRAPH');
	 	}else{
	 		 if(content == 'patron'){
	 		 	ConvertToImg(Graph_1,'PATRON GRAPH');
	 		 }
	 	}
	 })
	 $(document).on('change','#data_month',function(e){
	 	var _year = $('#date_sort_bni').attr('var-value');
	 	var _month  = $(this).val();
	 	var _option = 'per_year';
	 	var url = "circulation/sort_by";
			var data = {_token:"{{csrf_token()}}",option:_option,month:_month,year:_year}
			var posting = $.post(url,data)
				posting.done(function(data_d){
					var a = [];
					var counter = 0;
					if(data_d == 'error'){}else{
						$.each(data_d.statistics_data,function(index,value){
							a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
								                 show: true, fill: true, lineWidth: 2
								            }
								            , points: {
								                show: true, radius: 3, fillColor: "#fff"
								            }
								            , shadowSize:0 }
							counter++;
					 	});
					 	$('#date_bni').text(" "+data_d.date);
						Graph_1 =  createChart('#legend_container_1',data_d.data_day,a,$('#chart_data'));
					}
				});
	 });
	 $(document).on('change','#data_ranges',function(e){
 		e.preventDefault();
		var _option = $(this).val();
		var url = "circulation/sort_by";
		var data = {_token:"{{csrf_token()}}",option:_option}
		var posting = $.post(url,data)
			posting.done(function(data_d){
				var a = [];
				var counter = 0;
				
				if(data_d == 'error'){}else{
					$.each(data_d.statistics_data,function(index,value){
						a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
							               show: true, fill: true, lineWidth: 2
							            }
							            , points: {
							               show: true, radius: 3, fillColor: "#fff"
							            }
							            , shadowSize:0 }
						counter++;
				 	});
				 	$('#date_bni').text(" "+data_d.date);
					Graph_1 =  createChart('#legend_container_1',data_d.data_day,a,$('#chart_data'));
				}
			});
	 });
	 $(document).on('change','#data_year',function(e){
 		e.preventDefault();
			var _option = 'year_choose';
			var url = "circulation/sort_by";
			var _value = $(this).val();
			var data = {_token:"{{csrf_token()}}",option:_option, value:_value}
			var posting = $.post(url,data)
				posting.done(function(data_d){
					var a = [];
					var counter = 0;
					
					if(data_d == 'error'){}else{
						$.each(data_d.statistics_data,function(index,value){
							a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
								                 show: true, fill: true, lineWidth: 2
								            }
								            , points: {
								                show: true, radius: 3, fillColor: "#fff"
								            }
								            , shadowSize:0 }
							counter++;
					 	});
					 	$('#date_bni,#date_sort_bni').text("YEAR : "+data_d.date);
					 	$('#date_sort_bni').attr('var-value',data_d.date);
						Graph_1 =  createChart('#legend_container_1',data_d.data_day,a,$('#chart_data'));
					}
				});
	 });
	  $(document).on('change','#data_month_entry',function(e){
	 	var _year = $('#date_sort_bni_entry').attr('var-value');
	 	var _month  = $(this).val();
	 	var _option = 'per_year';
	 	var url = "circulation/sort_by";
			var data = {_token:"{{csrf_token()}}",option:_option,month:_month,year:_year}
			var posting = $.post(url,data)
				posting.done(function(data_d){
					var a = [];
					var counter = 0;
					
					if(data_d == 'error'){}else{
						$.each(data_d.statistics_data_entry,function(index,value){
							a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
								                 show: true, fill: true, lineWidth: 2
								            }
								            , points: {
								               show: true, radius: 3, fillColor: "#fff"
								            }
								            , shadowSize:0 }
							counter++;
					 	});
					 	$('#date_bni_entry').text(" "+data_d.date);
						Graph_2 = createChart('#legend_container_2',data_d.data_day,a,$('#chart_data_entry'));
					}
				});
	 });
	 $(document).on('change','#data_ranges_entry',function(e){
 		e.preventDefault();
		var _option = $(this).val();
		var url = "circulation/sort_by";
		var data = {_token:"{{csrf_token()}}",option:_option}
		var posting = $.post(url,data)
			posting.done(function(data_d){
				var a = [];
				var counter = 0;
				if(data_d == 'error'){}else{
					$.each(data_d.statistics_data_entry,function(index,value){
						a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
							                show: true, fill: true, lineWidth: 2
							            }
							            , points: {
							                show: true, radius: 3, fillColor: "#fff"
							            }
							            , shadowSize:0 }
						counter++;
				 	});
				 	$('#date_bni_entry').text(" "+data_d.date);
					Graph_2 = createChart('#legend_container_2',data_d.data_day,a,$('#chart_data_entry'));
				}
			});
	 });
	 $(document).on('change','#data_year_entry',function(e){
 		e.preventDefault();
		var _option = 'year_choose';
		var url = "circulation/sort_by";
		var _value = $(this).val();
		var data = {_token:"{{csrf_token()}}",option:_option, value:_value}
		var posting = $.post(url,data)
			posting.done(function(data_d){
				var a = [];
				var counter = 0;
				if(data_d == 'error'){}else{
					$.each(data_d.statistics_data_entry,function(index,value){
						a[counter] = { data: JSON.parse(value.data), label:value.label, color:value.color, lines: {
							                 show: true, fill: true, lineWidth: 2
							            }
							            , points: {
							               show: true, radius: 3, fillColor: "#fff"
							            }
							            , shadowSize:0 }
						counter++;
				 	});
				 	$('#date_bni_entry,#date_sort_bni_entry').text("YEAR : "+data_d.date);
				 	$('#date_sort_bni_entry').attr('var-value',data_d.date);
					Graph_2 = createChart('#legend_container_2',data_d.data_day,a,$('#chart_data_entry'));
				}
			});
	});
    function ConvertToImg(GRAPH,TITLE){
    	var canvas = GRAPH.getCanvas();
		var img = canvas.toDataURL("image/png");
		var mywindow = window.open('', 'PRINT SECTION', 'height=700,width=900');
	    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
	    mywindow.document.write('</head><body >');
	    mywindow.document.write('<h4>' + TITLE + '</h4>');
	    mywindow.document.write('<center><img class="img img-responsive" width="95%" src="'+img+'"></center>');
	    mywindow.document.write('</body></html>');
	    mywindow.document.close(); // necessary for IE >= 10
	  	$(mywindow).ready(function(e){
	  		mywindow.focus();
	  		mywindow.print();
	    	mywindow.close();
	  	});
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
</script>
@endsection




