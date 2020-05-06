<div class="row">
    <div class="panel-group" id="accordion" >
        <div class="panel panel-default">
            <div class="panel-heading">
                 <div class="panel-heading-btn">
                    <a class="btn btn-xs  btn-success accordion-toggle accordion-toggle-styled"  data-toggle="collapse" data-parent="#accordion_form_tags" href="#collapseOne"><i class="fa fa-plus"></i> Add Template</a>
                </div>
                <h4 class="m-t-10">Template <small>Configuration</small></h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <div class="row" style="background-color: #f1f1f1; padding: 10px;">
                    
                        <div class="col-sm-12">
                            <form id="frm-cat-template">
                                <fieldset>
                                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                    <input type = "hidden" name = "_type" value = "cat_templates">
                                    <div class="col-sm-12"><h4 class="m-t-10">Create Template</h4></div> 
                                    
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Template name</label>
                                            <input type="text" class="form-control" name="template_name" required id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <input type="text" class="form-control" name="description" required id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-success" style="margin-top:23px;"> Save </button>
                                            <button type="submit" class="btn btn-sm btn-default" id="btn-template-clear" style="margin-top:23px;"> Clear </button>
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
        <div class="col-sm-12">
            <div class="note note-info">
                <h4>General Instructions goes here --> </h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Maecenas id gravida libero. Etiam semper id sem a ultricies. Donec id consequat magna.
                    Suspendisse tincidunt blandit metus, eu pretium nibh tincidunt eget.
                </p>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8">
                        <form class="form-horizontal">
                           <div class="form-group">
                                <label class="col-md-6 control-label" style="font-family: open-sansbold;">Select Template and change its Tags: </label>
                                <div class="col-md-6">
                                    <select class="form-control" id="select-template-list"></select>
                                </div>
                            </div>
                        </form>
                    </div>
                   

                    <div class="col-sm-4"></div>
                    
                </div>

                <div class="col-sm-12">
                    <form id="frm-checkbox-tags">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <input type = "hidden" name = "template_id" id="template_id-checkbox">
                        <div class="col-sm-10" style="border: 1px solid #ccc; background-color: #f1f1f1;">
                        <?php
                            foreach (array_chunk($data['marc_tags'], 10, true) as $key => $value) {
                                echo '<div class="col-sm-4">';
                                    foreach ($value as $k => $v) : ?>
                                    
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="tags[]" class="template-with-tags" value="<?php echo $v['id'];?>" id="<?php echo $v['id'];?>">
                                                    <?php echo $v['tagfield'].' '.strtoupper($v['tagname']) ;?>
                                                </label>
                                            </div>
                                    <?php endforeach; 
                                echo '</div>';
                            }
                        ?>
                        </div>
                    </form>
                    <div class="col-sm-2">
                        <div class="col-sm-12" style="padding: 10px;">
                            <a href="javascript:;" class="btn btn-sm btn-white btn-block" id="btn-change-template-name"> Change Name </a>
                            <a href="javascript:;" class="btn btn-sm btn-white btn-block" id="btn-update-template-tags"> Update Template </a>
                            <!-- <a href="javascript:;" class="btn btn-sm btn-white btn-block"> Add Template </a> -->
                            <a href="javascript:;" class="btn btn-sm btn-white btn-block" id="btn-remove-template-tags"> Remove Template </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>