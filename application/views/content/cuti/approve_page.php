<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	
    table{
    }
    .ui-tabs{
        font-size: 10px;
        height: 70%;
    }
    .ui-datepicker{
        z-index: 9999999999;
    }
    td{
        padding-top: 10px;
    }
</style>
<?php 
    $cuti->mulai = strtotime($cuti->mulai);
    $cuti->selesai = strtotime($cuti->selesai);    
?>
<div id="content" style="height:auto;min-height:500px" >
    <?php if(isset($errornya))
        echo $errornya;
        else{ ?>
    <h1 class="center">Permohonan Cuti</h1><br>
    <?php echo form_open_multipart("cuti/home/approve/") ?>
    <div class="center">Jenis Cuti : 
        <?php echo $cuti->jenis; ?>
        <input type="hidden" readonly style="display:none" name="cuti_id" value="<?php echo $cuti->id ?>">
    </div>
        <br>
        <div style="width:100%;height:400px;">
            <div style="float:left;width:48%">
                <table>
                    <tr>
                        <td>Nama/NIK</td>
                        <td>:</td>
                        <td><?php echo $cuti_creator->emp_firstname." ".$cuti_creator->emp_lastname." / ".$cuti_creator->emp_id ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $cuti_creator->job_name ?></td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>:</td>
                        <td><?php echo $cuti_creator->org_name ?></td>
                    </tr>
                    <tr>
                        <td>Mulai Cuti</td>
                        <td>:</td>
                        <td><?php echo date("d M Y",$cuti->mulai) ?></td>
                    </tr>
                    <tr>
                        <td>Selesai Cuti</td>
                        <td>:</td>
                        <td><?php echo date("d M Y",$cuti->selesai) ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Selama Cuti</td>
                        <td>:</td>
                        <td><?php echo $cuti->alamat ?></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><?php echo $cuti->telpon ?></td>
                    </tr>
                    <tr>
                        <td>Alasan Tuti</td>
                        <td>:</td>
                        <td><?php echo $cuti->alasan ?></td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td><?php 
                            foreach ($lampiran as $key ) {
                                echo "<a href='".base_url("upload/cuti")."/".$key->link."'>".$key->name."</a>";
                            }
                        ?></td>
                    </tr>
                    <tr>
                        <td>Komentar</td>
                        <td>:</td>
                        <td><?php foreach ($komentar as $key) {
                            echo $key->komentar."<br>";
                        } ?></td>
                    </tr>

                </table>
            </div>
            <div style="float:left;width:40%">
                <table>
                    <tr>
                        <td>Sisa Cuti</td>
                        <td>:</td>
                        <td id="sisanya"></td>
                    </tr>
                    <tr>
                        <td colspan="3">Pemeriksa :</td>
                    </tr>
                    <tr>
                        <td>Atasan</td>
                        <td>:</td>
                        <td><input type="hidden" style="display:none" name="kepala_id" value="<?php echo $cuti->emp_num_kepala ?>"><?php echo $cuti->emp_id_kepala." / ".$cuti->emp_firstname_kepala." ".$cuti->emp_lastname_kepala ?></td>
                    </tr>
                    <tr>
                        <td>Petugas HR</td>
                        <td>:</td>
                        <td><input type="hidden" style="display:none" name="hr_id" value="<?php echo $cuti->emp_num_hr ?>"><?php echo $cuti->emp_id_hr." / ".$cuti->emp_firstname_hr." ".$cuti->emp_lastname_hr ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="padding-bottom:50px">
            <div class="center" style="width:auto;">
                <?php if($approve->status==0) {?>
                    <input type="submit" name="submit" value="Setuju">
                    <input type="submit" name="submit" value="Kembalikan">
                <?php }
                    else if($approve->status==1){
                        echo "Sudah di setujui";
                    }
                    else
                        echo "Sudah di kembalikan";
                ?>
            </div>
        </div>
    <?php echo form_close(); 
}
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
                type:"get",
                cache:false,
                data:"jenis_id=<?php echo $cuti->jenis_id ?>",
                url:"<?php echo site_url('cuti/home/getjenis').'/'.$cuti->emp_num ?>",
                success:function(data){
                    data = JSON.parse(data);
                    $("#sisanya").html(data.sisa);
                }
            });
    });
</script>