<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td>Perihal</td>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($isi_folder as $draft) {
			$show = $draft->nota_perihal;
			if($draft->nota_perihal==""){
				$show = "Tidak Ada Subject";
			}
			echo "
				<tr>
					<td>".date('d M Y',strtotime($draft->create_date))."</td>
					<td><a onclick=nota_edit_form(".$draft->nota_id.")>".$show."</a></td>
				</tr>
			";
		}
	?>
	</tbody>
</table>