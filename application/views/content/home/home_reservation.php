<div id="content" style="min-height: 800px;">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Selamat Datang di Modul Reservasi E-Office</h2>
    <div id="content-left" style="padding-left:20px;">
        <div class="content-left-data" id="top-left-content">
            <div class="content-left-img">
                <img width="100" style="margin-left: 20px; margin-top: 20px;" height="100" src="<?php echo base_url(); ?>css/notification.png"/>
            </div>
            <div class="content-left-2">
                <p><b>Notifikasi :</b></p>
                <?php foreach($notif->result() as $rownotif){
                    ?>
                <a href="<?php echo base_url(); ?>index.php/site/notif_redirect/id/<?php echo $rownotif->notif_id; ?>"><?php
                
                if($rownotif->status == 0){
                    echo '<b>';
                }
                
                echo $rownotif->date_post." - ".$rownotif->notif_desc; ?>
                <?php
                
                if($rownotif->status == 0){
                    echo '[NEW]</b></a><br/>';
                }
                else {
                    echo '</a><br/>';
                }
                
                }
                ?>
                
                <?php
                    if($notif->num_rows() > 0){
                        ?>
                        <br/><a href="<?php echo base_url(); ?>index.php/notif">Lihat Semua Nofifikasi..</a>
                    <?php
                        }
                        else {
                            echo "<p id='notif' style='font-size:smaller;'><b>Tidak ada notifikasi baru</b></p>";
                        }
                ?>
            </div>
        </div>
        <div class="content-left-data">
            <div class="content-left-img">
                <img width="100" style="margin-left: 20px; margin-top: 20px;" height="100" src="<?php echo base_url(); ?>css/sppd.jpg"/>
            </div>
            <div class="content-left-2">
                <p><b>Reservasi :</b></p>
                <a href="<?php echo base_url(); ?>index.php/reservation/view_all_reservation">Lihat Semua Reservasi Perlu Diproses</a><br/>
                <a href="<?php echo base_url(); ?>index.php/reservation/finish_reservation">Lihat Semua Reservasi Telah Diproses</a><br/>
            </div>
        </div>
    </div>
    <div id="content-right">
        <div id="content-right-data">
            <p><b>Your Account :</b></p>
            <img width="80" style="margin-left: 105px; margin-top: 20px;" height="80" src="<?php echo base_url(); ?>css/unknown-prof-pic.png"/>
            <table style="margin-left: 50px; margin-top: 40px;">
                <?php $row = $result->row(); ?>

                <tr>
                    <td>Nama</td>
                    <td> : <?php echo $row->emp_firstname . " " . $row->emp_lastname; ?></td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td> : Administrator</td>
                </tr>

                <br/>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>