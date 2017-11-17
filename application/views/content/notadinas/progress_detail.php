<?php include_once("header.php") ?>
<div class="enable-bootstrap" id="progress_det">
<div class="btn-group btn-group-justified btngrup<?php echo $nota[0]->nota_id ?>">


	<?php
	$valid = false;
	$i=1;
		$reject =false;
		$count = count($semua_pemeriksa);

     						foreach ($semua_pemeriksa as $pem) {
     							if($pem->exam_queue>1){
	     							if($pem->reject_status==1) $reject=true;
									$i++;
								}
     						}
 if(!$reject){
    if($pemeriksa[0]->reject_status==0 and $pemeriksa[0]->ok_status==0 and $pemeriksa[0]->status =="AKTIF" and $pemeriksa[0]->return_status==0 ) $valid = true;
    	if($valid)
	 {
	 ?>
	 	<a class="btn btn-default" role="button" onclick='progress_ok(<?php echo $pemeriksa[0]->examine_id; ?>,"btngrup<?php echo $nota[0]->nota_id ?>")'>Approve</a>
     	<a class="btn btn-default" role="button" href="<?php echo site_url('notadinas/nav/edit_form_prog/'.$nota[0]->nota_id) ?>/">Edit</a>
     	<?php if($pemeriksa[0]->exam_queue > 0 ) {?>	
     	<a class="btn btn-default" role="button" onclick='progress_reject(<?php echo $pemeriksa[0]->examine_id; ?>,"btngrup<?php echo $nota[0]->nota_id ?>")'>Reject</a>
     	
     	<a class="btn btn-default" role="button" onclick='progress_return(<?php echo $pemeriksa[0]->examine_id; ?>,"btngrup<?php echo $nota[0]->nota_id ?>")'>Return</a>
     
     <?php
 	}
     	}
     
     else 
     {

     	?>
		<a class="btn btn-default" id="btn-show-approver" role="button">Show Approver</a>

			<div id="dialog-form-info-pemeriksa" title="Data Folder">
			           <h4> Data Pemeriksa</h4>
					
     		<table>
     			<tr>
     				<td>Keterangan</td>

     			</tr>

     					<?php
     						$i=1;
     						foreach ($semua_pemeriksa as $pem) {
     							if($pem->exam_queue>0 ){
	     							$status;
									if($pem->ok_status==1) $status= "Approved";
									else if($pem->return_status==1) $status= "Returned";
									else if($pem->reject_status==1) $status= "Rejected";
									else $status = "Sedang di Proses";
									echo "<tr><td>Pemeriksa ke-".$i." :</td> <td>".$pem->emp_firstname." </td><td> :".$status."</td></tr>";
									$i++;
								}
     						}
     					?>
     			
     		</table>			            
			</div>

     	<?php
     }
 }
 else
 	  {
     	?>
		<a class="btn btn-default" id="btn-show-approver" role="button">Show Approver</a>

			<div id="dialog-form-info-pemeriksa" title="Data Folder">
			           <h4> Data Pemeriksa</h4>
					
     		<table>
     			<tr>
     				<td>Keterangan</td>
     				<td>:<td>
     				<td>
     					<?php
     						$i=1;
     						foreach ($semua_pemeriksa as $pem) {
     							if($pem->exam_queue>0 ){
	     							$status;
									if($pem->ok_status==1) $status= "Approved";
									else if($pem->return_status==1) $status= "Returned";
									else if($pem->reject_status==1) $status= "Rejected";
									else $status = "Sedang di Proses";
									echo "Pemeriksa ke-".$i." : ".$pem->emp_firstname." : ".$status."<br>";
									$i++;
								}
     						}
     					?>
     				</td>
     			</tr>
     		</table>			            
			</div>
	<?php
     }

     ?>
