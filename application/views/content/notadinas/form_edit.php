<?php
	include_once("header.php");
 ?>
<div id = "edit_detail" class="enable-bootstrap">
<div class="btn-group btn-group-justified">
	 <a class="btn btn-default" role="button" onclick='submit_edit()'>Submit</a>
     <a class="btn btn-default" id="btn-draft" role="button" onclick='simpan_draft()'>Simpan Draft</a>
     <a class="btn btn-default" onclick = "delete_draft('<?php echo $nota->nota_id ?>')" role="button">Delete</a>
     <a class="btn btn-default" onclick="paste_ref()" role="button">Paste Ref</a>
     <a class="btn btn-default" id="btn_options "role="button" onclick="open_options()">Options</a>
</div>
<div role="form" id="form_edit">
	<div class="form-group">
<table >
	<thead>
		<tr>
			<td><H1>Nota Dinas</H1></td>
			<td></td>
			<td></td>
			<td><img class="logo-nota"height="150px" src='<?php echo base_url('css').'/'.$app_config->row()->logo_url; ?>'  height="25%"></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Kepada</td>
			<td>:</td>
			<td colspan="2"><select class="form-control sel" size="4" id="kepada">
				<?php 
					foreach ($kepada as $k) {
						if($k->cc_status==0)
						echo "<option value='".$k->emp_num."'>".$k->emp_firstname." ".$k->emp_lastname." / ". $k->job_name ." </option>";
					}
				 ?>
			</select >
				<a class='btn btn-default' id='btn-show-kepada' onclick="open_dialog('kepada')">Adress Book</a>
					  <a class='btn btn-default' id='btn-delete-kepada' onclick="delete_option('kepada')">Delete</a></td>
		</tr>
		<tr>
			<td>Dari</td>
			<td>:</td>
			<td colspan="2"><select class="form-control sel"  id="dari" style="-webkit-appearance: none;">
				<?php
					echo "<option value='".$dari->emp_num."'>".$dari->emp_firstname." ".$dari->emp_lastname." / ". $dari->job_name . "</option>";
				 ?>
			</select>
				<a class='btn btn-default' id='btn-show-kepada' onclick="open_dialog_pemeriksa('dari')">Adress Book</a>
					  <a class='btn btn-default' id='btn-delete-kepada' onclick="delete_option('dari')">Delete</a></td>
		</tr>
		<tr>
			<td>Tembusan</td>
			<td>:</td>
			<td colspan="2"><select class="form-control sel" size="4" id="tembusan">
				<?php 
					foreach ($tembusan as $k) {
						echo "<option value='".$k->emp_num."'>".$k->emp_firstname." ".$k->emp_lastname." / ". $k->job_name . "</option>";
					}
				 ?>
			</select>
				<a class='btn btn-default' id='btn-show-kepada' onclick="open_dialog('tembusan')">Adress Book</a>
					  <a class='btn btn-default' id='btn-delete-kepada' onclick="delete_option('tembusan')">Delete</a>
			</td>
		</tr><tr>
			<td>Pemeriksa</td>
			<td>:</td>
			<td colspan="2"><select class="form-control sel" size="4" id="pemeriksa">
				<?php 
					foreach ($pemeriksa as $k) {
						echo "<option value='".$k->examiner_id."'>".$k->emp_firstname." / ".$k->job_name."</option>";
					}
				 ?>
			</select>
				<a class='btn btn-default' id='btn-show-kepada' onclick="open_dialog_pemeriksa('pemeriksa')">Adress Book</a>
					  <a class='btn btn-default' id='btn-delete-kepada' onclick="delete_option('pemeriksa')">Delete</a>
			</td>
		</tr>
		<tr>
			<td>Lampiran</td>
			<td>:</td>
			<td colspan="2">
				<?php
					foreach ($lampiran as $l) {
						echo "<div id='lampiran".$l->lampiran_id."'><a href='".$this->config->item("upload")."/".$l->lampiran_link."'>".$l->lampiran_name."</a>  <a onclick=hapus_lampiran('".$l->lampiran_id."')>Hapus</a></div>";
					}
				?>
				<iframe id="upload_target" name="upload_target" src="" style="width:0px;height:0px;border:0px solid #fff;"></iframe>
				<form id="file_upload_form" target="upload_target" method="post" enctype="multipart/form-data" action="<?php echo site_url('notadinas/nav/upload/') ?>">
						
					<input type="text" id="notaid" value="<?php echo $nota->nota_id; ?>" style="width:0px;height:0px;border:0px" name="notaid">
				<div id="kolom_attachment">

					<input type="file" name="nota_att[]" class="attachments" >
					<input type="submit" style="width:0px;height:0px;border:0px" >
					</div> <a id="addfile" onclick="add_file()")>Add Item</a></td>
			</form>
			</tr>
		<tr>
			<td>Kode Masalah</td>
			<td>:</td>
			<td colspan="2">
				<?php
					
						$option = array();
						foreach ($masalah as $m) {
							$option[$m->kode_masalah] = $m->kode_masalah . " / " . $m->masalah;

						}		
						echo form_dropdown('kode_masalah', $option, 'inbox',"class='folder-combo combobox form-control ' id='kode_masalah'");
						
				?>
			</td>
		</tr>
		<tr>
			<td>Perihal</td>
			<td>:</td>
			<td colspan="2"><input class="form-control" type="text" id="perihal" value='<?php echo $nota->nota_perihal ?>'></td>
		</tr>
	</tbody>
	</form>
