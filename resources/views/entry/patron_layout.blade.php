<div class="col-md-12" style="font-size:1.5em;"><center><strong>Welcome</strong></center></div>
	<div class="col-md-12">
    	<div class="media media-md">
			<div class="col-md-12" style="padding:0;">
				@foreach($data as $value)
					@foreach($value->patron_information as $value_info)
						<div class="media-body" style="font-family:arial;">
							<h2 class="media-heading media-c_lname" style="font-size:20px;"><span id="patron-full-name"  data-entity="patron_information" style="">{{$value_info->full_name}}</span></h2>
							<p class="media-c_course"><span style="color:#00acac; font-size:1.1em;">{{$value_info->course}}</span></p>
						</div>
					@endforeach
				@endforeach
			</div>
		</div>
	</div>