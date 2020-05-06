
@if(count($data) > 1)
	<div  class="" style="background:#ebfffe!important; padding:30px;">
		 <div class="col-md-3" style="padding:0px;">
 	 	 	<img class="img img-responsive" src="{{url('public/images/book-default.fw.png')}}" >
 	 	 </div>
		 <div class="col-md-9">
		 	<p style="font-size:18px;color:#004040;"><b>{{$data['title']}}</b></p>
			<p style="font-size:10px; margin-top:-10px;">By {{$data['author']}}</p>
			<p><p class="text-success">STATUS : <span style="color:{{($data['status'] == 'available')? '#004040' : '#B20000'}};"> {{$data['status']}} </span> </p></p>
			<p class="text-success">ACCCESSION NO : <span style="color:#004040;"> {{$data['acc_num']}} </span> </p>
			<p class="text-success">CALL NO : <span style="color:#004040;"> {{$data['call_num']}} </span> </p>
		 </div>
		<?php if($data['in_a_list'] == true){?>
			<p class="pull-right"><span style="color:#B20000;"><strong>Already in the list</strong></span></p>
		<?php }else if($data['status'] == 'unavailable'){?>
			<p class="pull-right"><span style="color:#B20000;"><strong>UNAVAILABLE</strong></span></p>
		<?php }else{?>
			<p class="pull-right" id="itemBtnContainer">
				<button class="btn btn-flat btn-xs btn-success btn-item-add" acc-num="{{$data['acc_num']}}" id="{{$data['barcode']}}" item-name="{{$data['title']}}" item-accession="{{$data['acc_num']}}" ><i class="fa fa-check"></i> Add</button>
			</p>
		<?php } ?>
		<!-- <p class="pull-right"><span style="color:#B20000;"><strong>{{$data['in_a_list']}}asdsd</strong></span></p> -->
		<p style="height:10px;"></p>
	</div>
@else
	<div class="col-md-12">
		<h3 style="color:#004040;">Book Not Found</h3>
		<small class="text-muted">Use Barcode to get the data of the Books etc. (<span class="text-success">Title Author etc.</span>)</small>
	</div>
@endif