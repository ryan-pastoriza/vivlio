<input id='patronID' type="hidden" patron_id="<?php echo isset($data['studentSession']['patronInfo']['patron_id'])?$data['studentSession']['patronInfo']['patron_id'] : '';?>">
@if(!$data['is_login'])
    <div class="col-md-12" style="padding:10px;background:#eeeeee;">
        <h4>Login To Your Account</h4>
        <input class="form-control" id="auth_input" type="text" placeholder="STUDENT BARCODE" style="text-align:center;">
        <div class="col-md-12" style="height:20px;"></div>
        <span><small>Please authenticate OPAC (<font style="color:#004040;">Online Public Access Catalogue</font>) using your student Barcode </small></span>
    </div>
@else 
    <div class="col-md-12" style="padding:10px;background:#eeeeee;">
     <h4 style="color:#004040;">Library Records<button id="btn-logout" class="btn btn-xs btn-danger pull-right">Logout</button></h4>
     <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Borrower's Information
                </a>
            </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <p><small style="color:#004040;">Name: <?php echo $data['studentSession']['patronInfo']['full_name'];?></small></p>
                    <p><small style="color:#004040;">Patron Barcode: <?php echo $data['studentSession']['patronInfo']['barcode'];?></small></p>
                    <p><small style="color:#004040;">Patronage Expiry: <?php echo $data['studentSession']['patronInfo']['expiration'];?></small></p>
                    <p><small style="color:#004040;">Patron Type: <?php echo $data['studentSession']['patronInfo']['patron_type'];?></small></p>
                    
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 Borrows
                </a>
            </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <!--<small style="color:#004040;">Notifications</small>-->
                <div class="row">
                    @if(count($data['studentSession']['patronBorrows']) > 0)
                    <?php foreach($data['studentSession']['patronBorrows'] as $acc_num => $datas):?>
                     <div class="col-md-12 itm_container">
                        <p style="color:#004040;"><h5><?php echo $datas['title'];?></h5></p>
                        <p><small style="color:#004040;">Due Date: <?php echo $datas['due_date'];?></small></p>
                        <p style="font-size:0.8em; color:#B20000;">Edition: <?php echo $datas['edition'];?><font style="margin-left:30px;">Accession No: <?php echo $acc_num;?></font></p>
                        {{-- <p style="font-size:0.8em; text-style:justify;">omnis voluptate eius. Temporibus nostrum  eius. Temporibus nostrum eius. Temporibus nostrum</p> --}}
                        {{-- <button class="btn btn-xs btn-primary pull-right">Return</button> --}}
                    </div>
                    <?php endforeach;?>
                    @else
                     <div class="col-md-12 itm_container">
                        <p style="color:#004040;"><h5>No Borrows</h5></p>
                    </div>

                    @endif
                    {{-- <div class="col-md-12 itm_container">
                        <p style="color:#004040;"><h5>Software Engineering and Design</h5></p>
                        <p style="font-size:0.8em; color:#B20000;">3rd Edition <font style="margin-left:30px;">Accession No: 300919239</font></p>
                        <p style="font-size:0.8em; text-style:justify;">omnis voluptate eius. Temporibus nostrum  eius. Temporibus nostrum eius. Temporibus nostrum</p>
                        <button class="btn btn-xs btn-primary pull-right">Reserve</button>
                    </div> --}}
                </div>
            </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Reserves
                </a>
            </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <!--<small style="color:#004040;">Notifications</small>-->
                <div class="row">
                    @if(count($data['studentSession']['patronReserves']) > 0)
                    <?php foreach($data['studentSession']['patronReserves'] as $reserve_id => $datas):?>
                        <input type="hidden" name="" class="catalogue_id_hidden" value="<?php echo $datas['catalogue_id'];?>">
                        <div class="col-md-12 itm_container">
                            <p style="color:#004040;"><h5><?php echo $datas['title'];?></h5></p>
                            <p style="font-size:0.8em; color:#B20000;">Edition: <?php echo $datas['edition'];?><font style="margin-left:30px;">Available: <?php echo $datas['copies_available'];?></font></p>
                            <button class="btn btn-xs btn-primary pull-right" id="btn-cancel-reserve" catalogue_id="<?php echo $datas['catalogue_id'];?>" reserve_id="<?php echo $reserve_id;?>">Cancel Reservation</button>
                        </div>
                    <?php endforeach;?>
                    @else
                     <div class="col-md-12 itm_container">
                        <p style="color:#004040;"><h5>No Reserves</h5></p>
                    </div>
                    
                    @endif
                    {{-- <div class="col-md-12 itm_container">
                        <p style="color:#004040;"><h5>Software Engineering and Design</h5></p>
                        <p style="font-size:0.8em; color:#B20000;">3rd Edition <font style="margin-left:30px;">Accession No: 300919239</font></p>
                        <p style="font-size:0.8em; text-style:justify;">omnis voluptate eius. Temporibus nostrum  eius. Temporibus nostrum eius. Temporibus nostrum</p>
                        <button class="btn btn-xs btn-primary pull-right">Reserve</button>
                    </div> --}}
                </div>
            </div>
            </div>
        </div>
        </div>
 </div>
@endif 

<div class="col-md-12" style="height:20px;"></div>
