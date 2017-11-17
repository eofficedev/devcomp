<div id="dialog-form" title="Form Data Pegawai" style="z-index:99999">
    <div id="tabs-form">
        <ul>
            <li><a href="#tabss-1">Berdasarkan Jabatan</a></li>
            <li><a href="#tabss-2">Berdasarkan Nama</a></li>
        </ul>
        <div id="tabss-1">
            <h4>Pilih Pemeriksa berdasarkan Jabatan</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="key-jabatan-pegawai" name="keyword" style="width:150px;" />
                <button id="search-jabatan-pegawai">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-emp-table">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama Jabatan</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_emp as $row) {
                    ?>
                    <tr id="pilihan-jbt-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->job_id . "-" . $row->job_name; ?></td>
                        <td style="padding-left:20px;"><button id="pem9-<?php echo $i; ?>" class="btn-pil-jbt">Pilih</button></td>

                    <p id="data-pem9-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num9-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
                    <p id="org-num9-<?php echo $i; ?>" style="display:none"><?php echo $row->org_name; ?></p>
                    <p id="name-num9-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_firstname." ".$row->emp_lastname; ?></p>
                    <p id="nik-num9-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_id; ?></p>
                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>

            </table>
        </div>
        <div id="tabss-2">
            <h4>Pilih Pemeriksa berdasarkan Nama</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="keyword-nama-pegawai" name="keyword" style="width:150px;" />
                <button id="search-nama-pegawai">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-emp-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIP/Organisasi</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_emp as $row) {
                    ?>
                    <tr id="pil-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . " - " . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td style="padding-left:20px;"><button id="pem8-<?php echo $i; ?>" class="btn-pil-pegawai-nama">Pilih</button></td></tr>
                    <p id="data-pem8-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num8-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
                    <p id="org-num8-<?php echo $i; ?>" style="display:none"><?php echo $row->org_name; ?></p>   
                    <p id="name-num8-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_firstname." ".$row->emp_lastname; ?></p>
                    <p id="nik-num8-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_id; ?></p>

                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>
            </table>
        </div>

        <div id="tambahan" style="display:none;">
        </div>
    </div>
</div>


<div id="dialog-form-pemeriksa" title="Pilih Pemeriksa">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Berdasarkan Jabatan</a></li>
            <li><a href="#tabs-2">Berdasarkan Nama</a></li>
        </ul>
        <div id="tabs-1">
            <h4>Pilih Pemeriksa berdasarkan Jabatan</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="key-jabatan" name="keyword" style="width:150px;" />
                <button id="search-jabatan">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-pem-table">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama Jabatan</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_atasan as $row) {
                    ?>
                    <tr id="pilihan-jbt-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->job_id . "-" . $row->job_name; ?></td>
                        <td style="padding-left:20px;"><button id="pem3-<?php echo $i; ?>" class="btn-pil-jbt2">Pilih</button></td>

                    <p id="data-pem3-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num3-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
                    <p id="org-num3-<?php echo $i; ?>" style="display:none"><?php echo $row->org_name; ?></p>
                    <p id="name-num3-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_firstname." ".$row->emp_lastname; ?></p>
                    <p id="nik-num3-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_id; ?></p>
                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>

            </table>
        </div>
        <div id="tabs-2">
            <h4>Pilih Pemeriksa berdasarkan Nama</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="keyword-nama-pemeriksa" name="keyword" style="width:150px;" />
                <button id="search-nama">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-pemeriksa-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIP/Organisasi</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_atasan as $row) {
                    ?>
                    <tr id="pilihan-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . " - " . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td style="padding-left:20px;"><button id="pem-<?php echo $i; ?>" class="btn-pil">Pilih</button></td></tr>
                    <p id="data-pem2-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
                    <p id="org-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->org_name; ?></p>   
                    <p id="name-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_firstname." ".$row->emp_lastname; ?></p>
                    <p id="nik-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_id; ?></p>

                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>
            </table>
        </div>

        <div id="tambahan" style="display:none;">
        </div>
    </div>
</div>



<div id="dialog-options" title="Compose Options" style="z-index:9999">
    <div id="tabbs">
        <div id="tabbs-1" style="font-size: smaller;">
             <iframe name="config-target" style="display:none"></iframe>
                <form method="post" id="save-config" target="config-target" action="<?php echo site_url("notadinas/nav/save_config/") ?>">
                <TABLE style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;">
            <tr>
                <td>
            <div>
                <H3>Send Options</H3>
               <input type="text" name="nota_id_config" id="nota_id_config" style="display:none" value="<?php if(isset($options[0]->nota_id))echo $options[0]->nota_id; ?>" readonly="readonly">
                <input type="checkbox" name="segera"
                    <?php if(isset($options[0]->segera)) if($options[0]->segera==1) echo "checked" ?>
                 value="1">SEGERA<BR>
                
            </div>
            <div>
                <H3>Document Options</H3>
                <?php 
                      if(isset($options[0]->document_options)) 
                     {
                        if($options[0]->document_options=="DOKUMEN RAHASIA") $rahasia = true;
                        else if ($options[0]->document_options=="DOKUMEN RAHASIA & PRIBADI")$Pribadi = true;
                        else $biasa = true;
                 }else $biasa=true;
                 
                ?>
                <input type="radio" name="document_options" <?php if(isset($biasa))echo "checked" ?>  value="DOKUMEN BIASA">Document Biasa<br>
                <input type="radio" name="document_options" <?php if(isset($rahasia))echo "checked" ?> value="DOKUMEN RAHASIA">Document Rahasia<br>
                <input type="radio" name="document_options" <?php if(isset($pribadi))echo "checked" ?> value="DOKUMEN RAHASIA & PRIBADI">Document Rahasia & Pribadi<br>
            </div>
        </td>
        <td>
            <h3>Change Document Data</h3>
            Jabatan Pengirim:<br>
            <input type="text" name="jabatan_pengirim" id="jabatan_pengirim" value="<?php if(isset($options[0]->jabatan_pengirim))echo $options[0]->jabatan_pengirim; ?>"><br>
            <div style="display:none">Nama Pengirim:<br>
            <input type="text" name="nama_pengirim" id="nama_pengirim" value="<?php if(isset($options[0]->nama_pengirim)) echo $options[0]->nama_pengirim ?>"><br>
            </div>NIP Pengirim:<br>
            <input type="text" name="nik_pengirim" id="nik_pengirim" value="<?php if(isset($options[0]->nik_pengirim)) echo $options[0]->nik_pengirim ?>"><br>
            <div style="display:none">Unit Pengirim:<br>
            <input type="text" name="unit_pengirim" id="unit_pengirim" value="<?php if(isset($options[0]->unit_pengirim)) echo $options[0]->unit_pengirim ?>"><br>
            </div>Kota :<br>
            <input type="text" name="kota" id="kota" value="<?php if(isset($options[0]->kota)) echo $options[0]->kota ; else echo 'Bandung'?>"><br>

        </td>
            </tr>
            </TABLE>
            <input type="submit" value="submit" style="display:none">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>