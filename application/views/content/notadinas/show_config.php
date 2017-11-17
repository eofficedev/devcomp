<?php
include_once("header.php");
?>
<div id="content" class="enable-bootstrap" >
<div style="padding:30px 30px 30px 30px;">

<h1>Konfigurasi Nomor Nota</h1>

<form method="post" action="<?php echo site_url('notadinas/config/save') ?>">
	<table class="table table-stripped">
		<?php 
		$i = 0;
			foreach ($conf as $c) {
				echo "<tr>
					<td>".$i."</td>
					<td>".$c->tipe."</td>
					<td>:</td>
					<td>".$c->value."</td>
				</tr>";
				$i++;
			}
		?>
		<tr>
			<td></td>
					<td></td>
					<td></td>
					<td><?php echo  anchor("notadinas/config/set","Set Konfigurasi Penomoran Nota","class='btn btn-default'") ?></td>
		</tr>	
	</table>
</form>
</div>

</div>