</table>
<table>

	<tr>
	<td>Isi Surat<br><br></td>
	</tr>
	<tr>
		<td colspan=4>
			<textarea name="nota_isi" id="nota_isi" class="ckeditor  form-control" style="width:100%"><?php echo $nota->nota_isi ?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td ></td>
	</tr>
	<tr >
		<td style="padding-bottom:100px"><div style="float:left" id="text_kota"><?php  echo $options[0]->kota ?></div>,</td>
		<td colspan="3">  <input type = "Date" name="tanggal" id="nota_tanggal" value ="<?php echo $nota->nota_date ?>" class="form-control date-pik" style="width:150px;"></td>
	</tr>
	<tr >
		<td class="nama" id="nama-dari"><?php  echo $options[0]->jabatan_pengirim ?></td>
	</tr>
	<tr >
		<td class="nik" id="nik-dari"><?php  echo $options[0]->nik_pengirim ?></td>
	</tr>
	<tr>
		<td colspan="2">Referensi:<br>
		
			<select class="form-control sel" size="4" id="ref">
				<?php 
					foreach ($referensi as $key) {
						echo"<option value='".$key->nota_referensi."'>".$key->nota_number."</option>";
					}
				?>
			</select ><br>
<a class='btn btn-default' id='btn-delete-kepada' onclick="delete_option('ref')">Delete</a></td>
	<br>
		</td>
	</tr>
	<tr >
		<td colspan="2">Komentar:<br>
		<textarea class="form-control" id="comment"></textarea></td>
	</tr>
</table>

</div>

