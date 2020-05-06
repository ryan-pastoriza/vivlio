<style type="text/css">
    #tags-table_paginate,#tags-table_length,#tags-table_info{
        display: none;
    }
    td.details-control {
        background: url("{{asset('public/_color/plugins/DataTables/media/images/details_open.png')}}") no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url("{{asset('public/_color/plugins/DataTables/media/images/details_close.png')}}") no-repeat center center;
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
        background: #004040!important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover,.dataTables_wrapper .dataTables_paginate .paginate_button:active,
    .dataTables_wrapper .dataTables_paginate .paginate_button:focus, .dataTables_wrapper .dataTables_paginate .paginate_button:visited{
        background: none;
        border:1px solid #fff;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button{padding:0em 0em;}
    .pagination>li>a{margin-left: 0;}
</style>

<div class="row">
  
    <div class="panel-group" id="accordion" >
        <div class="panel panel-default">
            <div class="panel-heading">
                 <div class="panel-heading-btn">
                    <a class="btn btn-xs  btn-success accordion-toggle accordion-toggle-styled"  data-toggle="collapse" data-parent="#accordion_form_tags" href="#rdaCollapse"><i class="fa fa-plus"></i> Add Tags</a>
                </div>
                <h4 class="m-t-10">RDA <small>Configuration</small></h4>
            </div>
            <div id="rdaCollapse" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    
                    <div class="row" style="background-color: #f1f1f1; padding: 10px;">

                        <div class="col-sm-12">
                            <form id="frm-rda-tags">
                                <fieldset>
                                    <div class="col-sm-12">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                        <input type = "hidden" name = "_type" value = "marc_tag_structure">
                                        <h4 class="m-t-10">Create RDA Tags</h4>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="">Tag</label>
                                            <input autocomplete="false" type="text" name="tagfield" id="tag" class="form-control" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Tag Name</label>
                                            <input autocomplete="false" type="text" name="tagname" id="tag_name" class="form-control" required="" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="">Repeatable</label>
                                            <select class="form-control" name="repeatable" id="" required="">
                                                <option value="r" selected="">Repeatable</option>
                                                <option value="nr">Non Repeatable</option>
                                                <option value="none">None</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="">Record Type</label>
                                            <select class="form-control" name="record_type" id="" required="">
                                                <option value="bibliographic" selected="">Bibliographic</option>
                                                <option value="authority">Authority</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" style="margin-top:23px;"> Save </button>
                                            <button type="submit" class="btn btn-sm btn-default" id="btn-tags-clear" style="margin-top:23px;"> Clear </button>
                                        </div>
                                    </div>
                                
                                </fieldset>
                            </form>
                        </div>
                      
                    </div>
                </div> 
            </div>
        </div>                   
    </div>

    <div class="col-sm-12">
        <table id="tbl-rda-tags" class="table table-condensed table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th width="100">Tag Field</th>
                    <th>Tag Name</th>
                    <th>Repeatable</th>
                    <th>Record Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>

    </div>

</div>