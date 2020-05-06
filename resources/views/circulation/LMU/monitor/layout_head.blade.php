<div class="col-md-12" >
    <span style="font-size:20px;color:#004040;">
            <sup style="font-size:13px;color:#00acac;">Barcode</sup><font> {{$data['barcode']}}</font>
    </span>
    <span class="pull-right" style="font-size:20px;color:#004040;">
            <sup style="font-size:13px;color:#00acac;">Date:</sup><font> {{(date('F j, Y', strtotime($data['date_received'])))}}</font>
    </span>
</div>
<div class="col-md-12" style="padding:0;">
    <hr>
</div>

<div class="col-md-5 col-lg-offset-1 no-padding">
    <p style="font-size:18px;color:#004040;"><b id="lmu-display-title">{{$data['info']['title']}}</b></p>
    <p style="font-size:10px; margin-top:-10px; text-align:justify;" id="lmu-display-note">{{$data['note']}}</p>
    <p style="font-size:18px;color:#00acac;" id="lmu-display-edition">1 <sup>st</sup> Edition</p>
    <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;"><b >Author:</b></span> <span id="lmu-display-author">{{ucwords($data['info']['author'])}}</span></p>
</div>

<div class="col-md-6" >
    <span style="font-size:25px;color:#004040;">
            <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;"><b>Call Number:</b></span> {{$data['call_num']}}</p>
            <p style="font-size:13px; color:#00acac;"><span style="font-size:12px; color:#004040;"><b>Accension:</b></span> {{$data['acc_num']}}</p>
    </span>
</div>
<div class="col-md-6" >
    <span style="font-size:68px;color:#004040; margin-top:-10px;">
        <p>{{$data['count']}}<font style="font-size:10px;">usage</font></p>
    </span>
</div>
<div class="col-md-12" style="height:10px;"></div>
<div class="col-md-12" style="padding:0;">
    <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><i class="fa fa-desktop"></i> List of Student who borrowed this Book</h4>
            </div>
        <div class="panel-body" style="max-height:700px; overflow:auto;">
            <div class="row">
                <div class="col-md-12">
                    @if(count($data['list']) > 0)
                        <table class="table" id="list-usage-monitor_head">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Date Borrowed</th>
                                        <th>Returned Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['list'] as $val)
                                        <tr style="">
                                                <td>
                                                    <p style="font-size:12px;color:#004040;"><b>{{$val['info']['full_name']}}</b></p>
                                                    <p style="font-size:10px; margin-top:-10px; text-align:justify;">{{$val['info']['student_id']}}</p>
                                                </td>
                                                <td>{{strtoupper($val['info']['course'])}}</td>
                                                <td>{{(date('F j, Y', strtotime($val['loaned_date'])))}}</td>
                                                {{-- <td>{{(date('F j, Y', strtotime($val['returned_date'])))}}</td> --}}
                                                {{-- <td>{{$val['returned_date']}}</td> --}}
                                                <td><?php echo ($val['returned_date']!=NULL) ? (date('F j, Y', strtotime($val['returned_date']))) : 'Not Returned' ?></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    @else
                           <p class="text-success">no record</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e){
        __init_gen('{!!json_encode($data['gen-list'])!!}');
        __initDataChart('{!!json_encode($data['statistics-data'])!!}');
    });
</script>