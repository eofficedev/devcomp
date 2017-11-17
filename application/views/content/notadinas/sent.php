<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td style="width:5px"></td>
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
			echo "</td>
					<td><a onclick=sent_det('".$inbox->nota_id."')>";

			if($inbox->nota_perihal=="")
				echo "Tidak ada subjek";
			else 
				echo $inbox->nota_perihal;

			echo "</a></td>
				</tr>
			";
		}
	?>
	</tbody>
</table>