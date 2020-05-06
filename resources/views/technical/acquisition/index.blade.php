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

	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active"><a href="#nav-pills-tab-1" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/acquisition/purchase.fw.png')}}" height="20px;" width="20px;"> Purchase Item</a></li>
				<li><a href="#nav-pills-tab-2" data-toggle="tab"><img src="{{url('public/images/icons/3rdbar/technical/acquisition/suggest.fw.png')}}" height="20px;" width="20px;"> Suggestions</a></li>
			

			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				    <h3 class="m-t-10">Nav Pills Tab 1</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor, 
						est diam sagittis orci, a ornare nisi quam elementum tortor. 
						Proin interdum ante porta est convallis dapibus dictum in nibh. 
						Aenean quis massa congue metus mollis fermentum eget et tellus. 
						Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien, 
						nec eleifend orci eros id lectus.
					</p>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    <h3 class="m-t-10">Nav Pills Tab 2</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Integer ac dui eu felis hendrerit lobortis. Phasellus elementum, nibh eget adipiscing porttitor, 
						est diam sagittis orci, a ornare nisi quam elementum tortor. 
						Proin interdum ante porta est convallis dapibus dictum in nibh. 
						Aenean quis massa congue metus mollis fermentum eget et tellus. 
						Aenean tincidunt, mauris ut dignissim lacinia, nisi urna consectetur sapien, 
						nec eleifend orci eros id lectus.
					</p>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection