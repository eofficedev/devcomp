
<link rel="stylesheet" type="text/css" href="<?php  echo $this->config->item('css') ?>mycss.css"> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.1.min.js"></script>
<div class="enable-bootstrap">
<form role="form" enctype="multipart/form-data" method="post">
	<input type="hidden" name="nota_id" class="<?php echo $nota[0]->nota_id ?>" value="<?php echo $nota[0]->nota_id ?>" >
	<div class="form-group">
<table >
	<input type="text" id="idnota" value ="<?php echo $nota[0]->nota_id ?>" readonly="readonly" style="visibility:hidden">
		<tr>
			<td colspan="3"><H1>Nota Dinas</H1></td>
			<td><img class="logo-nota"height="150px" src='<?php echo base_url('css').'/'.$app_config->row()->logo_url; ?>'  height="25%"></td>
		</tr>
</table>
	<table>
		<tr>
			<td width="150px">Nomor Nota</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_number ?></td>
		</tr><tr>
			<td width="150px">Kepada</td>
			<td>:</td>
			<td colspan="2">
				<?php
					$i=1;
					foreach ($kepada as $k) {
						echo $i . ". ".$k->emp_firstname." " . $k->emp_lastname ."<br>";
						$i++;
					}
				 ?>
			</td>
		</tr>
		
		
		<tr>
			<td width="150px">Lampiran</td>
			<td>:</td>
			<td colspan="2">
				<?php
					foreach ($lampiran as $l) {
						echo "<a href='".$this->config->item("upload")."/".$l->lampiran_link."'>".$l->lampiran_name."</a><br>";
						
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="150px">Kode Masalah</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_kode_masalah ?></td>
		</tr>
		<tr>
			<td width="150px">Perihal</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_perihal ?></td>
		</tr>
</table>
<table>
	<tr>
	<td colspan="4">Isi Surat<br><br></td>
	</tr>
	<tr>
		<td colspan="4" >
			<div class='nota_isi' align="justify" style="width:100%;height:auto ;word-wrap: break-word">

			<?php echo $nota[0]->nota_isi ?>
			</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td ></td>
	</tr>
	<tr >
		<td colspan="4" style="padding-bottom:100px">
			<?php echo $options[0]->kota.", ". date("j F  Y", strtotime($nota[0]->nota_date)) ?>
		</td>
	</tr>
	<tr >
		<td colspan="4"  class="nama" id="nama-dari"><?php echo $options[0]->jabatan_pengirim  ?></td>
	</tr>
	<tr >
		<td colspan="4"  class="nik" id="nik-dari">
			<?php echo $options[0]->nik_pengirim ?>
			<br><br><br>
		</td>
	</tr>
	<tr>
			<td colspan="4" >Tembusan :</td>
			
		</tr>
	<?php
					$i=1;
					foreach ($tembusan as $k) {
						echo "<tr><td colspan='4'>".$i.". ".$k->emp_firstname."</td></tr>";
						$i++;
					}
				 ?>
</table>
</form>
</div>

</div>
<script type="text/javascript">
	$( document ).ready(function() {
    	window.print();
	});
</script>