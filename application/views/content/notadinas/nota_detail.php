<?php 
	include_once("header.php");
?>
<script type="text/javascript">
	
function copy_ref(){
	var idnota = "<?php echo $nota[0]->nota_id ?>";
 	   $.ajax({
                	type:"GET",
                	cache:false,
                	url:"<?php echo site_url('notadinas/nav/copy_ref') ?>/"+idnota,
                	success:function (data2){
                	}
                });
}

    function show_folder(){
    	$("#dialog-form-pilih-folder").dialog("open");
    }
</script>
<div class="enable-bootstrap" id="nota_detail">
<div class="btn-group btn-group-justified btngrup<?php echo $nota[0]->nota_id ?>">
	<a class="btn btn-default" role="button" onclick='javascript:print_window("<?php echo site_url('notadinas/nav/print_nota/'.$nota[0]->nota_id) ?>")' >Print</a>
     <a class="btn btn-default" role="button"  onclick="show_folder()">Copy to Folder</a>
     <a class="btn btn-default" role="button" id="btn_show" onclick="show_disposisi()">Disposisi</a>
     <a class="btn btn-default" role="button" id="btn_close" style="display:none" onclick="close_disposisi()">Disposisi</a>
     <a class="btn btn-default" role="button"  onclick="show_agenda()">Agenda</a>
 <a class="btn btn-default" role="button"  onclick="copy_ref()">Copy Ref</a>

     	
</div>
<?php 
	include_once("disposisi.php")
?>
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
	<tbody>
		<tr>
			<td>Nomor Nota</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_number ?></td>
		</tr ><tr>
			<td style="width:150px">Kepada</td>
			<td>:</td>
			<td colspan="4">
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
			<td style="width:150px">Lampiran</td>
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
			<td style="width:150px">Kode Masalah</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_kode_masalah ?></td>
		</tr>
		<tr>
			<td style="width:150px">Perihal</td>
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
		<td  colspan="4"class="nama" id="nama-dari"><?php echo $options[0]->jabatan_pengirim  ?></td>
	</tr>
	<tr >
		<td  colspan="4" class="nik" id="nik-dari">
			<?php echo $options[0]->nik_pengirim ?>
			<br><br><br>
		</td>
	</tr>
	<tr>
			<td  colspan="4">Tembusan :<br>
	<?php
					$i=1;
					foreach ($tembusan as $k) {
						echo $i.". Sdr. ".$k->job_name."<br>";
						$i++;
					}
				 ?>
				</td>
			</tr>
</table>

<?php 
	include_once("ref_det.php");
?>
</form>
</div>

</div>
<?php
	include_once("dialog_form.php");
	include_once("dialog_agenda.php");
	include_once("dialog_agenda.php");

?>
<script type="text/javascript">

</script>

<div id="dialog-form-pilih-folder" title="Data Folder" style="z-index:99999">
    <div id="tabs">
        <div id="tabs-1" style="font-size: smaller;">
            <h4> Nota Dinas</h4>
           <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;" >
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama Folder</th>
                    <th>Set</th>
                </tr>
                <?php
                if(count($folder)<1){
                	echo "anda belum membuat Folder";
                }
                else{
                foreach ($folder as $f) {
                    if($f->folder_name<>"inbox" and $f->folder_name<>"sent" and $f->folder_name<>"draft" and $f->folder_name<>"progress" and $f->folder_name<>"archive"){ 
                        ?>
                    <tr id="pilihan-<?php echo $f->folder_id; ?>">
                        <td id="fold-<?php echo $f->folder_id; ?>" style="padding-left:20px;"><?php echo $f->folder_name ?></td>
                        <td ><button onclick='pilih_folder("<?php echo $f->folder_id; ?>")'>pilih</button></td>                        
                    </tr>
                    <?php
                    }
                }
            }
                ?>
            </table>
        </div>
    </div>
</div>
