<style>
    .error-msg {
        font-size: smaller;
        font-weight: bold;
        color:red;
        margin-top: 0px;
    }
</style>
<div id='content'>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Tambah Organisasi / Sub-Organisasi</h2>
    <form method="post" action="<?php echo base_url(); ?>index.php/org/add_organization" >
        <fieldset>
            <legend>Informasi Organisasi</legend>
        <table style="width:900px;">
            <tr>
                <td>ID Organisasi</td>
                <td> : <input type="text" name="org_id"  value="<?php echo set_value('org_id'); ?>" /></td>
                 <td class="error-msg"><?php echo form_error('org_id'); ?></td>
            </tr>
            <tr>
                <td>Nama Organisasi</td>
                <td> : <input type="text" name="org_name" value="<?php echo set_value('org_name'); ?>" style="width:300px;"/></td>
                <td class="error-msg"><?php echo form_error('org_name'); ?></td>
            </tr>
            <tr>
                <td>Kode Organisasi</td>
                <td> : <input type="text" name="org_code" value="<?php echo set_value('org_code'); ?>" /></td>
                <td class="error-msg"><?php echo form_error('org_code'); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : <input type="text" name="org_address" value="<?php echo set_value('org_address'); ?>" style="width:350px;"/></td>
                <td class="error-msg"><?php echo form_error('org_address'); ?></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td> : <input type="text" name="org_work_telp" value="<?php echo set_value('org_work_telp'); ?>"/> </td>
                <td class="error-msg"><?php echo form_error('org_work_telp'); ?></td>
            </tr>
            <tr>
                <td>Fax</td>
                <td> : <input type="text" name="org_fax" value="<?php echo set_value('org_fax'); ?>"/> </td>
                <td class="error-msg"><?php echo form_error('org_fax'); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td> : <input type="text" name="org_email" value="<?php echo set_value('org_email'); ?>" style="width:250px;"/></td>
                <td class="error-msg"><?php echo form_error('org_email'); ?></td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td> : <input type="text" name="org_postal_code" value="<?php echo set_value('org_postal_code'); ?>" style="width:100px"/></td>
                <td class="error-msg"><?php echo form_error('org_postal_code'); ?></td>
            </tr>
            <tr>
                <td>Sub Organisasi dari</td>
                <td> : <select name="org_sub" id="orgsub">
                        <option value="">--Tidak Ada--</option>
                        <?php 
                            foreach($org->result() as $row){
                                
                                ?>
                        <option value="<?php echo $row->org_num; ?>"><?php echo $row->org_name; ?></option>
                        <?php
                            }
                        
                        ?>
                    </select></td>
                    <td></td>
            </tr>
        </table>
        </fieldset>
        <fieldset>
            <legend>Konfigurasi Fiatur</legend>
                <fieldset id="settingfiatur" style="display:none">
                    <input class="radionya" type="radio" name="konfia" onclick="cekJob()" checked value="dari induk"> Dari induk <br>
                    <input  class="radionya" type="radio" name="konfia" onclick="newJob()"  value="Buat sendiri" checked> Stand Alone <br>
                </fieldset>
            <table style="width:640px;">
                <tr>
                    <td>ID Jabatan</td>
                    <td> : <input type="text" name="job_id" id="idjabatan" style="width:100px"  value="<?php echo set_value('job_id'); ?>" /> </td>
                    <td class="error-msg"><?php echo form_error('job_id'); ?></td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td> : <input type="text" name="job_name" id="namajabatan" value="<?php echo set_value('job_name'); ?>" style="width:200px;"/></td>
                    <td class="error-msg"><?php echo form_error('job_name'); ?></td>
                </tr>
               
                    
                    <input type="hidden" name="job_code" value="FIA"/>
                    
                <tr>
                    <td>Deskripsi Jabatan   : </td>
                    <td> &nbsp;&nbsp;<textarea name="job_description" id="deskripsijabatan" cols="20" rows="5"><?php echo set_value('job_description'); ?></textarea> </td>
                    <td class="error-msg"><?php echo form_error('job_description'); ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Konfigurasi HR</legend>
                <fieldset id="settinghr" style="display:none">
                    <input class="radionya" type="radio" name="konhr" onclick="cekJobHr()" checked value="Dari induk"> Dari induk <br>
                    <input  class="radionya" type="radio" name="konhr" onclick="newJobHr()"  value="Buat sendiri" checked> Stand Alone <br>
                </fieldset>
            <table style="width:640px;">
                <tr>
                    <td>ID Jabatan</td>
                    <td> : <input type="text" name="job_id_hr" id="idjabatanhr" style="width:100px"  value="<?php echo set_value('job_id_hr'); ?>" /> </td>
                    <td class="error-msg"><?php echo form_error('job_id_hr'); ?></td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td> : <input type="text" name="job_name_hr" id="namajabatanhr" value="<?php echo set_value('job_name_hr'); ?>" style="width:200px;"/></td>
                    <td class="error-msg"><?php echo form_error('job_name_hr'); ?></td>
                </tr>
               
                    
                    <input type="hidden" name="job_code_hr" value="HR"/>
                    
                <tr>
                    <td>Deskripsi Jabatan   : </td>
                    <td> &nbsp;&nbsp;<textarea name="job_description_hr" id="deskripsijabatanhr"  cols="20" rows="5"><?php echo set_value('job_description_hr'); ?></textarea> </td>
                    <td class="error-msg"><?php echo form_error('job_description_hr'); ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Konfigurasi Kepala Unit</legend>
                <table style="width:640px;">
                <tr>
                    <td>ID Jabatan</td>
                    <td> : <input type="text" name="job_id_kepala" style="width:100px"  value="<?php echo set_value('job_id_kepala'); ?>"/> </td>
                    <td class="error-msg"><?php echo form_error('job_id_kepala'); ?></td>
                </tr>
                <tr>
                    <td>Nama Jabatan</td>
                    <td> : <input type="text" name="job_name_kepala" value="<?php echo set_value('job_name_kepala'); ?>" style="width:200px;"/></td>
                    <td class="error-msg"><?php echo form_error('job_name_kepala'); ?></td>
                </tr>
               
                    
                    <input type="hidden" name="job_code_kepala" value="KPL"/>
                    
                <tr>
                    <td>Deskripsi Jabatan   : </td>
                    <td> &nbsp;&nbsp;<textarea name="job_description_kepala" cols="20" rows="5"><?php echo set_value('job_description_kepala'); ?></textarea> </td>
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
    $(document).ready(function(){});
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
                    $("#namajabatanhr").val(data.job_name);
                    $("#deskripsijabatanhr").val(data.job_description);
                    $("#namajabatanhr").attr("readonly","readonly");
                    $("#deskripsijabatanhr").attr("readonly","readonly");

                }
            })

    }
    function newJobHr(){    $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/getnewkodefiatur/') ?>",
                success:function(data){
                    $("#namajabatanhr").val("");
                    $("#deskripsijabatanhr").val("");
                    $("#namajabatanhr").removeAttr("readonly");
                    $("#deskripsijabatanhr").removeAttr("readonly");
                }
            })

    }
    function newJob(){  
        $.ajax({
                type:"post",
                data:"org_num="+$("#orgsub").val(),
                url:"<?php echo site_url('org/getnewkodefiatur/') ?>",
                success:function(data){
                    $("#namajabatan").val("");
                    $("#deskripsijabatan").val("");
                    $("#namajabatan").removeAttr("readonly");
                    $("#deskripsijabatan").removeAttr("readonly");
                }
            })

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