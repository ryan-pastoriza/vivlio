
<style type="text/css">
	.tab-content{background: none;}
	.media-d_color{color: #004040!important;}
	.media-c_lname{color: #238484!important;}
	.media-c_fname{color: #004040!important;}
	.media-c_course{color: #004040!important;}
	.media-c_year{color: #004040!important;}
	.nav.nav-tabs.nav-tabs-inverse>li>a, .nav.nav-tabs.nav-tabs-inverse>li>a:focus, .nav.nav-tabs.nav-tabs-inverse>li>a:hover, .tab-overflow .nav-tabs-inverse .next-button>a, .tab-overflow .nav-tabs-inverse .prev-button>a{background: #004040; color:white;}
	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{background: #004040!important; color: white!important;}
</style>
<div class="row">
	<div class="col-md-12" style="padding:0;">
		<div class="col-md-6" style="padding:0;">
			@include('circulation.borrow.templates.patron_details')
            <div class="panel" data-sortable-id="ui-widget-4" data-init="true">
                <div class="panel-heading">
                   
                    <h4 class="panel-title">Items</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-6" style="padding:0;">
                    	<h3 class="media-heading media-c_lname" style="font-size:18px;"><b>Software Engineering</b></h3>
		                    <p style="font-size:13px;">Principles Practice</p>
		                    <p><b>Quantity :</b> <font style="color:#004040;">2</font></p>
		                    <p><b>Transaction Code :</b> <font style="color:#004040;">X21DASD35L2</font></p>
		              </div>
		              <div class="col-md-6" style="padding:0;">
		                    <p><b>Author :</b> <font style="color:#004040;">Ryan Pastoriza</font></p>
		                    <p><b>Accession Number :</b> <font style="color:#004040;">12225238385</font></p>
		                    <p><b>Transaction Date :</b> <font style="color:#004040;">02-04-2017</font></p>
		              </div>
		              <div class="col-md-12" style="padding:0;">
		              	<hr></hr>
		              </div>
		              <div class="col-md-12" style="padding:0;">
		              	<h4>List of Items: </h4>
		              	   <table class="table" id="list-table">
						 	 <thead>
						 	 	 <tr class="hidden">
						 	 	 	<th>&nbsp;</th>
						 	 	 	<th>&nbsp;</th>
						 	 	 	<th>&nbsp;</th>
						 	 	 	<th>&nbsp;</th>
						 	 	 	<th>&nbsp;</th>
						 	 	 </tr>
						 	 </thead>
						 	 <tbody>
						 	 	 <tr style="">
						 	 	 	 <td><span style=""><strong style="color:#004040;">Software Engineering</strong></span></td>
							 	 	 <td><span style=""><span style="font-size:25px;">3</span>rd</span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">Ryan Pastoriza</strong></span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">123-456-7989</strong></span></td>
							 	 	 <td style="margin-top:10px;"><button class="btn btn-xs btn-danger btn-flat">Remove</button></td>
						 	 	 </tr>
						 	 	  <tr style="">
						 	 	 	 <td><span style=""><strong style="color:#004040;">Software Engineering</strong></span></td>
							 	 	 <td><span style=""><span style="font-size:25px;">3</span>rd</span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">Ryan Pastoriza</strong></span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">123-456-7989</strong></span></td>
							 	 	 <td style="margin-top:10px;"><button class="btn btn-xs btn-danger btn-flat">Remove</button></td>
						 	 	 </tr>
						 	 	  <tr style="">
						 	 	 	 <td><span style=""><strong style="color:#004040;">Software Engineering</strong></span></td>
							 	 	 <td><span style=""><span style="font-size:25px;">3</span>rd</span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">Ryan Pastoriza</strong></span></td>
							 	 	 <td><span style=""><strong style="color:#004040;">123-456-7989</strong></span></td>
							 	 	 <td style="margin-top:10px;"><button class="btn btn-xs btn-danger btn-flat">Remove</button></td>
						 	 	 </tr>

						 	 </tbody>
						 </table>
		              </div>
                 </div>
            </div>
		</div>
		@include('circulation.borrow.templates.transaction_details')
	</div>
</div>

