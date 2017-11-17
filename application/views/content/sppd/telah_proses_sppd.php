<style>
    #links a {
        color:white;
        text-decoration: underline;
    }

</style>
<div id="content">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">SPPD Telah Diproses</h2>

    <div id="content-sppd-left" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            
            <p style="margin-left: 20px; margin-top: 10px;"><b>Search SPPD by Tujuan</b></p>
            <form action="<?php echo base_url(); ?>index.php/sppd/telah_proses_sppd" method="post">
            <table>
                <tr>
                    <td><input style='margin-left: 20px;' type='text' name='keyword' value="<?php echo $this->input->post('keyword'); ?>"/></td>
                </tr>
                <tr>
                    <td><input type="submit" style='margin-left: 20px;' value="Search" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                </table>
            </form>
            <table>
                    <form action="<?php echo base_url(); ?>index.php/sppd/telah_proses_sppd" method="post">
                <tr>
                    <td><b style='margin-left: 20px;'>Sort SPPD By :</b></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <?php $m = $this->input->post('bulan'); ?>
                        <select name="bulan" style="margin-left:20px;" value="<?php echo $m; ?>">
                            <option value="0">--Select Month--</option>
                            <option value="1" <?php if($m==1) {echo "selected=\"selected\"";} ?>>Jan</option>
                            <option value="2" <?php if($m==2) {echo "selected=\"selected\"";} ?>>Feb</option>
                            <option value="3" <?php if($m==3) {echo "selected=\"selected\"";} ?>>Mar</option>
                            <option value="4" <?php if($m==4) {echo "selected=\"selected\"";} ?>>Apr</option>
                            <option value="5" <?php if($m==5) {echo "selected=\"selected\"";} ?>>May</option>
                            <option value="6" <?php if($m==6) {echo "selected=\"selected\"";} ?>>Jun</option>
                            <option value="7" <?php if($m==7) {echo "selected=\"selected\"";} ?>>Jul</option>
                            <option value="8" <?php if($m==8) {echo "selected=\"selected\"";} ?>>Agt</option>
                            <option value="9" <?php if($m==9) {echo "selected=\"selected\"";} ?>>Sep</option>
                            <option value="10" <?php if($m==10) {echo "selected=\"selected\"";} ?>>Okt</option>
                            <option value="11" <?php if($m==11) {echo "selected=\"selected\"";} ?>>Nop</option>
                            <option value="12" <?php if($m==12) {echo "selected=\"selected\"";} ?>>Dec</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php $y = $this->input->post('tahun'); ?>
                        <select name="tahun" style="margin-left:20px;">
                            <option value="0">--Select Year--</option>
                            <option value="2010" <?php if($y==2010) {echo "selected=\"selected\"";} ?>>2010</option>
                            <option value="2011" <?php if($y==2011) {echo "selected=\"selected\"";} ?>>2011</option>
                            <option value="2012" <?php if($y==2012) {echo "selected=\"selected\"";} ?>>2012</option>
                            <option value="2013" <?php if($y==2013) {echo "selected=\"selected\"";} ?>>2013</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><button style="margin-left: 20px;">Process</button></td>
                </tr>
                    </form>
                
            </table>
            
        </div>
    </div>

    <div id="content-sppd-right" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh SPPD Telah Diproses : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Filter By : All</i></p>
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;' id="links">Page : <?php echo $this->pagination->create_links(); ?></p>
            </div>

        </div>
        <?php
        if ($sppd_list->num_rows() == 0) {
            ?>
            <p style='text-align: center;'><b>Data Tidak Ada</b></p>
            <?php
        } else {

            foreach ($sppd_list->result() as $row) {
                ?>
                <div class='sppd-content'>
                    <div class='sppd-img'>
                        <img style="margin-left: 15px; margin-top: 15px;" height="100" width="100" src='<?php echo base_url(); ?>css/paper-sppd.png' h/>
                    </div>
                    <div class='sppd-data'>
                        <p style='margin-left: 10px;'><b><?php echo $row->sppd_id; ?> - <?php echo $row->sppd_tuj; ?></b></p>
                        <p style='margin-left:10px; font-size: smaller'>Tanggal : <?php echo $row->sppd_tgl; ?> | Pemohon : <?php echo $row->emp_id . "-" . $row->emp_firstname . ' ' . $row->emp_lastname; ?> | Pembuat : <?php echo $row->pem_fname . " " . $row->pem_lname; ?></p>
                        <p style='margin-left:10px; font-size: smaller'><b>Approved</b></p>
                    </div>
                    <div class='sppd-opsi'>
                        <p style='padding-top: 30px; margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/sppd/view_telah_proses_sppd/id/<?php echo $row->sppd_num; ?>' style='color:black;'>View</a></p>
                    </div>
                </div>
    <?php }
}
?>
    </div>

</div>