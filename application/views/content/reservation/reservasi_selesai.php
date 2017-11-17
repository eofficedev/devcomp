<style>
    #links a {
        color:white;
        text-decoration: underline;
    }

</style>
<script>
</script>

<div id="content">
    <div id="status" style="text-align: center; font-size: smaller; padding-top:10px; padding-bottom: 10px; background-color: yellow; <?php if(!isset($status)){ echo 'display:none;';} ?>" ><b>
        <?php
            if(isset($status)){
                echo $status;
            }
            ?></b>
    </div>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Reservasi Telah Diproses</h2>
    
    <div id="content-sppd-left" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>Search Reservasi by Employee : </b></p>
            <form method="post" action="<?php echo base_url(); ?>index.php/reservation/finish_reservation" >
            <table>
                <tr>
                    <td><input style='margin-left: 20px;' name="keyword" type='text' id='keyword' value="<?php echo $this->input->post('keyword'); ?>"/></td>
                </tr>
                
                <tr>
                    <td><input type="submit" style='margin-left: 20px;' value="Search" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    
    <div id="content-sppd-right" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh Reservasi : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <table>
                    <tr>
                        <td><p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Search By : <?php if($this->input->post('keyword') != ""){ echo $this->input->post('keyword'); }else { echo "All";}?></i></td>
                        <td><i style="font-size: smaller; margin-bottom: 3px; margin-top: 3px;" id="key"></i></td>
                    </tr>
                </table>
                 
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;' id="links">Page :  <?php echo $this->pagination->create_links(); ?></p>
            </div>
        </div>
        <div id="list-sppd">
            <?php 
        if($reservation->num_rows()==0){
            ?>
        <p style='text-align: center;'><b>Data Tidak Ada</b></p>
        <?php
        }
        
        else {
            
            foreach ($reservation->result() as $row) {
        ?>
                <div class='sppd-content'>
                    <div class='sppd-img'>
                        <img style="margin-left: 15px; margin-top: 15px;" height="100" width="100" src='<?php echo base_url(); ?>css/paper-sppd.png' h/>
                    </div>
                    <div class='sppd-data'>
                        <p style='margin-left: 10px;'><b><?php echo $row->sppd_id; ?> - <?php echo $row->sppd_tuj; ?></b></p>
                        <p style='margin-left:10px; font-size: smaller'>Tanggal : <?php echo $row->sppd_tgl; ?> | Pemohon : <?php echo $row->emp_id . "-" . $row->emp_firstname . ' ' . $row->emp_lastname; ?></p>
                        <p style='margin-left:10px; font-size: smaller'>Tujuan : <b><?php echo $row->sppd_dest; ?></b> | Dari Tanggal : <b><?php echo $row->sppd_depart; ?></b> | Sampai Tanggal : <b><?php echo $row->sppd_arrive; ?></b></p>
                        
                    </div>
                    <div class='sppd-opsi'>
                        <p style='padding-top: 20px; margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/reservation/reservation_view/id/<?php echo $row->req_id; ?>' style='color:black;'>Lihat</a></p>
                    </div>
                </div>
    <?php }
        }?>
        </div>
   </div>
    
</div>