<?php 
  $nav = [['name'=> 'circulation', 'id' => 'circulation', 'fa'=>'edit',],
          ['name'=> 'technical', 'id' => 'technical', 'fa'=>'book',],
          ['name'=> 'reports', 'id' => 'report', 'fa'=>'list',],
          ['name'=> 'c-panel', 'id' => 'cpanel', 'fa'=>'cog',],
          ['name'=> 'user management', 'id' => 'user_management', 'fa'=>'users',],
         ];

?>
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <a href="{{url('dashboard')}}" class="navbar-brand">
                <img class="img img-responsive" src="{{asset('public/images/logo.fw.png')}}" style="margin:auto;vertical-align:middle;margin-left:7px;">
                </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        <ul class="nav navbar-nav hidden-sm hidden-xs">
            @foreach ($nav as $navigation)
                    <li id="href" class="page_menu {{(Request::segment(1) == $navigation['id'])? 'page_active' : ''}}">
                      <a href="{{ url($navigation['id']) }}">
                        <center><i class="fa fa-{{$navigation['fa']}} fa-2x"></i></center>
                        <small>{{ucfirst($navigation['name'])}}</small>
                      </a>
                    </li>
            @endforeach
          </ul>
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
            <li class="hidden-sm hidden-md hidden-xs">
              <font class="day" style="padding-top:30px color:gray;">
                <span class="day" id="hdr-day">Tuesday,</span> <span class="date" id="hdr-date">May 02, 2017</span> <span class="time" id="hdr-time">11:38:22 AM</span>
              </font>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle user_c" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                <div class="pull-left p-r-10" style="border-right:1px solid #FFF">
                  <p style="margin-bottom:0px"><small>Welcome:</small> {{$data['user_info']['full_name']}}</p>
                  <center> {{$data['user_info']['position']}}</center>
                </div>
                <!-- <img src="{{asset('public/_color/img/user-1.jpg')}}" class="img img-responsive pull-right m-l-10" style="height:40px;width:40px"> -->
              </a>
              <ul class="dropdown-menu">
                <!-- <li><a href="#" onclick="$('#modalChangePic').modal('show')"><i class="fa fa-image"></i> Change Profile Image</a></li> -->
                <li><a href="settings"><i class="fa fa-gear"></i> Account Settings</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>