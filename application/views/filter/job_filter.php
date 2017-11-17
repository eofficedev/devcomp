<script type="text/javascript">
    $(function(){
       $('#tambah-jbt').click(function(){
           
            window.location = "<?php echo base_url(); ?>index.php/jobs/form_job";
            return false;
       });
    });

</script>
<fieldset style="border: 1px dotted black; margin-bottom: 10px;">
    <legend>Filter Data</legend>
    <table>
        <tr>
            <?php $this->load->helper('form');
            echo form_open('jobs');
            ?>
            <td>Organization :</td>
            <td>
                <?php
                $options = array(
                    '' => '--All Organization--'
                );

                foreach ($list_org->result() as $row) {
                    $options[$row->org_num] = $row->org_name;
                }
                
                echo form_dropdown('filter2', $options, $this->input->post('filter2'));
                echo form_submit('submit', 'Process');
                echo form_close();
                ?>
            </td>
            <td><button id="tambah-jbt">Tambah Jabatan</button></td>
        </tr>
    </table>
    

</fieldset>