</div>
<form role="form" id="form_compose" enctype="multipart/form-data" method="post">
	<div class="enable-bootstrap form-group" >
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
			<td style="width:150px">Nomor Nota</td>
			<td>:</td>
			<td colspan="2"><?php echo $nota[0]->nota_number ?></td>
		</tr><tr>
			<td style="width:150px">Kepada</td>
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
	</form>
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
		<td style="width:150px"></td>
		<td></td>
		<td ></td>
	</tr>
	<tr >
		<td colspan="3" style="padding-bottom:100px">
			<?php  if(isset($options[0]->kota)) echo  $options[0]->kota.", ";else echo "bandung, " ;echo date("j F  Y", strtotime($nota[0]->nota_date)) ?>
		</td>
	</tr>
	<tr >
		<td class="nama" id="nama-dari"><?php echo $options[0]->jabatan_pengirim   ?></td>
	</tr>
	<tr >
		<td class="nik" id="nik-dari">
			<?php echo $options[0]->nik_pengirim ?>
			<br><br><br>
		</td>
	</tr>
	<tr>
			<td>Tembusan<br>
			<?php
					$i=1;
					foreach ($tembusan as $k) {
						echo $i.". Sdr. ".$k->job_name."<br>";
						$i++;
					}
				 ?>
				 <br></td>
		</tr>
	<tr>
		<td>
			Komentar<br><?php 
			foreach ($komentar as $k) {
				echo "<div style='margin-top:5px;border:1px solid black;' class='komentars'>".$k->comment."<br><br>from : ".$k->emp_firstname . " " . $k->emp_lastname."</div>";
			}
		?>
		<br>
	</td>
	</tr>
	
		<?php
	if($valid){
	?>

	<tr  >
		<td id="komentar_saya">Komentar Anda<br>
		<textarea class="form-control" id="comment"></textarea><br></td>
	</tr>
	<?php
		}
	 ?>
</table>

<?php 
	include_once("ref_det.php");
?>
</div>
<script type="text/javascript">

	var user = "<?php echo $user_aktif->emp_firstname ?>";
	user = user + " <?php echo $user_aktif->emp_lastname ?>";
function val(){
	var komentar = document.getElementById("comment").value;
	if(komentar!="")return true;
	else return false;
}
 function progress_ok(exam_id,cls){
 		if(val()==false) {
 			alert("silahkan submit komentar sebelum anda melanjutkan");
 			return false;
 		}
    	$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('notadinas/nav/progress_ok/') ?>/"+exam_id,
	            success: function(data)
	            {
	            	submit_komen();
	             alert(data);
	             	$("."+cls).remove();
				}
				});

    }
    function progress_reject(exam_id,cls){
    	if(val()==false) {
 			alert("silahkan submit komentar sebelum anda melanjutkan");
 			return false;
 		}
 		$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('notadinas/nav/progress_reject/') ?>/"+exam_id,
	            success: function(data)
	            {
	            	submit_komen();
	             alert(data);
	             	$("."+cls).remove();
				}
				});

    }
    function progress_return(exam_id,cls){
    	if(val()==false) {
 			alert("silahkan submit komentar sebelum anda melanjutkan");
 			return false;
 		}$.ajax({
                type: "GET",
                async: false,
	            url: "<?php echo site_url('notadinas/nav/progress_return/') ?>/"+exam_id,
	            success: function(data)
	            {
	            	submit_komen();
	             alert(data);
	             	$("."+cls).remove();
				}
				});

    }
function edit_prog_form(nota_id){
	$.ajax({
		type:"GET",
		url:"<?php echo site_url('notadinas/nav/edit_form_prog/') ?>/"+nota_id,
		success:function (data){
			document.getElementById("progress_det").innerHTML = data;
		}
	});
}

function submit_komen(){
	var komentar = document.getElementById("comment").value;
	var id_nota = document.getElementById("idnota").value;
	var tr = document.getElementById("komentar_saya");
	var fdata = new FormData();
       	fdata.append("komentar",komentar);
	$.ajax({
            type:"POST",
            cache:false,
            url:"<?php echo site_url('notadinas/nav/add_komen/'.$user_aktif->emp_num) ?>/"+id_nota,
            data: fdata,
		     processData: false,
		     contentType: false,
            success: function (data){
                alert("komentar telah di submit");
                tr.innerHTML = "<div style='margin-top:5px;border:1px solid black;'  class='komentars'>"+komentar+"<br><br>from : "+user+"</div>";
            }
        
        });
}
$( document ).ready(function() {
    	init_editor("nota_isi");
	});
</script>
</div>