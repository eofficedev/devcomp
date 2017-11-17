<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Config Fiatur</h2>
    
    <fieldset>
        <legend>Fiatur Konfigurasi</legend>
        
        <table style="width:500px;">
            <tr>
                <td>Organisasi : </td>
                <td><select name="organisasi" style="width:200px;">
                        <option value="0">--Pilih Organisasi--</option>
                        <?php
                            foreach($org->result() as $row){
                                ?>
                        <option value="<?php echo $row->org_num; ?>"><?php echo $row->org_name; ?></option>
                        <?php
                            }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Fiatur : </td>
                <td>Pilih Organisasi terlebih dahulu</td>
            </tr>
        </table>
    </fieldset>
</div>