</div>
<script type="text/javascript">


	function delete_draft(nota_id){

$.ajax({
                	type:"GET",
                	cache:false,
                	url:"<?php echo site_url('notadinas/nav/delete_draft') ?>/"+nota_id+"/<?php echo $user_aktif->emp_num ?>",
                	success:function (data2){
                		document.getElementById("edit_detail").innerHTML = "data Nota Telah Di Hapus";
                	}
                });
}

    $( document ).ready(function() {
    	init_editor("nota_isi");
	});

			function hapus_lampiran(id){
				$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('notadinas/nav/hapus_lampiran/') ?>/"+id,
	            success: function(data)
	            {
	            	$("#lampiran"+id).remove();
	            }
				});
			}
			function submit_edit(nota_id){
 		var konf = confirm("Apakah Anda yakin akan submit nota dinas ini?");
 		if (konf==true){
        var optkepada = document.getElementById("kepada").options;
        var optref = document.getElementById("ref").options;
        var optdari = document.getElementById("dari").options;
        var opttembusan = document.getElementById("tembusan").options;
        var optpemeriksa = document.getElementById("pemeriksa").options;
        var lampiran = $('input:text.lampiran').serialize();
       var nota_id = document.getElementById("notaid").value;
        var kode_masalah = document.getElementById("kode_masalah").value;
        var perihal = document.getElementById("perihal").value;
        var isi = get_value_isi("nota_isi");
        var attachment = $('input:file.attachments').val();
        var tanggal_nota = document.getElementById("nota_tanggal").value;
        var komentar = document.getElementById("comment").value;
       	var ck = document.getElementById("kepada").length;
       	var cd = document.getElementById("dari").length;
       	var ct = document.getElementById("tembusan").length;
       	var cp = document.getElementById("pemeriksa").length;
       	var cr = document.getElementById("ref").length;
       	var pesan="";
 	var sbmt=false;
 	if(ck == 0){
 		pesan = pesan +", field kepada ";
 		sbmt=true;
 	}if( cd ==0){
 		pesan = pesan +", field dari ";
 		sbmt=true;
 	} 
 	if( komentar=="" ){
 		pesan = pesan +", field komentar ";
 		sbmt=true; 		
    }
 	if(isi=="" ){
 		pesan = pesan +", field isi ";
 		sbmt=true; 		
    }

     if(sbmt){
     	alert("maaf "+ pesan + "masih Belum di isi!");
     	return false;
     }

       	else{
       	var kepada=[];
       	var tembusan=[];
       	var pemeriksa=[];
       	var ref=[]
       	for (var i = 0 ; i < ck; i++) {
       		kepada.push(optkepada[i].value);
       	}
       	for (var i = 0 ; i < ct; i++) {
       		tembusan.push(opttembusan[i].value);
       	}
       	for (var i = 0 ; i < cp; i++) {
       		pemeriksa.push(optpemeriksa[i].value);
       	}
       	if(cr >0){
       		for (var i = 0 ; i < cr; i++) {
       			ref.push(optref[i].value);
       		}
       	}
		var dari = optdari[0].value;
		pemeriksa.push(dari);
        var fdata = new FormData();
       	fdata.append("nota_perihal",perihal);
        fdata.append("referensi",ref);
        fdata.append("nota_isi",isi);
        fdata.append("nota_sender",dari);
        fdata.append("nota_date",tanggal_nota);
        fdata.append("referensi",ref);
        fdata.append("nota_kode_masalah",kode_masalah);
        fdata.append("kepada",kepada);
        fdata.append("tembusan",tembusan);
        fdata.append("lampiran",lampiran);
        fdata.append("attachment",attachment);
        fdata.append("pemeriksa",pemeriksa);
        fdata.append("komentar",komentar);
        fdata.append("attachment", attachment);
        $.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo site_url('notadinas/nav/submit_edit_draft/'.$user_aktif->emp_num) ?>/"+nota_id,
            data: fdata,
		     processData: false,
		     contentType: false,
            success: function (data){
		document.getElementById('nota_id_config').value = data;
            		document.getElementById('save-config').submit();
            	document.getElementById('file_upload_form').submit();
            	$("input[type=text],input[type=file], textarea").val("");
            	$('.sel option').remove();
            	var url="<?php echo site_url('notadinas/nav/nota_det_prog') ?>/"+nota_id+"/<?php echo $user_aktif->emp_num ?>";
                $.ajax({
                	type:"GET",
                	cache:false,
                	url:"<?php echo site_url('notadinas/nav/delete_draft') ?>/"+nota_id+"/<?php echo $user_aktif->emp_num ?>",
                	success:function (data2){
                	}
                });
                $.ajax({
                	type:"GET",
                	cache:false,
                	url:"<?php echo site_url('notadinas/nav/nota_det_prog') ?>/"+nota_id+"/<?php echo $user_aktif->emp_num ?>",
                	success:function (data2){

                		window.location =url;
                	}
                });
            }
        
        });

    	}
   	  }
    }
    
    function simpan_draft(){
    	var nota_id = document.getElementById("notaid").value;
        var optkepada = document.getElementById("kepada").options;
        var dari = document.getElementById("dari").value;
        var opttembusan = document.getElementById("tembusan").options;
        var optref = document.getElementById("ref").options;
        var optpemeriksa = document.getElementById("pemeriksa").options;
        var lampiran = $('input:text.lampiran').serialize();
        var kode_masalah = document.getElementById("kode_masalah").value;
        var perihal = document.getElementById("perihal").value;
        var isi = get_value_isi("nota_isi");
        var attachment = document.getElementsByClassName("attachments");
        var tanggal_nota = document.getElementById("nota_tanggal").value;
        var komentar = document.getElementById("comment").value;
       	var ck = document.getElementById("kepada").length;
       	var ct = document.getElementById("tembusan").length;
       	var cp = document.getElementById("pemeriksa").length;
       	var cr = document.getElementById("ref").length;
       
	       	var kepada=[];
	       	var tembusan=[];
	       	var pemeriksa=[];
	       	var ref=[];
	       	for (var i = 0 ; i < ck; i++) {
	       		kepada.push(optkepada[i].value);
	       	}
	       	for (var i = 0 ; i < ct; i++) {
	       		tembusan.push(opttembusan[i].value);
	       	}
	       	for (var i = 0 ; i < cp; i++) {
	       		pemeriksa.push(optpemeriksa[i].value);
	       	}
       	if(cr >0){
       		for (var i = 0 ; i < cr; i++) {
       			ref.push(optref[i].value);
       		}
       		
       	}
	       	
	        var fdata = new FormData();
        fdata.append("referensi",ref);
	       	fdata.append("nota_id",nota_id);
	       	fdata.append("nota_perihal",perihal);
	        fdata.append("nota_isi",isi);
	        fdata.append("nota_sender",dari);
	        fdata.append("nota_date",tanggal_nota);
	        fdata.append("nota_kode_masalah",kode_masalah);
	        fdata.append("kepada",kepada);
	        fdata.append("tembusan",tembusan);
	        fdata.append("lampiran",lampiran);
	        fdata.append("attachment",attachment);
	        fdata.append("pemeriksa",pemeriksa);
	        fdata.append("komentar",komentar);
	        fdata.append("attachment", attachment);
			
	        $.ajax({
	            type:"POST",
	            cache:false,
	            url:"<?php echo site_url('notadinas/nav/simpan_draft/'.$user_aktif->emp_num) ?>/"+nota_id,
	            data: fdata,
			     processData: false,
			     contentType: false,
	            success: function (data){
	            	document.getElementById('notaid').value = data;
            		document.getElementById('file_upload_form').submit();
            		document.getElementById('save-config').submit();
            		alert("Data Nota Telah Disimpan  draft");
	            },
	        	 error: function(xhr, textStatus, error){
				      console.log(xhr.statusText);
				      console.log(textStatus);
				      console.log(error);
				  }
	        });
	   	 
    }
</script>
<?php 
include_once("dialog_form.php")
?>
</div>