<p style="color:gray;">About <?php echo sizeof($data['results']);?> results (<?php echo $data['time_taken']; ?> seconds) </p>
<table class="table table-borderless" id="searchResult">
<thead class="hidden">
    <tr>
        <td>Book</td>
    </tr>
</thead>
    <tbody id='searchBody'>
        <?php foreach($data['results'] as $entry): ?>
        <tr>
            <td>
                <div class="col-md-12 itm_container">
                    <p style="float:left;">
                        <img src="{{url('public/images/book-default.fw.png')}}" style="height:120px;" alt="items">
                    </p>
                    <p style="color:#004040;"><h4><a href="#"><?php echo $entry['title']; ?></a></h4></p>
                    <p style="font-size:0.8em; color:#004040;">Edition: <?php echo $entry['edition']; ?> <font style="margin-left:30px;">ISBN: <?php echo $entry['isbn']; ?></font> <font style="margin-left:30px;">Call No: <?php echo $entry['call_num']; ?></font><font style="margin-left:30px;">Available: <?php echo $entry['copies_available']; ?></font></p>
                    @if($entry['copies_available'] == 0 && !in_array($entry['catalogue_id'], isset($data['studentSession']['patronReservesCatalogueId'])?$data['studentSession']['patronReservesCatalogueId']:[]))
                    <button class="btn btn-xs btn-primary pull-right reserve-btn" id="btn-reserve-book" catalogue_id="<?php echo $entry['catalogue_id'];?>">Reserve</button>
                    @else
                    <button class="btn btn-xs btn-muted pull-right disabled reserve-btn" disabled catalogue_id="<?php echo $entry['catalogue_id'];?>">Reserve</button>
                    @endif
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>