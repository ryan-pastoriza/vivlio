<html>
<head>
    <title>{{$data['title']}}</title>
    <link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/dist/css/templates/login.css')}}">
    <link href="{{asset('public/_color/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/_color/plugins/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('public/images/vivlio_388.fw.png')}}">
     <link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/fonts-custom.css')}}" rel="stylesheet" />
</head>
<style type="text/css">
    a{
        color:#004040;
    }
	a:hover,a:focus{
        text-decoration:none;
        color :#004040;
    }
    .text-red{
        color: #B20000;
    }
	.form-control:focus, btn:focus {
		border-color:#ffffff;
		-webkit-box-shadow: none;
		box-shadow: none;
    }
    .btn-primary,btn{
        color: #fff!important;
        background-color: #004040 !important;
        border-color: #004040 !important;
    }
    .itm_container{
        background:#fff;
        padding:20px;
        margin-bottom:10px; 
    }
    #searchResult_paginate{
        text-align:left;
        margin-bottom:20px; 
    }

</style>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-success">
        <a href="{{url('opac')}}" class="navbar-brand">
                <img class="img img-responsive" src="{{url('public/images/logo.fw.png')}}" style="margin:auto;vertical-align:middle;margin-top:-4px;margin-left:0px;">
        </a>
         <div class="collapse navbar-collapse" id="" style="margin-top:9px;">
            <form class="form-inline col-md-11 my-lg-0" method="get" action="loadItemsList">
                <input class="form-control col-md-12" id="q" name="q" style="width:40%;" type="text" placeholder="Search Keyword, Title etc." value="<?php echo $data['q']; ?>">{{-- 
                <input class="form-control col-md-12" style="width:15%; margin-left:12px;" type="text" placeholder="Topics">
                <input class="form-control col-md-12" style="width:15%; margin-left:12px;" type="text" placeholder="Author"> --}}
                <button class="btn col-md-2 btn-flat btn-primary" style="margin-left:12px;">Search</button>
            </form>
        </div>
    </nav>
    <div class="col-md-12">
        <div class="col-md-9">
           <div class="row" id='searchResultDiv'>
            {{-- @include('opac.searchResult') --}}
           </div>
        </div>
        <div class="col-md-3" id="studentLoginDiv">
            {{-- @include('opac.studentlogin') --}}
        </div>
    </div>
</body>

<script src="{{asset('public/_color/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>


<script src="{{asset('public/_color/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/_color/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/_color/plugins/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>

<script type="text/javascript">
    var searchTable;
    
    function viewStudentLogin(){
        $.ajax({
            type: 'POST',
            url: "{{ url('/loadItemsList/viewBorrowsReserves') }}",
            data: {  _token: "{{csrf_token()}}" },
            success: function(data){
                $('#studentLoginDiv').html(data);

            },
        });
    }
    function loadResults(){
        viewStudentLogin();
        $.ajax({
            type: 'POST',
            url: "{{ url('/loadItemsList/loadSearches') }}",
            data: {  _token: "{{csrf_token()}}", 'q':$('#q').val() },
            success: function(data){
                $('#searchResultDiv').html(data);
                searchTable = $('#searchResult').DataTable({
                    "searching": false,
                    "language": {
                      "emptyTable": "No Book Found"
                    }
                });

            },
        });
    }
    loadResults();


    $(document).ready(function(e){

        $(document).on('change','#auth_input',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{url('/loadItemsList/loginStudent')}}",
                data: {  _token: "{{csrf_token()}}", student_barcode: $(this).val() },
                success: function(data){
                    $(this).val('');
                    viewStudentLogin();
                    loadResults();
                },
            });
        });
        $(document).on('click','#btn-logout', function(e){
            $.ajax({
                type: 'POST',
                url: "{{url('/loadItemsList/logoutStudent')}}",
                data: {  _token: "{{csrf_token()}}" },
                success: function(data){
                    $('patronID').attr('patron_id','');
                    viewStudentLogin();
                    loadResults();
                },
            });
        });
        $(document).on('click','#btn-reserve-book', function(e){
            var patronid = $('#patronID').attr('patron_id');
            if(patronid!=''){
                console.log(patronid);
                $.ajax({
                    type: 'POST',
                    url: "{{url('/loadItemsList/reserveBook')}}",
                    data: {  _token: "{{csrf_token()}}", catalogue_id: $(this).attr('catalogue_id'), patron_id:patronid },
                    success: function(data){
                        // console.log(data);
                        viewStudentLogin();
                        $.gritter.add({
                            title:"<i class='fa fa-check text-success'></i> Reservation Added!",
                            text:"",
                            sticky:false,
                            time:""
                        }); 
                    },
                });
                $(this).removeClass('btn-primary');
                $(this).addClass('disabled');
                $(this).addClass('btn-muted');
                $(this).attr('disabled','')
            }else{
                $.gritter.add({
                    title:"<i class='fa fa-times text-danger'></i> Login Required!",
                    text:"",
                    sticky:false,
                    time:""
                }); 
            }
        });
        $(document).on('click','#btn-cancel-reserve', function(e){
            var reserve_id = $(this).attr('reserve_id');

            $.ajax({
                type: 'POST',
                url: "{{url('/loadItemsList/cancelReserve')}}",
                data: {  _token: "{{csrf_token()}}", reserve_id: reserve_id },
                success: function(data){
                    console.log(data);
                    viewStudentLogin();
                    $.gritter.add({
                        title:"<i class='fa fa-check text-success'></i> Reservation Cancelled!",
                        text:"The book reservation has been cancelled by you",
                        sticky:false,
                        time:""
                    });
                    var buttons = $('.reserve-btn');
                    $.each(buttons,function(key, val){
                        // console.log(val);
                        if($(val).attr('catalogue_id') == $(this).attr('catalogue_id')){
                            console.log(val);
                            $(val).removeClass('btn-muted');
                            $(val).removeClass('disabled');
                            $(val).addClass('btn-primary');
                            val.removeAttribute('disabled');
                        }
                    });
                },
            });
        });

    });
</script>
</html>