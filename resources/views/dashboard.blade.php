@extends('layouts.app')


@section('custom_css')
	<link href="{{asset('public/_color/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" /> 
	<link href="{{asset('public/_color/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/_color/custom.css')}}" rel="stylesheet" />
    <style>
        .item{
            padding:10px;
           
        }
    </style>
@endsection

@section('content')
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin row -->
    <div class="row">
       <div class="col-md-4 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-default" data-sortable-id="index-1" >
            <div class="panel-heading" style="background:#004040;">
                <h4 class="panel-title text-white">New Patrons <span class="pull-right label label-success text-white"><span id="counter_p"></span> new user/s</span></h4>
            </div>
            <ul class="registered-users-list patron-list clearfix">
                <div class="col-md-12 text-center">
                    Loading . . . 
                </div>
            </ul>
        </div>
        <!-- end panel -->
       </div>
        <div class="col-md-4 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-default" data-sortable-id="index-2" >
            <div class="panel-heading" style="background:#004040;">
                <h4 class="panel-title text-white">New Items <span class="pull-right label label-success text-white"><span id="counter_i"></span> new item/s</span></h4>
            </div>
            <ul class="registered-users-list item-list clearfix">
                <div class="col-md-12 text-center">
                    Loading . . . 
                </div>
            </ul>
        </div>
        <!-- end panel -->
       </div>

    </div>
    <!-- end row -->
    
</div>
<!-- end #content -->

@endsection
	<!-- custom js scripts goes here -->
@section('custom_js')
	<script src="{{asset('public/_color/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
@endsection


@section('custom_scripts')

<script type="text/javascript">
    $(document).ready(function(e){
        $('#sidebar, .sidebar-bg').remove();
        $('#content').css('cssText','margin-left:0!important');
        __initPatrons();
        __initItems();
    });
    function __initItems(){
        var counter_i = 0;
        var url = 'initDashboard';
        var item_l = '';
        var data ={_token:"{{csrf_token()}}",_category:"items"}
        var posting = $.post(url,data);
            posting.done(function(data){
                 $.each(JSON.parse(data),function(k,v){
                    counter_i++;
                    item_l += __listReturn(v.info.title,v.info.author,"{{url("public/images/book-default.fw.png")}}");
                 });
                $('.item-list').html((item_l) === '' ? __msgReturn() : item_l);
                $('#counter_i').html(counter_i);
              
            });
    }
    function __initPatrons(){
        var counter_p = 0;
        var url = 'initDashboard';
        var patron_l = '';
        var data ={_token:"{{csrf_token()}}",_category:"patrons"}
        var posting = $.post(url,data);
            posting.done(function(data){
                $.each(JSON.parse(data),function(k,v){
                    counter_p++;
                    patron_l += __listReturn(v.full_name,v.course,"{{url("public/images/user-default.fw.png")}}");
                });
               $('.patron-list').html((patron_l) === '' ? __msgReturn() : patron_l);
               $('#counter_p').html(counter_p);
                
            });
    }
    function __msgReturn(){
        return '<span style="color:#004040;font-size:12px;padding:10px;">NO RECORD PAST 30 DAYS</span>';
    }
    function __listReturn(f_1,f_2,__img){
            return '<li class="item">'+
                    '<a href="javascript:;"><img class="img img-responsive" src="'+__img+'"></a>'+
                    '<h4 class="username text-ellipsis">'+
                        f_1+
                        '<small>'+f_2+'</small>'+
                    '</h4>'+
                '</li>'
    }
</script>

@endsection