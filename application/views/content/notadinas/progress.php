<table class="table table-striped">
	<thead>
	<tr>
		<td>Tanggal</td>
		<td></td>
		<td>Status</td>
		<td>Perihal</td>
	</tr>
	</thead>
	<tbody>
	<?php
	
		foreach ($isi_folder as $progress) {
			$status;
			$read="";
			if($progress->reject_status==1) $status= "Rejected";
			else if($progress->sent_status==1) $status= "Sent";
			else if($progress->return_status==1) $status= "Returned";
			else if($progress->ok_status==1) $status= "Approved";
			else $status = "Belum di Approve";
			if ($progress->read_status==0){
				$read = "style='color:red;'";
			}
			echo "
				<tr>
					<td ".$read.">".date('d M Y H:i:s',strtotime($progress->exam_date))."</td>
					<td>";
			if($progress->segera==1) echo "<div style='color:red'>!</div>";
			echo "</td><td ".$read.">".$status."</td>
					<td ".$read."><a onclick=nota_det_prog(".$progress->nota_id.",".$progress->examiner_id.")>".$progress->nota_perihal."</td>
				</tr>
			";
		}
	?>
	</tbody>
</table>