<?php 

?>
<table>

	<tr>
		<td>Referensi</td>
	</tr>
	<?php 
		foreach ($referensi as $r) {
			echo "<tr><td><a href=".site_url('notadinas/nav/nota_det')."/".$r->nota_referensi.">".$r->nota_number."</td></tr>";
		}
	?>
</table>