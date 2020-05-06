<?php 
	

    $catalogue = $data[0];
    $marc = $data[1];
    $material_types = $data[2];

	$other_details = array(
			'Material Type' => $catalogue[0]->material_name, 
            'ISBN' => $marc['isbn']['a'], 
            'Edition' => $marc['edition_statement']['a'], 
            'Price' => $catalogue[0]->price,
            'Call Number' => '',
            'Volume' => $marc['series_statement']['v']
		);

?>
<div class="row">						
	<div class="col-sm-12">
	  	
        <div class="col-sm-12 text-right">
            <div class="checkbox">
                <label class="text-primary">
                    
                </label>
            </div> 
        </div>

	  	<div class="profile-container">
	  		<div class="profile-section">
                   
                    <div class="profile-left">
                 
                        <div class="profile-image">
                            <img src="{{asset('public/img/default-book-cover.png')}}" style="">
                            <i class="fa fa-user hide"></i>
                        </div>
                     
                        <div class="m-b-10">
                            <a href="#" class="btn btn-warning btn-block btn-sm">Change Picture</a>
                        </div>
                        <div class="profile-highlight">
                            <!-- <h4><i class="fa fa-pencil"></i> Edit</h4> -->
                            <div class="checkbox m-b-5 m-t-0">
                                <label><input type="checkbox" value="" id="editing_mode"> <i class="fa fa-pencil"></i>  Edit</label>
                            </div>
                            <!-- <div class="checkbox m-b-0">
                                <label><input type="checkbox"> Show i have 14 contacts</label>
                            </div> -->
                        </div>
                    </div>
                    <!-- begin profile-right -->
                    <div class="profile-right">
                        <!-- begin <p></p>rofile-info -->
                        <div class="profile-info">
                            <!-- begin table -->
                            <div class="table-responsive">
                                <table class="table table-profile">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th id="title">
                                                <span class="editable-label" data-type="text" data-title="Title"><?php echo $marc['title_statement']['a']; ?></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">Subtitle</td>
                                            <td>
                                               <span class="editable-label" data-type="text" data-title="Subtitle"> <?php echo $marc['title_statement']['b']; ?> </span>
                                            </td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Responsibility</td>
                                            <td>
                                                 <span class="editable-label" data-type="text" data-title="Statement of Responsibility"><?php echo $marc['title_statement']['c']; ?></span>
                                            </td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Author</td>
                                            <td> 
                                                <span class="editable-label" data-type="text" data-title="Author"><?php echo $marc['main_entry']['a'] ?> </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Dates</td>
                                            <td>
                                               <span class="editable-label" data-type="text" data-title="Author"><?php echo $marc['main_entry']['d']; ?> </span>
                                            </td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Publisher</td>
                                            <td> 
                                                <span class="editable-label" data-type="text" data-title="Publisher"> <?php echo $marc['publication']['b']; ?> </span>
                                            </td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Date</td>
                                            <td> 
                                                <span class="editable-label" data-type="text" data-title="Date of Publication"> <?php echo $marc['publication']['c'] ?> </span>
                                            </td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Place</td>
                                            <td>
                                                <span class="editable-label" data-type="text" data-title="Place of Publication"><?php echo $marc['publication']['a'] ?></span>
                                            </td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <?php  foreach ($other_details as $key => $value ) { ?>
                                       		<tr>
                                                <?php
                                                    if( $key == 'Material Type' ){
                                                        ?>    
                                                            <td class="field"><?php echo ucwords($key);?></td>
                                                            <td> 
                                                                <span class="editable-label" data-value="<?php echo $catalogue[0]->material_type_id; ?>" id="" data-type="select" data-title="Material Type"> <?php echo strtoupper($value);?> </span>
                                                            </td>
                                                        <?php
                                                        continue;
                                                    }
                                                ?>
	                                            <td class="field"><?php echo ucwords($key);?></td>
	                                            <td> <span class="editable-label" data-type="text" data-title="<?php echo $key; ?>"> <?php echo $value;?> </span> </td>
	                                        </tr>
                                        <?php } ?>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Extent</td>
                                            <td>
                                                <span class="editable-label" data-type="text" data-title="<?php echo 'Extent'; ?>"><?php echo $marc['physical_description']['a']; ?></span>
                                            </td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Size</td>
                                            <td>
                                              <span class="editable-label" data-type="text" data-title="Size/Dimension"><?php echo $marc['physical_description']['b']; ?></span>
                                            </td>
                                        </tr>
                                        <tr class="highlight">
                                            <td class="field">Other Physical Details</td>
                                            <td>
                                                <span class="editable-label" data-type="text" data-title="Other Physical Details"><?php echo $marc['physical_description']['c']; ?></span>
                                            </td>
                                        </tr>
                                        <tr class="divider">
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="field">Remarks</td>
                                            <td>
                                                <span class="editable-label" data-type="textarea" data-title="Remarks"><?php echo $catalogue[0]->remarks; ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table -->
                        </div>
                        <!-- end profile-info -->
                    </div>
                    <!-- end profile-right -->
                </div>
	  	</div>
	</div>
</div>