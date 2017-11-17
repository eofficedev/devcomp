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
				<tr id='folder".$inbox->mapping_id."'>
					<td>".date('d M Y',strtotime($inbox->create_date))."</td>
					<td>";
					if($inbox->segera==1) echo "<div color='red'>!<div>";
					echo "</td>
					<td>".$inbox->sender."</td>
					<td><a onclick=nota_det('".$inbox->nota_id."')>".$inbox->nota_perihal."</a>   <a style='border:1px #f4f4f4 solid;' onclick=hapus_nota_folder('".$inbox->mapping_id."')><img src=".$this->config->item("images")."close.jpg></a></td>
				</tr>
			";
		}
	?>
	</tbody>
</table>