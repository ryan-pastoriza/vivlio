@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('public/_color/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<style type="text/css">
		.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover{
			color: white!important;
			background: rgba(0,64,64,0.8)!important;
		}
		.nav-pills>li>a{
			background: #fff!important;
			color: gray;
		}
		.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
			background: #004040 !important;
			color: white !important;
		}
		.form-control input-sm{
			width: 80%!important;
		}
	</style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			 <div class="panel panel-default">
			 	 <div class="panel-heading">
			 	 	 <span style="color:#004040;"><b><i class="fa fa-users"></i> Employee List </b></span>
			 	 </div>
			 	 <div class="panel-body">
			 	 	<table id="user_list" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="color:004040!important;">ID#</th>
                                <th style="color:004040!important;">USER</th>
                                <th style="color:004040!important;">POSITION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
			 	 </div>
			 </div>
		</div>
		<div class="col-md-6 col-sm-12">
			 <div class="panel panel-default">
			 	 <div class="panel-heading">
			 	 	 <span style="color:#004040;"><i class="fa fa-user"></i> User Account Access Portal</span>
			 	 </div>
			 	 <div class="panel-body">
			 	 	 <div class="media media-sm">
						<a class="media-left" href="javascript:;">
							<img src="{{asset('public/images/user-default.fw.png')}}" alt="" class="media-object">
						</a>
						<div class="media-body">
							<h4 class="media-heading" id="lastname"></h4>
							<span id="names" ></span>
							<span class="pull-right"><a class="btn btn-flat btn-xs btn-success"> <i class="fa fa-pencil"></i> Update</a> <a class="btn btn-flat btn-xs btn-success"><i class="fa fa-stop"></i> Deactivate</a> <a class="btn btn-flat btn-xs btn-success"> <i class="fa fa-times"></i> Remove</a></span>
							<p style="color:#c5931c;" id="position"></p>
						</div>
						<div class="form-group" style="height:10px;"></div>
						<div class="row">

						</div>
					</div>
			 	 </div>
			 </div>
		</div>
    <div class="col-md-6 col-sm-12">
       <div class="panel panel-default">
         <div class="panel-heading">
           <span style="color:#004040;"><i class="fa fa-user"></i> Create User Account </span>
         </div>
         <div class="panel-body">
           <div class="media media-sm">
            <form id='createForm'>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
              </div>
              <div class="form-group">
                <label for="createConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="createConfirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
              </div>
              <div class="form-group">
                <label for="full_name">Name</label>
                <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name" required>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" placeholder="Gender" name="gender" required>
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" placeholder="Position" name="position" required>
              </div>
              <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" placeholder="Contact Number" name="contactNumber" required>
              </div>
              <button id='btn_create_account' class="btn btn-success">Submit</button>
            </form>

            <div class="row">

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
	<script src="{{asset('public/_color/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('public/_color/plugins/jstree/dist/jstree.min.js')}}"></script>

	
	
	<script type="text/javascript">

		$(document).ready(function(){

      $.ajax({
                url     : "{{url('/user_management/load_users')}}", 
                type    : 'POST',
                data    : { _token : "{{ csrf_token() }}"},
                error   : function(error){
                    return false;
                },
                success : function(data){
                    // console.log(data);
                    data.forEach(function(v,k){
                      $('#user_list tbody').append("<tr user_id='"+v['user_id']+"' full_name='"+v['full_name']+"' gender='"+v['gender']+"' position='"+v['position']+"' contact_no='"+v['contact_no']+"' ><td>"+v['user_id']+"</td><td>"+v['full_name']+"</td><td>"+v['position']+"</td></tr>");

                    });
      
                    var table = $('#user_list').DataTable();
                    $("#user_list tbody").on('click', 'tr', function(){

                      if ( $(this).hasClass('selected') ) {
                          $(this).removeClass('selected');
                          $('#lastname').text("");
                          $('#names').text("");
                          $('#position').text("");
                      }
                      else {
                          table.$('tr.selected').removeClass('selected');
                          $(this).addClass('selected');
                          var id = $(this).attr('user_id');
                          var name = $(this).attr('full_name').toString();
                          var name2 = $(this).attr('full_name').split(" ");
                          var lastname = name2[name2.length-1];
                          name = name.replace(lastname, " ");
                          
                          var gender = $(this).attr('gender');
                          var position = $(this).attr('position');
                          var contact_no = $(this).attr('contact_no');

                          $('#lastname').text(lastname);
                          $('#names').text(name);
                          $('#position').text(position);
                      }

                      // console.log(table.row(this).data()[0]);

                    });

                },
            });


		});
    
    $(document).on('submit', '#createForm', function(e){
      e.preventDefault();
      var form = $(this).serializeArray();
      // console.log($(this).serialize());
      // $(this)[0].reset();

      $.ajax({
                url     : "{{url('/user_management/create_user')}}", 
                type    : 'POST',
                data    : { _token : "{{ csrf_token() }}", form},
                error   : function(error){
                    $.gritter.add({
                            title:"<i class='fa fa-warning text-danger'></i> Internal Server Error [" + error.status + "]!",
                            text:"Failed to load resource or Duplicate entry",
                            sticky:false,
                            time:""
                    }); 
                    return false;
                },
                success : function(data){
                    console.log(data)
                    if( data == 'success' ){
                        $.gritter.add({
                            title:"<i class='fa fa-check text-success'></i> New User added!",
                            text:"",
                            sticky:false,
                            time:""
                        }); 
                        form[0].reset();
                    }else if(data == 'error'){
                          $.gritter.add({
                                title:"<i class='fa fa-warning text-danger'></i> Something went wrong",
                                text:"",
                                sticky:false,
                                time:""
                        }); 
                    }else{
                          $.gritter.add({
                                title:"<i class='fa fa-warning text-danger'></i> Something went wrong",
                                text:data,
                                sticky:false,
                                time:""
                        }); 

                    }
                },
            });
    });



	</script>

@endsection