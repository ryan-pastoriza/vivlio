<div class="col-md-12" style="padding:0;">
	<div class="panel panel-default" style="background:transparent;">
  		<div class="panel-heading" style="background:transparent;">
  			<h4 class="panel-title" style="color:#004040;"><i class="fa fa-image"></i> Multimedia Entry</h4>
  		</div>
  		<div class="panel-body" style="max-height:590px; overflow:auto;">
  			<!-- begin timeline -->
			<ul class="timeline">
			 	@foreach($data['logs_data']['multimedia_entry'] as $value)
			 		@foreach($value['info'] as $value_info)
				 		<li>
					        <!-- begin timeline-time -->
					        <div class="timeline-time">
					            <span class="date">{{date('F j, Y', strtotime($value['time']))}}</span>
					            <span class="time">{{date('h:i A', strtotime($value['time']))}} </span>
					        </div>
					        <!-- end timeline-time -->
					        <!-- begin timeline-icon -->
					        <div class="timeline-icon">
					            <a href="javascript:;"><i class="fa fa-user"></i></a>
					        </div>
					        <!-- end timeline-icon -->
					        <!-- begin timeline-body -->
					        <div class="timeline-body">
					             <div class="timeline-header">
					                <span class="username" style="font-size:14px;">{{$value_info->full_name}}<span class="text-muted" style="font-size:8px;">
					                 <span class="pull-right text-muted"><span class="text-orange" style="font-size:11px;">{{strtoupper($value_info->course)}}</span>
					            </div>
					            <div class="timeline-content">
		                            <p>
		                               <small>Multimedia Entry :  {{date('F j, Y', strtotime($value['time']))}} at {{date('h:i A', strtotime($value['time']))}}</small>
		                            </p>
					            </div>
					        </div>
					        <!-- end timeline-body -->
					    </li>
				    @endforeach
			 	@endforeach
			    <li>
			        <!-- begin timeline-time -->
			        <div class="timeline-time">
			            <span class="date">24 February 2014</span>
			            <span class="time" style="font-size:13px;">Created</span>
			        </div>
			        <!-- end timeline-time -->
			        <!-- begin timeline-icon -->
			        <div class="timeline-icon">
			            <a href="javascript:;"><i class="fa fa-cog"></i></a>
			        </div>
			        <!-- end timeline-icon -->
			    </li>
			</ul>
			<!-- end timeline -->
  		</div>	
  	</div>
</div>
