
<div id="dialog-form" title="Form Data Pegawai"  style="z-index:99999">
    <div id="tabs">
        <div id="tabs-1" style="font-size: smaller;">
            <h4> Nota Dinas</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="keyword-nama" name="keyword" style="width:150px;" />
                <button id="search-nama-nota">Cari</button>
            </fieldset>

            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;" id="list-pem-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIK/Organisasi</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                 foreach ($all_emp as $row8) {
                    ?>
                    <tr id="pilihan-<?php echo $row8->emp_num; ?>">
                        <td id="pem8-<?php echo $row8->emp_num; ?>" style="padding-left:20px;"><?php echo $row8->emp_firstname . " " . $row8->emp_lastname . "/" . $row8->job_code . " - " . $row8->emp_id . "/" . $row8->org_code; ?></td>
                        <td style="padding-left:20px;"><button id="pem-<?php echo $row8->emp_num; ?>" class="btn-pil-pmh">Pilih</button></td>
                        <td><p id="pem-job8-<?php echo $row8->emp_num; ?>" style="display:none"><?php echo $row8->job_code; ?></p></td>
                        <td><p id="pem-num8-<?php echo $row8->emp_num; ?>" style="display:none"><?php echo $row8->emp_num; ?></p></td>
                        <td><p id="pem-name8-<?php echo $row8->emp_num; ?>" style="display:none"><?php echo $row8->emp_firstname . " " . $row8->emp_lastname; ?></p></td>
                        <td><p id="pem-id8-<?php echo $row8->emp_num; ?>" style="display:none"><?php echo $row8->emp_id; ?></p></td>
                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
</script>