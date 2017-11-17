<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	.formnya{
		width: 500px;
		height: 430px;
		margin: 0 auto;

	}
    table{
        width: 100%;
    }
    

</style>
<div id="content" class="enable-bootstrap">
	<h1 class="center">Dokumen Cuti <?php echo $judul ?></h1>
	<h3>Dokumen <?php echo $judul ?></h3>
	<table>
		<thead>
			<tr style="background-color: black; color:white; text-align: center;">
				<td>Tanggal Pembuatan</td>
				<td>Jenis Dokumen</td>
				<td>Pemohon</td>
				<td>Mulai</td>
				<td>Sampai</td>
				<td>Petugas Posting</td>
				<td>Atasan</td>
				<?php 
					if($judul=="Draft" or $judul=="Perlu Proses")
						echo "<td>Action</td>";
					else
						echo "<td>Status</td>";
				?>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($cutiData as $key) {
					$status="Dikembalikan";
					switch ($key->status) {
						case '0': $status = "Submit Atasan";
							break;
						case '1':$status = "Submit HR";
							break;
						
						default:
							break;
					}
					$key->mulai = strtotime($key->mulai);
					$key->tanggal_buat = strtotime($key->tanggal_buat);
					$key->selesai = strtotime($key->selesai);
					if($judul=="Draft")
						$action="<a href='".site_url("cuti/home/edit/".$key->id)."'>Edit</a>";
					else if($judul=="Perlu Proses")
						$action="<a href='".site_url("cuti/home/approve_form/".$key->id)."'>Approval form</a>";
					else if($judul=="yang di Return")
						$action="<a href='".site_url("cuti/home/edit/".$key->id)."'>Revisi</a>";
					else
						$action =$status;
					echo"
					<tr>
						<td>".date("Y-M-d H:i:s",$key->tanggal_buat)."</td>
						<td>".$key->jenis."</td>
						<td>".$key->emp_id." / ".$key->emp_firstname." ".$key->emp_lastname."</td>
						<td>".date("d/m/Y",$key->mulai)."</td>
						<td>".date("d/m/Y",$key->selesai)."</td>
						<td>".$key->emp_id_hr." / ".$key->emp_firstname_hr." ".$key->emp_lastname_hr."</td>
						<td>".$key->emp_id_kepala." / ".$key->emp_firstname_kepala." ".$key->emp_lastname_kepala."</td>
						<td>".$action."</td>
					</tr>
					";
				}
			?>
		</tbody>
	</table>
	<?php 
	if((int)$paging!=1)
            echo $paging;

            ?>
</div>
