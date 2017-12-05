<script type="text/javascript">
    $(document).ready(function(){
        $("#list_org").change(function(){
           
           var orgnum = $('#list_org').val();
           $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/emp/load_emp_per_org",
                dataType: "JSON",
                data: "org=" + orgnum,
                success: function(data) {
                    $('#list_mgr')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="0">--Pilih--</option>');
                    $.each(data, function(i, n) {
                        var x = document.getElementById("list_mgr");
                        var option = document.createElement("option");
                        option.text = n['emp_id']+"-"+n['emp_firstname']+" "+n['emp_lastname'];
                        option.value = n['emp_num'];
                        x.add(option, x.options[null]);
                    });
//                   
                }
            });
        });
        
        $('#pilih-pegawai').click(function(){
            var org = $('#list_org').val();
            window.open('<?php echo base_url(); ?>index.php/jobs/pilih_employee/id/'+org, 'Pilih Pemeriksa', 'height=500,width=800');
            return false;
        });
    });
</script>
<style type="text/css">
    .error-msg {
        font-size: smaller;
        color:red;
        font-weight: bold;
    }
</style>

<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Add New Job</h2>
    <fieldset style="border:1px dotted black;">
        <legend>Job Information</legend>
        <?php
            $this->load->helper('form');
            echo form_open('jobs/process_add');
        ?>
        <table style="width: 500px; margin-left: 20px;">
            <tr>
                <td>ID Jabatan</td>
                <td> : </td>
                    <td><?php 
                $data = array(
                    'name'=>'job_id',
                    'size'=>'15',
                    'value'=>set_value('job_id')
                );
                
                echo form_input($data);
                ?></td><td class="error-msg"><?php echo form_error('job_id'); ?></td>
            </tr>
            <tr>
                <td>Nama Jabatan</td>
                <td> : </td>
                    <td><?php 
                $data = array(
                    'name'=>'job_name',
                    'size'=>'20',
                    'value'=>set_value('job_name')
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
                    'value'=>set_value('job_code')
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
                    'value'=>set_value('job_description')
                );
                
                echo form_textarea($data);
                ?></td>
                    <td class="error-msg"><?php echo form_error('job_description'); ?></td>
            </tr>
            <tr>
                <td>Organisasi </td>
                <td> : </td>
                <td><select name="organization" id="list_org">
                        <option value="">--Pilih Organization--</option>
                        <?php
                            // foreach($org->result() as $row){
                            foreach($org as $row){
                                
                                ?>
                        <option value="<?php echo $row->org_num; ?>"><?php echo $row->org_name; ?></option>
                        <?php
                            }
                        
                        ?>
                    </select></td>
                    <td class="error-msg"><?php echo form_error('organization'); ?></td>
            </tr>
        </table>
    </fieldset>
    <div style="text-align: center; margin-top: 10px;">
        <?php echo form_submit('submit','Simpan'); ?>
    </div>
</div>
