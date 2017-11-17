<style type="text/css">
    .error-msg {
        font-size: smaller;
        color:red;
        font-weight: bold;
    }
    
</style>

<script type="text/javascript">
$('document').ready(function(){
   $('#pilih-pegawai').click(function(){
            var org = $('#list_org').val();
            window.open('<?php echo base_url(); ?>index.php/jobs/pilih_employee/id/'+org, 'Pilih Pemeriksa', 'height=500,width=800');
            return false;
        });
        
        $('#list_org').change(function(){
           $('#employee').val("");
           $('#emp_num').val("");
        });
        
        $('#hapus-btn').click(function(){
            var x = confirm("Apakah anda yakin akan menghapus jabatan ini ?");
            var jobnum = $('#job_num').val();
            if(x){
                window.location="<?php echo base_url();?>index.php/jobs/hapus_job/"+jobnum;
            }
            return false;
        });
});

</script>

<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Update Job</h2>
    <fieldset style="border:1px dotted black;">
        <legend>Job Information</legend>
        <?php
            $this->load->helper('form');
            echo form_open('jobs/process_update');
        ?>
        <table style="width: 560px; margin-left: 20px;">
            <tr>
                <td>ID Jabatan</td>
                <td> : </td>
                    <td><?php 
                    $row = $job_data->row();
                $data = array(
                    'name'=>'job_id',
                    'size'=>'15',
                    'readonly'=>'readonly',
                    'value'=> $row->job_id
                );
                
                echo form_input($data);
                ?></td>
                    
            </tr>
            <input type="hidden" name="job_num" id="job_num" value="<?php echo $row->job_num; ?>"/>
            
            <tr>
                <td>Nama Jabatan</td>
                <td> : </td>
                    <td><?php 
                $data = array(
                    'name'=>'job_name',
                    'size'=>'40',
                    'value'=>$row->job_name
                    
                );
                
                echo form_input($data);
                ?></td>
                    <td class="error-msg"><?php echo form_error('job_name'); ?></td>
            </tr>
            <tr>
                <td>Kode Jabatan</td>
                <td> : </td>
                    <td><?php 
                $data = array(
                    'name'=>'job_code',
                    'size'=>'20',
                    'value'=>$row->job_code
                );
                
                echo form_input($data);
                ?></td>
                    <td class="error-msg"><?php echo form_error('job_code'); ?></td>
            </tr>
            <tr>
                <td>Deskripsi Jabatan</td>
                <td>: </td>
                    <td><?php 
                $data = array(
                    'name'=>'job_description',
                    'cols'=>'20',
                    'rows'=>'5',
                    'value'=>$row->job_description
                );
                
                echo form_textarea($data);
                ?></td>
                    <td class="error-msg"><?php echo form_error('job_description'); ?></td>
            </tr>
            <tr>
                <td>Organisasi : </td>
                <td> : </td>
                
                <td><select name="org" id="list_org">
                        <option value="">--Pilih--</option>
                        <?php
                        foreach($org->result() as $rowOrg){
                            
                            ?>
                        <option value="<?php echo $rowOrg->org_num; ?>" <?php
                        if($row->org_num == $rowOrg->org_num){
                            echo " selected='selected'";
                        }
                        ?>><?php echo $rowOrg->org_name; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
                    <td class="error-msg"><?php echo form_error('org'); ?></td>
            </tr>
            <tr>
                <td>Hapus</td>
                <td> : </td>
                <td> <button id="hapus-btn">Hapus Jabatan</button> </td>
                <td></td>
            </tr>
        </table>
    </fieldset>
    <div style="text-align: center; margin-top: 10px;">
        <?php echo form_submit('submit','Simpan'); ?>
    </div>
</div>
