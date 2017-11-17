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
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Draft SPPD</h2>
    
    <div id="content-sppd-left" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>Search SPPD</b></p>
            <form method="post" action="<?php echo base_url(); ?>index.php/sppd/draft_sppd" >
            <table>
                <tr>
                    <td><input style='margin-left: 20px;' name="keyword" type='text' id='keyword' value="<?php if($key!='All'){ echo $key; }?>"/></td>
                </tr>
                
                <tr>
                    <td><input type="submit" style='margin-left: 20px;' value="Search" /></td>
                </tr>
                
                <tr>
                    <td>&nbsp;</td>
                </tr>
<!--                <tr>
                    <td><b style='margin-left: 20px;'>Urutkan SPPD :</b></td>
                </tr>
                
                <tr>
                    <td><p style='margin-left: 20px; font-size: smaller;'>SPPD ID</p></td>
                </tr>
                <tr>
                    <td><p style='margin-left: 20px; font-size: smaller;'>Created Date</p></td>
                </tr>
                <tr>
                    <td><p style='margin-left: 20px; font-size: smaller;'>Depart Date</p></td>
                </tr>-->
                
                
            </table>
            </form>
        </div>
    </div>
    
    <div id="content-sppd-right" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh Draft SPPD : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <table>
                    <tr>
                        <td><p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Search By :</i></td>
                        <td><i style="font-size: smaller; margin-bottom: 3px; margin-top: 3px;" id="key"><?php echo $key; ?></i></td>
                    </tr>
                </table>
                 
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;' id="links">Page : <?php echo $links; ?></p>
            </div>
            
        </div>
        <div id="list-sppd">
        <?php 
        if($draft->num_rows()==0){
            ?>
        <p style='text-align: center;'><b>Data Tidak Ada</b></p>
        <?php
        }
        
        else {
            
            foreach ($draft->result() as $row) {
        ?>
                <div class='sppd-content'>
                    <div class='sppd-img'>
                        <img style="margin-left: 15px; margin-top: 15px;" height="100" width="100" src='<?php echo base_url(); ?>css/paper-sppd.png' h/>
                    </div>
                    <div class='sppd-data'>
                        <p style='margin-left: 10px;'><b><?php echo $row->sppd_id; ?> - <?php echo $row->sppd_tuj; ?></b></p>
                        <p style='margin-left:10px; font-size: smaller'>Tanggal : <?php echo $row->sppd_tgl; ?> | Pemohon : <?php echo $row->emp_id . "-" . $row->emp_firstname . ' ' . $row->emp_lastname; ?> | Pembuat : <?php echo $row->pem_fname . " " . $row->pem_lname; ?></p>
                        
                    </div>
                    <div class='sppd-opsi'>
                        <p style='padding-top: 20px; margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/sppd/edit/id/<?php echo $row->sppd_num; ?>' style='color:black;'>Edit</a></p>
                        <p style='margin-left: 0px;'><a href='<?php echo base_url(); ?>index.php/sppd/hapus/id/<?php echo $row->sppd_num; ?>' style='color:black;'>Hapus</a></p>
                    </div>
                </div>
    <?php }
        }?>
        </div>
   </div>
    
</div>