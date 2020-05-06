<style type="text/css">
	
	#tbl-full-marc-record tr:hover{
		cursor: pointer;
	}

	.selected {
		background-color: #e8e8e8;
	}

</style>
<div style="height: 600px; overflow:scroll;">
	<table class="table table-condensed table-bordered" id="tbl-full-marc-record">
		<thead>
			<tr>
				<th width="250">Field Name</th>
				<th width="25">I1</th>
				<th width="25">I2</th>
				<th width="250">Subfield</th>
				<th width="450">Data</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data as $key => $value) : ?>
				
				<tr repeatable="{{$value['repeatable']}}" id="{{$value['id']}}" dataID = "<?php echo (isset($value['field_id'])) ? $value['field_id'] : '' ?>" >
					<td>{{ ($value['tagname']) }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<?php foreach ($value['subfield'] as $k => $v) : ?>
					<tr class="items" sub_id="{{$v['sub_id']}}" subfield="{{$v['tagsubfield']}}" id="{{$value['id']}}" dataID = "<?php echo (isset($value['field_id'])) ? $value['field_id'] : '' ?>" tagfield="{{ $value['tagfield'] }}" repeatable="{{$v['repeatable']}}">
						<td></td>
						<td></td>
						<td></td>
						<td>{{ ($v['tagsubfieldname']) }}</td>
						<td><input type="text" style=" width:100%; height:100%; border:0; outline:0; background: transparent; padding: 0;" value="<?php echo (isset($v['tagsubfieldvalue'])) ? ($v['tagsubfieldvalue']) : ''?>"></td>
					</tr>
				<?php endforeach; ?>

			<?php endforeach; ?>
		</tbody>
	</table>
</div>
{{-- < ?php 
echo '<pre>';
var_dump($data);
echo '<\pre>';
? > 
 --}}