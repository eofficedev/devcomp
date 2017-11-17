<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Konfigurasi Anggaran</h2>
    <fieldset>
        <legend>Konfigurasi Anggaran</legend>
        <?php
            $this->load->helper('form');
        ?>
        <?php echo form_open_multipart('site/update_anggaran'); ?>
        <table style="width:800px;">
            
            <?php
                $appconf = $app_config->row();
            ?>
            <tr>
                <td>Kode Anggaran</td>
                <td> : <input style="width: 300px;" type="text" name="kode_anggaran" value="" /></td>
                <td class="error-msg"><?php echo form_error('app_title'); ?></td>
            </tr>
            <tr>
                <td>Nama Program</td>
                <td> : <input style="width: 300px;" type="text" name="program" value="" /></td>
                <td class="error-msg"><?php echo form_error('tech_support'); ?></td>
            </tr>
<!--            <tr>
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
            </tr>-->
            <tr>
                <td>Tahun Anggaran</td>
                <td> : <input style="width: 300px;" type="text" name="Years" value="" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Jumlah Anggaran</td>
                <td> : <input style="width: 200px;" type="text" name="Anggaran" value="" /></td>
                <td></td>
            </tr>
<!--            <tr>
                <td>Ganti Link Terkait 2</td>
                <td> : <input style="width: 300px;" type="text" name="link2" value="<?php echo $appconf->link2; ?>" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Judul Link Terkait 2</td>
                <td> : <input style="width: 200px;" type="text" name="link2_desc" value="<?php echo $appconf->link2_desc; ?>" /></td>
                <td></td>
            </tr>-->
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
<!--    <div id="content-right">
        <div id="content-right-data">
            <p><b>Akun Anda :</b></p>
             <img width="80" style="margin-left: 105px; margin-top: 20px;" height="80" src="<?php echo base_url();?>css/unknown-prof-pic.png"/>
             <table style="margin-left: 50px; margin-top: 40px;" >
                 <?php $row = $total->row(); ?><?php $baris = $tahun->row(); ?>
                 <tr>
                     <tr>Years</tr>
                     <td><?php echo $baris->q;?></td>
                     <tr>Jumlah SPPD</tr>
                     <td><?php echo $row->stat;?></td>
                     <tr>Biaya</tr>
                 </tr>
                 <tr>
                     <td>Tipe Akun</td>
                     <td> : Administrator</td>
                 </tr>
                 
                 <br/>
                 <tr>
                     <td>&nbsp;</td>
                     <td></td>
                 </tr>
             </table>
        </div>
    </div>-->
</div>
