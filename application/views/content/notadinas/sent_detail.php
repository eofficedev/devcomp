<?php 
	include_once("header.php");
?>
<script type="text/javascript">

    function show_folder(){

    	$("#dialog-form-pilih-folder").dialog("open");
    }
</script>
<div class="enable-bootstrap" id="nota_detail">
<div class="btn-group btn-group-justified btngrup<?php echo $nota[0]->nota_id ?>">
	<a class="btn btn-default" role="button" onclick='javascript:print_window("<?php echo site_url('notadinas/nav/print_nota/'.$nota[0]->nota_id) ?>")' >Print</a>
     
     <a class="btn btn-default" role="button" id="btn_show" onclick="show_disposisi()">Disposisi</a>
     <a class="btn btn-default" role="button" id="btn_close" style="display:none" onclick="close_disposisi()">Disposisi</a>

     	
</div>
<?php 
	include_once("disposisi.php");
?>

<form role="form" enctype="multipart/form-data" method="post">
	<input type="hidden" name="nota_id" class="<?php echo $nota[0]->nota_id ?>" value="<?php echo $nota[0]->nota_id ?>" >
	<div class="form-group">
<table >
	<input type="text" id="idnota" value ="<?php echo $nota[0]->nota_id ?>" readonly="readonly" style="visibility:hidden">
	<thead>
		<tr>
			<td colspan="3"><H1>Nota Dinas</H1></td>
			<td></td>
			<td><img class="logo-nota"height="150px" src='<?php echo base_url('css').'/'.$app_config->row()->logo_url; ?>'  height="25%"></td>
		</tr>

	</thead>
	<tbody>
		<tr>
			<td>Nomor Nota</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_number ?></td>
		</tr><tr>
			<td>Kepada</td>
			<td>:</td>
			<td colspan="2">
				<?php
					$i=1;
					foreach ($kepada as $k) {
						echo $i . ". Sdr. ".$k->job_name ."<br>";
						$i++;
					}
				 ?>
			</td>
		</tr>
		
		
		<tr>
			<td>Lampiran</td>
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
			<td>Kode Masalah</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_kode_masalah ?></td>
		</tr>
		<tr>
			<td>Perihal</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_perihal ?></td>
		</tr>
	</tbody>
</table>
<table>

	<tr>
	<td>Isi Surat<br><br></td>
	</tr>
	<tr>
		<td colspan="5" >
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
		<td colspan="3" style="padding-bottom:100px">
			<?php   echo $options[0]->kota.", ". date("j F  Y", strtotime($nota[0]->nota_date)) ?>
		</td>
	</tr>
	<tr >
		<td class="nama" id="nama-dari"><?php echo  $options[0]->jabatan_pengirim   ?></td>
	</tr>
	<tr >
		<td class="nik" id="nik-dari">
			<?php echo $options[0]->nik_pengirim ?>
			<br><br><br>
		</td>
	</tr>
	<tr>
			<td>Tembusan <br>
	<?php
					$i=1;
					foreach ($tembusan as $k) {
						echo $i.". Sdr. ".$k->job_name."<br>";
						$i++;
					}
				 ?>
				</td>
	<tr >
		<td>
	Komentar<br><?php 
			foreach ($komentar as $k) {
				echo "<div style='margin-top:5px;border:1px solid black;' class='komentars'>".$k->comment."<br><br>from : ".$k->emp_firstname . " " . $k->emp_lastname."</div>";
			}
		?>

	</td>
	</tr>
</table>
</form>
<?php 
	include_once("ref_det.php");
?>
</div>

</div>
</div>
<?php
	include_once("dialog_form.php");
?>
<script type="text/javascript">

</script>
