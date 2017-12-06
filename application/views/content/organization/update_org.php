<script type='text/javascript'>
    $('document').ready(function(){
        $('#hapus-btn').click(function(){
            var x = confirm("Apakah anda yakin akan menghapus organisasi ini ?");
            var orgnum = $('#org_num').val();
            if(x){
                window.location="<?php echo base_url();?>index.php/org/hapus_org/"+orgnum;
            }
            return false;
        });
    });
</script>
<div id='content'>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Update Organisasi / Sub-Organisasi</h2>
    <form method="post" action="<?php echo base_url(); ?>index.php/org/upd_organization" >
        <fieldset>
            <legend>Informasi Organisasi</legend>
            <table>
                <?php
                // $row = $org->row();
                $row = $org;
                ?>
                <input type="hidden" id='org_num' name="org_num" value="<?php echo $row->org_num; ?>" />
                <!-- <tr>
                    <td>ID Organisasi</td>
                    <td> : <input type="text" name="org_id" value="<?php echo $row->org_id; ?>"/></td>
                    <td class="error-msg">
                        <?php
                            if (isset($errornya)) {
                                echo $errornya;
                            }
                        ?>
                    </td>
                </tr> -->
                <tr>
                    <td>Nama Organisasi</td>
                    <td> : <input type="text" name="org_name" style="width:300px;" value="<?php echo $row->org_name; ?>"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kode Organisasi</td>
                    <td> : <input type="text" name="org_code" value="<?php echo $row->org_code; ?>"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : <input type="text" name="org_address" style="width:350px;" value="<?php echo $row->org_address; ?>"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td> : <input type="text" name="org_work_telp" value="<?php echo $row->org_work_telp; ?>"/> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Fax</td>
                    <td> : <input type="text" name="org_fax" value="<?php echo $row->org_fax; ?>"/> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> : <input type="text" name="org_email" style="width:250px;" value="<?php echo $row->org_email; ?>"/></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td> : <input type="text" name="org_postal_code" style="width:100px" value="<?php echo $row->org_postal_code; ?>"/></td>
                </tr>
                <tr>
                    <td>Sub Organisasi dari</td>
                    <td> : <select name="org_parent" id="orgsub">
                            <option value="">--Tidak Ada--</option>
                            <?php
                            // foreach ($all_org->result() as $row2) {
                                
                            foreach ($all_org as $row2) {
                                print_r($row2);
                                print_r($row);
                                ?>
                                <option value="<?php echo $row2->org_num; ?>" <?php 
                                //if ($row2->org_num == $row->org_parent) {
                                if($row->org_parent != null){
                                    if ($row2->org_num == $row->org_parent) {
                                        echo "selected=\"selected\"";
                                    }
                                } ?>><?php echo $row2->org_name; ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hapus</td>
                    <td> : <button id="hapus-btn">Hapus Organisasi</button></td>
                    <td></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Konfigurasi Fiatur</legend>
            <fieldset id="settingfiatur" >
                    <input class="radionya" type="radio"  <?php if ($indukfia=="true") {
                                echo "checked";
                            } ?>  id="dariinduk" name="konfia" onclick="cekJob()" value="dari induk"> Dari induk <br>
                    <input  class="radionya" type="radio" <?php if ($indukfia=="false") {
                                echo "checked";
                            } ?>  id="buatsendiri" name="konfia" onclick="newJob()"  value="Buat sendiri"> Stand Alone <br>
                </fieldset>
            <table>
                <!-- <input type="hidden" id="jobnum" name="job_num" value="<?php echo $row->job_num; ?>" /> -->
                <tr>
                    <td>ID Jabatan</td>
                    <!-- <td> : <input type="text" name="job_id" id="idjabatan" style="width:100px" value="<?php echo $row->job_id; ?>" /> </td> -->
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <!-- <td> : <input type="text" name="job_name" id="namajabatan" style="width:200px;" value="<?php echo $row->job_name; ?>"/></td> -->
                </tr>
                    <input type="hidden" name="job_code" value="FIA"/>
                <tr>
                    <td>Deskripsi Jabatan   : </td>
                    <!-- <td> &nbsp;&nbsp;<textarea name="job_description" id="deskripsijabatan" cols="20" rows="5"><?php echo $row->job_description; ?></textarea> </td> -->
                </tr>
            </table>
        </fieldset>
         <fieldset>
            <legend>Konfigurasi HR</legend>
                <fieldset id="settinghr" style="">
                    <input class="radionya" type="radio" id="dariindukhr" name="konhr" <?php if ($indukhr=="true") {
                                echo "checked";
                            } ?> onclick="cekJobHr()" value="dari induk"> Dari induk <br>
                    <input  class="radionya" type="radio" id="buatsendirihr" name="konhr" <?php if ($indukhr=="false") {
                                echo "checked";
                            } ?> onclick="newJobHr()"  value="Buat sendiri"> Stand Alone <br>
                </fieldset>
            <table style="width:640px;">
                <input type="hidden" id="numjobhr" name="job_num_hr" value="<?php echo $jobhr->job_num; ?>" />
                <tr>
                    <td>ID Jabatan</td>
                    <td>:<input type="text" name="job_id_hr" id="idjabatanhr" style="width:100px" value="<?php echo $jobhr->job_id; ?>" /> </td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td>:<input type="text" name="job_name_hr" id="namajabatanhr" value="<?php echo $jobhr->job_name  ?>" style="width:200px;"/></td>
                </tr>
               
                    
                    <input type="hidden" name="job_code_hr" value="HR"/>
                    
                <tr>
                    <td>Deskripsi Jabatan    </td>
                    <td> :<textarea name="job_description_hr" id="deskripsijabatanhr" cols="20" rows="5"><?php echo $jobhr->job_description ?></textarea> </td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Konfigurasi Kepala Unit</legend>
                <input type="hidden" name="job_num_kepala" value="<?php echo $kepala->job_num; ?>">
                <table style="width:640px;">
                <tr>
                    <td>ID Jabatan</td>
                    <td> : <input type="text" name="job_id_kepala" style="width:100px" value="<?php echo $kepala->job_id; ?>" /> </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td> : <input type="text" name="job_name_kepala" value="<?php echo $kepala->job_name; ?>" style="width:200px;"/></td>
                    
                </tr>
               
                    
                    <input type="hidden" name="job_code_kepala" value="KPL"/>
                    
                <tr>
                    <td>Deskripsi Jabatan   : </td>
                    <td> &nbsp;&nbsp;<textarea name="job_description_kepala" cols="20" rows="5"><?php echo $kepala->job_description; ?></textarea> </td>
                    <td class="error-msg"><?php echo form_error('job_description_kepala'); ?></td>
                </tr>
            </table>
        </fieldset>
        <div style="text-align: center; margin-top:20px;">
            <input type="submit" value="Simpan" style="width:80px; height:40px;" />
        </div>
    </form>
</div>
<script type="text/javascript">
    var konfia = <?php echo $indukfia ?>;
    var idjabatan = "<?php echo $row->job_id; ?>";
    var jobnum = "<?php echo $row->job_num; ?>";
    var namajabatan = "<?php echo $row->job_name; ?>";
    var jobnumhr = "<?php echo $jobhr->job_num; ?>";
    var deskripsijabatan = "<?php echo $row->job_description; ?>";
    var konhr = <?php echo $indukhr ?>;
    var idjabatanhr = "<?php echo $jobhr->job_id ?>";
    var namajabatanhr = "<?php echo $jobhr->job_name; ?>";
    var deskripsijabatanhr = "<?php echo $jobhr->job_description; ?>";
    $(document).ready(function(){

         if(konfia==true){
             $("#settingfiatur").css("display","");
             $("#dariinduk").attr("checked");
         }
         else{
             $("#settingfiatur").css("display","");
             $("#buatsendiri").attr("checked");

         }
         if(konhr==true){
             $("#settinghr").css("display","");
             $("#dariindukhr").attr("checked");
         }
         else{
             $("#settingfiatur").css("display","");
             $("#buatsendirihr").attr("checked");

         }
        if($("#orgsub").val()==""){
            $("#settingfiatur").css("display","none");
            $(".radionya").removeAttr("checked");
            $("#settinghr").css("display","none");
            $(".radionya").removeAttr("checked");
        }

    });
      function cekJob(){
         $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/getfiatur/') ?>",
                success:function(data){
                    data = JSON.parse(data);
                    $("#idjabatan").val(data.job_id);
                    $("#namajabatan").val(data.job_name);
                    $("#deskripsijabatan").val(data.job_description);
                    $("#jobnum").val(data.job_num);
                    $("#namajabatan").attr("readonly","readonly");
                    $("#deskripsijabatan").attr("readonly","readonly");

                }
            })
    }
    function cekJobHr(){ 
        $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/gethr/') ?>",
                success:function(data){
                    data = JSON.parse(data);
                    $("#idjabatanhr").val(data.job_id);
                    $("#idjabatanhr").val(data.job_id);
                    $("#namajabatanhr").val(data.job_name);
                    $("#numjobhr").val(data.job_num);
                    $("#deskripsijabatanhr").val(data.job_description);
                    $("#namajabatanhr").attr("readonly","readonly");
                    $("#deskripsijabatanhr").attr("readonly","readonly");

                }
            })

    }
    function newJobHr(){ 
        if(konhr==true){
            $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/getnewkodefiatur/') ?>",
                success:function(data){
                    $("#idjabatanhr").val(parseInt(data)+1);
                    $("#namajabatanhr").val("");
                    $("#deskripsijabatanhr").val("");
                    $("#namajabatanhr").removeAttr("readonly");
                    $("#deskripsijabatanhr").removeAttr("readonly");
                    $("#numjobhr").val("");
                }
            });
        }
        else{  
                $("#idjabatanhr").val(idjabatanhr);
                    $("#numjobhr").val(jobnumhr);
                    $("#namajabatanhr").val(namajabatanhr);
                    $("#deskripsijabatanhr").val(deskripsijabatanhr);
                    $("#namajabatanhr").removeAttr("readonly");
                    $("#deskripsijabatanhr").removeAttr("readonly");

        }   

    }
    function newJob(){ 
    if(konfia==true){ 
        $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/getnewkodefiatur/') ?>",
                success:function(data){
                    $("#idjabatan").val(data);
                    $("#namajabatan").val("");
                    $("#deskripsijabatan").val("");
                    $("#namajabatan").removeAttr("readonly");
                    $("#deskripsijabatan").removeAttr("readonly");
                }
            });
        }
        else{
                    $("#idjabatan").val(idjabatan);
                    $("#jobnum").val(jobnum);
                    $("#namajabatan").val(namajabatan);
                    $("#deskripsijabatan").val(deskripsijabatan);
                    $("#namajabatan").removeAttr("readonly");
                    $("#deskripsijabatan").removeAttr("readonly");

        }

    }

    $("#orgsub").change(function(){
        if(this.value!=""){
           $("#settingfiatur").css("display","");
           $("#settinghr").css("display","");
           $(".radionya").removeAttr("checked");
        }
        else{
            $("#settingfiatur").css("display","none");
            $("#settinghr").css("display","none");
            $("#namajabatanhr").removeAttr("readonly");
            $("#deskripsijabatanhr").removeAttr("readonly");
            $("#namajabatanhr").removeAttr("readonly");
            $("#deskripsijabatanhr").removeAttr("readonly");
            newJob();
        }
    });
</script>