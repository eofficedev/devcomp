<script type="text/javascript">
    $(function(){
      //  $('#tambah-emp').click(function(){
           
      //       window.location = "<?php echo base_url(); ?>index.php/org/add_org";
      //       return false;
      //  });
    });

</script>

<fieldset style="border: 1px dotted black; margin-bottom: 10px;">
    <legend>Filter Data</legend>
    <table>
    <p>
    
    <?php
        $this->load->helper('form');
        echo form_open('site/admin_dashboard_list_nota_dinas');
        
        $options = array(
            '0'=>'--Pilih--',
            'nota_dari'=>'Dari',
            'nota_tujuan'=>'Tujuan',
            'nota_pemeriksa'=>'Pemeriksa'
        );
        
        $v = array(
            'name'=>'keyword',
            'size'=>'26',
            'value'=>$this->input->post('keyword')
        );
        
        echo form_dropdown('filter',$options,$this->input->post('filter'));
        echo "  Keyword : ";
        echo form_input($v);
        echo form_submit('submit','Process');
    ?>
        <!-- <button id="tambah-emp">Tambah Organisasi</button> -->
        </p>
        </table>
    
</fieldset>
