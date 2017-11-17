<?php
include_once("header.php")
?>
<div class="enable-bootstrap">
<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td>Pengirim</td>
		<td>Perihal</td>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($result as $inbox) {
			echo "
				<tr>
					<td>".date('d M Y',strtotime($inbox->create_date))."</td>
					<td>".$inbox->sender."</td>
					<td>".anchor("notadinas/nav/nota_det/".$inbox->nota_id,$inbox->nota_perihal)."</td>
				</tr>
			";
		}
	?>
	</tbody>
</table>
</div>