<div class="col-md-12 bg-warning" style="padding:15px;">
	<div class="row">
		<div class="col-md-12 " id="material-reserve-details">
			
	 	 	 <div class="col-md-3">
	 	 	 	<img class="img img-responsive" src="{{url('public/images/book-default.fw.png')}}" >
	 	 	 </div>
	 	 	 <div class="col-md-9">
	 	 	 	 <p style="font-size:18px;color:#004040;"><b>{{$data['material_info']['info'][0]['title']}}</b></p>
		 	 	 <p style="font-size:10px; margin-top:-10px;">By {{$data['material_info']['info'][0]['author']}}</p>
		 	 	 <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;">Author: </span>{{$data['material_info']['info'][0]['author']}}</p>
		 	 	  <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;">Copies Available: </span>{{$data['available_count']}}</p>
	 	 	 </div>
	 	 	 <p style="color: #004040;">Remarks</p>
	 	 	 <p>{{$data['material_info']['catalogue'][0]['remarks']}}</p>
	 	 	 <div class="col-md-12" style="height: 2px; background: #336666;"></div>
	 	 	 <div class="col-md-12" style="height: 25px;"></div>
	 	 	 <p class="pull-right">
	 	 	 	 @if($data['available_count'] > 0)
	 	 	 	 	<p class="text-right text-success">Available</p>
	 	 	 	 @else
	 	 	 	 	<button class="btn btn-success btn-flat btn-xs" id="btn-transaction-reserve" catalogue-id="{{$data['material_info']['catalogue'][0]['catalogue_id']}}" patron-id="{{$data['patron_id']}}"><i class="fa fa-check"></i> | Reserve</button>
	 	 	 	 @endif
	 	 	 </p>
	 	 </div>
	</div>
</div>
