
<div id="dialog-agenda" title="Agenda"  style="z-index:99999">
    <div id="tabs">
        <div id="tabs-1" style="font-size: smaller;">
        
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;" >
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Agenda Surat</th>
                    <th>Keterangan</th>
                </tr>
                <tr>
                    <td valign='top'>
                        <table style="font-size: smaller; text-align: left;" >
                                    <?php 
                            
                            if(isset($disposisi)){
                            ?>
                          <tr>
                            <td valign='top'>Nota Ini di disposisikan kepada</td>
                                <td valign='top'>:</td>
                                <td valign='top'>
                          
                            <?php    if(count($disposisi)>0){
                                    foreach ($disposisi as $disposis) {
                                    echo "Sdr. ".$disposis->job_code."<br>";
                                        # code...
                                    }
                                }
                           ?>
                            </td>
                            </tr>
                            <tr>
                                <td valign="top"> Disposisi Oleh </td>
                                <td valign="top">:</td>
                                <td valign="top"> <?php
                                    echo $my_disposisi[0]->sender;
                                ?></td>
                            </tr>  
                            <?php
                            }
                            ?>
                           
                            <tr >
                                <td valign='top'>Diterima Tanggal</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php echo $nota[0]->create_date;  ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Dari</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php echo $dari[0]->job_name  ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Lampiran</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php 
                                    foreach ($lampiran as $l) {
                                            echo "<a href='".$this->config->item("upload")."/".$l->lampiran_link."'>".$l->lampiran_name."</a><br>";
                                            
                                        }
                                ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Perihal</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php echo $nota[0]->nota_perihal; ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Di Tujukan Kepada</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php
                    $i=1;
                    foreach ($kepada as $k) {
                        echo $i . ". ".$k->job_name ."<br>";
                        $i++;
                    }
                 ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Tembusan</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php
                    $i=1;
                    foreach ($tembusan as $k) {
                        echo $i.". ".$k->job_name."<br>";
                        $i++;
                    }
                 ?></td>
                            </tr>
                            <tr>
                                <td valign='top'>Nomor Surat</td>
                                <td valign='top'>:</td>
                                <td valign='top'><?php echo $nota[0]->nota_number; ?></td>
                            </tr>
                            
                        </table>
                    </td>
                    <td valign='top'>
                            <?php
                                if(isset($disposisi)){
                                    if(count($disposisi)>0){
                                        echo "<h4>Nota Tindakan</h4> ".$tindakan."<br><br>";
                                    }
                                }
                            ?>
                            <h4>Diterima Tanggal</h4> Tanggal surat ini diterima secara fisik oleh sps unit saudara<br><br>
                            <h4>Dari</h4><br>Pengirim Surat Ini<br><br>
                            <h4>Nomor Surat</h4><br><br>Nomor Surat yang tertera di fisik surat
                    </td>
                </tr>  
             </table>
        </div>
    </div>
</div>

<script type="text/javascript">
</script>