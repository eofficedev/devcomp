<style type="text/css">
    .error-msg {
        color:red;
        font-weight: bold;
        font-size: 12px;
        margin-top:2px;
    }
</style>
<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Konfigurasi Admin</h2>
    <fieldset>
        <legend>Konfigurasi Standar</legend>
        <?php
            $this->load->helper('form');
        ?>
        <?php echo form_open_multipart('admin/update_basic'); ?>
        <table style="width:800px;">
            
            <?php
                $appconf = $app_config->row();
            ?>
            <tr>
                <td>Judul Aplikasi</td>
                <td> : <input style="width: 300px;" type="text" name="app_title" value="<?php echo $appconf->app_title; ?>" /></td>
                <td class="error-msg"><?php echo form_error('app_title'); ?></td>
            </tr>
            <tr>
                <td>Teknis Support</td>
                <td> : <input style="width: 300px;" type="text" name="tech_support" value="<?php echo $appconf->tech_support; ?>" /></td>
                <td class="error-msg"><?php echo form_error('tech_support'); ?></td>
            </tr>
            <tr>
                <td>Ganti Top Banner (1000 x 150 px)</td>
                <td> : <?php echo form_upload('file_banner'); ?></td>
            </tr>
            <tr>
                <td>Ganti Company Logo (470 x 340 px)</td>
                <td> : <?php echo form_upload('file_logo'); ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Ganti Footer Banner (1000 x150 px)</td>
                <td> : <?php echo form_upload('file_bottom_banner'); ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Ganti Link Terkait 1</td>
                <td> : <input style="width: 300px;" type="text" name="link1" value="<?php echo $appconf->link1; ?>" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Judul Link Terkait 1</td>
                <td> : <input style="width: 200px;" type="text" name="link1_desc" value="<?php echo $appconf->link1_desc; ?>" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Ganti Link Terkait 2</td>
                <td> : <input style="width: 300px;" type="text" name="link2" value="<?php echo $appconf->link2; ?>" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Judul Link Terkait 2</td>
                <td> : <input style="width: 200px;" type="text" name="link2_desc" value="<?php echo $appconf->link2_desc; ?>" /></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" /></td>
                <td></td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </fieldset>
    <fieldset>
        <legend>HRM Konfigurasi</legend>
        <?php
        $this->load->helper('form');
        $totalrow = $config->num_rows();
        $conf_data = $config->row();
        echo form_open("admin/upd_config");
        ?>
        <table style="width:795px;">
            <tr>
                <td>Start ID Organisasi</td>
                <td> : <input type="text" name="org_start" <?php if($totalrow>0){
                echo "value='".$conf_data->org_start_num."'";
                } ?>/></td>
            </tr>
            <tr>
                <td>Start NIK Pegawai</td>
                <td> : <input type="text" name="emp_start" <?php if($totalrow>0){
                echo "value='".$conf_data->emp_start_num."'";
                    
                } ?>/></td>
            </tr>
            <tr>
                <td>Start ID SPPD</td>
                <td> : <input type="text" name="sppd_start" <?php if($totalrow>0){
                echo "value='".$conf_data->sppd_start_num."'";
                } ?> /></td>
            </tr>
            <tr>
                <td>Start ID Jabatan</td>
                <td> : <input type="text" name="job_start" <?php if($totalrow>0){
                echo "value='".$conf_data->job_start_num."'";
                    
                } ?>/></td>
            </tr>
            <tr><td>&nbsp;</td><td></td></tr>
            <tr><td></td><td><?php echo form_submit('submit', 'Simpan & Reset Aplikasi'); ?></td></tr>
        </table>
    <?php
    echo form_close();
    ?>
    </fieldset>
    
</div>
