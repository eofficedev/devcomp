<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td style="width:5px;"></td>
		<td>Pengirim</td>

		<td>Perihal</td>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($isi_folder as $inbox) {
			echo "
				<tr>
					<td>".date('d M Y',strtotime($inbox->create_date))."</td><td>";
					if($inbox->segera==1) echo "<div style='color:red'>!</div>";
					echo "</td><td>
					".$inbox->sender."</td>
					<td><a onclick=nota_det('".$inbox->nota_id."')>".$inbox->nota_perihal."</a></td>
				</tr>
			";
		}
	?>
	</tbody>
</table>