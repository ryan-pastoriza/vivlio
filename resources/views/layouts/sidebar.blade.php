<?php
    $navigation = ['circulation'=>['data'=>[['id'=>'circulation', 'name'=>'borrow', 'img'=>'borrow.fw.png', 'href'=>'circulation/borrow'],
                                     ['id'=>'circulation', 'name'=>'patrons', 'img'=>'logs.fw.png','href'=>'circulation/patrons'],
                                     ['id'=>'circulation', 'name'=>'utilization', 'img'=>'lib_util.fw.png','href'=>'circulation/utilization'],
                                     ['id'=>'circulation', 'name'=>'logs', 'img'=>'patrons.fw.png','href'=>'circulation/logs']]],

            'cpanel'=>['data'=>[['id'=>'cpanel', 'name'=>'RDA Configuration', 'img'=>'RDA.fw.png','href'=>'cpanel/rda'],
                                ['id'=>'cpanel', 'name'=>'Announcement', 'img'=>'announcement.fw.png','href'=>'cpanel/announcement'],
                                ['id'=>'cpanel', 'name'=>'Company Settings', 'img'=>'company.fw.png','href'=>'cpanel/company'],
                                ['id'=>'cpanel', 'name'=>'Circulation', 'img'=>'acquisition.fw.png','href'=>'cpanel/circulation']]],

            'technical'=>['data'=>[['id'=>'technical', 'name'=>'Acquisition', 'img'=>'acquisition.fw.png','href'=>'technical/acquisition'],
                                  ['id'=>'technical', 'name'=>'Catalogue', 'img'=>'catalogue.fw.png','href'=>'technical/catalogue'],
                                  ['id'=>'technical', 'name'=>'Indexing', 'img'=>'indexing.fw.png','href'=>'technical/indexing'],
                                  ['id'=>'technical', 'name'=>'E-resource', 'img'=>'electronic_resource.fw.png','href'=>'technical/e_resource']]],

            'report'=>['data'=>[['id'=>'report', 'name'=>'Inventory', 'img'=>'inventory.fw.png','href'=>'report/inventory'],
                                 ['id'=>'report', 'name'=>'LMU Statistical Report', 'img'=>'LMU.fw.png','href'=>'report/lmu'],
                                 ['id'=>'report', 'name'=>'Patron', 'img'=>'patron.fw.png','href'=>'report/patron'],
                                 ['id'=>'report', 'name'=>'Fines', 'img'=>'fines.fw.png','href'=>'report/fines'],
                                 ['id'=>'report', 'name'=>'Borrowing', 'img'=>'borrow.fw.png','href'=>'report/borrow'],
                                 ['id'=>'report', 'name'=>'Acquisition', 'img'=>'acquisition.fw.png','href'=>'report/acquisition']]],
                                

            'user_management'=>['data'=>[['id'=>'user_management', 'name'=>'Accounts', 'img'=>'profile.fw.png','href'=>'user_management/profile'],
                                         ['id'=>'user_management', 'name'=>'Roles & accessibility', 'img'=>'roles.fw.png','href'=>'user_management/roles']]],                    
            
            'dashboard' =>['data'=>[]]
            ];
?>
<style type="text/css">
    .navbar-brand{
        width: 90px;
        padding: 22px 15px;
    }
    .content{
        margin-left:81px!important;
    }
</style>
<div id="sidebar" class="sidebar" style="width:100px!important;">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar nav -->
        <ul class="nav" style="margin-top:9px;">
         @foreach ($navigation[$data['active']]['data'] as $navigation)
            <li class="{{Request::is($navigation['href']) ? 'active' : ''}}" style="border-bottom:1px solid rgba(0, 172, 172,0.3);">
                <a href="{{ url($navigation['href']) }}">
                    <!-- <i class="fa fa-laptop"></i> -->
                    <center>
                        <img class="img " height="25" width="25" src="{{asset('public/images/icons/2ndbar/'.$navigation['id'].'/'.$navigation['img'].'')}}">
                         <p style="font-size:10px;">{{ucfirst($navigation['name'])}}</p>
                    </center>
                </a>
            </li>
            @endforeach
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg" style="width:50px;"></div>