<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td>Pengirim</td>
		<td></td>
		<td>Perihal</td>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($isi_folder as $inbox) {
			echo "
				<tr id='folder".$inbox->mapping_id."'>
					<td>".date('d M Y',strtotime($inbox->create_date))."</td>
					<td>";
					if($inbox->segera==1) echo "<div style='color:red'>!</div>";
					echo "</td>
					<td>".$inbox->sender."</td>
					<td><a  onclick=nota_det('".$inbox->nota_id."')>".$inbox->nota_perihal."</td>
				</tr>
			";
		}
	?>
	</tbody>
</table>