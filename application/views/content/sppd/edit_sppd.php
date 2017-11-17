<style type="text/css">
    #table-karyawan td, #table-karyawan-2 td, #table-karyawan-3 td {
        padding-left: 20px;
        width: 150px;
        text-align: center;
    }
    #table-karyawan tr {

    }
</style>
<script type="text/javascript">
    $("document").ready(function() {
        var disabledDaysRange = new Array();
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        var departdate = new Array();
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/sppd/get_date_sppd",
            data: "emp_num="+$('#emp_num').val(),
            success: function(data) {
                var content = JSON.parse(data);
                var total = content.length;

                if (total > 0) {
                    var i = 0;
                    disabledDaysRange[0] = new Array();
                    for (i = 0; i < total; i++) {
                        var isi = content[i].sppd_depart + " to " + content[i].sppd_arrive;
                        disabledDaysRange[0].push(isi);
                    }
                }
            }
        });

        function disableRangeOfDays(d) {
            for (var i = 0; i < disabledDaysRange.length; i++) {
                if ($.isArray(disabledDaysRange[i])) {
                    for (var j = 0; j < disabledDaysRange[i].length; j++) {
                        var r = disabledDaysRange[i][j].split(" to ");
                        r[0] = r[0].split("-");
                        r[1] = r[1].split("-");
                        if (new Date(r[0][0], (r[0][1] - 1), r[0][2]) <= d && d <= new Date(r[1][0], (r[1][1] - 1), r[1][2])) {
                            return [false, "ui-state-active", "Anda telah membuat SPPD pada tanggal tersebut"];
                        }
                    }
                } else {
                    if (((d.getFullYear() + 1) + '-' + d.getMonth() + '-' + d.getDate()) == disabledDaysRange[i]) {
                        return [false];
                    }
                }
            }
            return [true];
        }
        
        $("#depart").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
            minDate: new Date(y, m, d),
            beforeShowDay: disableRangeOfDays,
            numberOfMonths: 2,
            onSelect: function(dateText, inst) {
                var d = new Date(dateText);
                departdate[0] = d.getFullYear();
                departdate[1] = parseInt(d.getMonth()) + 1;
                departdate[2] = d.getDate();
            },
            onClose: function(selectedDate) {
                $("#arrive").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#arrive").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
            beforeShowDay: disableRangeOfDays,
            numberOfMonths: 2
        });

        $(".ui-datepicker-trigger").mouseover(function() {
            $(this).css('cursor', 'hand');
        });

        $("#komentator").keyup(function() {
            var isi = $("#komentator").val();
            if (isi != "") {
                $("#submit_button").attr("disabled", false);
                $("#save-btn").attr("disabled", false);
            }
            else {
                $("#submit_button").attr("disabled", true);
                $("#save-btn").attr("disabled", true);
            }
        });

        $('#send-btn').click(function() {
            var isi = $("#komentator").val();
            if (isi == "") {
                alert('Komentar Tidak Boleh Kosong');
            }

            return false;
        });

        $('#save-btn').click(function() {
            $('#tipe').val('2');
            $('#form-data').submit();
        });
        var i =0;
        $('#addfile-btn2').click(function() {
            var isi = "<tr id=\"baris-" + i + "\"><td style=\"text-align: left;\">File Lampiran :</td><td colspan=\"1\" style=\"text-align: left;\"><input type=\"file\" name=\"file-sppd[]\" /></td><td colspan=\"2\"><button class=\"btn-" + i + "\" id=\"addfile-btn\">&nbsp;-</button> Hapus &nbsp;</td></tr>";
            $('#table-karyawan-2').append(isi);
            $(".btn-" + i).click(function() {
                var id = $(this).attr("class").split('-')[1];
                $('#baris-' + id).remove();
            });
            i++;
            return false;
        });

        $('.download').button();
    });


</script>
<style>
    .ui-button-text {
        font-size: 12px;
    }
    .ui-button {
       padding:2px;
    }
</style>

<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Edit SPPD</h2>
    <div style="text-align: right; margin-left: 560px;">
        <table style="text-align: left;">
            <tr><td><b>Status Dokumen</b></td><td>: Dokumen Baru</td></tr>
            <tr><td><b>Pembuat Dokumen</b></td>
                <td>: 
                    <?php
                    $row = $result->row();
                    echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . "-" . $row->id_emp . '/' . $row->org_code;
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <form id="form-data" method="post" action="<?php echo base_url() ?>index.php/sppd/process_edit" enctype="multipart/form-data" accept-charset="utf-8">
        <?php
        $this->load->helper('form');
        echo form_hidden("emp_create_id", $row->emp_num);
        ?>
        <input type="hidden" name="tipe" id="tipe" value="1"/>
        <input type="hidden" name="emp_num" id="emp_num" value="<?php echo $row->emp_num; ?>"/>
        
        <fieldset>
            <div class="error-validate" style="border-bottom: 1px dotted black; <?php if (!isset($error)) {
            echo "display:none;";
        }
        ?>">
                     <?php
                     echo form_error('destination');
                     echo form_error('depart');
                     echo form_error('arrive');
                     echo form_error('keterangan');
                     ?>
            </div>
            <legend>Data Karyawan</legend>
            <table id="table-karyawan" style="width: 900px;">
                <thead>
                <th>Nama / NIK / Jabatan</th>
                <th>Asal - Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                </thead>
                <tr style="text-align: center;">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
                <tr>
                    <?php
                    $dataSppd = $data_sppd->row();
                    ?>
                    <td><?php
                        echo form_hidden("emp_num", $row->emp_num);
                        echo form_hidden("sppd_id", $dataSppd->sppd_num);
                        echo form_hidden("sppd_id_no", $dataSppd->sppd_id);
                        ?>
                        <p><?php echo $row->emp_firstname . ' ' . $row->emp_lastname; ?> / 
                        <?php echo $row->id_emp; ?> / 
                        <?php echo $row->job_code; ?></p>
                        </td>

                    <td><?php echo form_input('destination', $dataSppd->sppd_dest); ?></td>
                    <td><?php echo form_input(array('id' => 'depart', 'name' => 'depart', 'readonly' => 'readonly', 'size' => '10', 'value' => $dataSppd->sppd_depart)); ?></td>
                    <td><?php echo form_input(array('id' => 'arrive', 'name' => 'arrive', 'readonly' => 'readonly', 'size' => '10', 'value' => $dataSppd->sppd_arrive)); ?></td>
                    <td><textarea name="keterangan" cols="20" rows="4"><?php echo $dataSppd->sppd_ket; ?></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Dasar Perjalanan : </td>
                    <?php
                    $data = array(
                        'name' => 'dasar',
                        'size' => '74',
                        'value' => $dataSppd->sppd_dsr
                    );
                    ?>
                    <td colspan="3" style="text-align: left;"><?php echo form_input($data); ?></td>
                    <td class="error-msg"><?php echo form_error('dasar'); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Tujuan Perjalanan : </td>
                    <?php
                    $data = array(
                        'name' => 'tujuan',
                        'size' => '74',
                        'value' => $dataSppd->sppd_tuj
                    );
                    ?>
                    <td colspan="3" style="text-align: left;"><?php echo form_input($data); ?></td>
                    <td class="error-msg"><?php echo form_error('tujuan'); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Catatan : </td>
                    <?php
                    $data = array(
                        'name' => 'catt',
                        'size' => '74',
                        'value' => $dataSppd->sppd_catt
                    );
                    ?>
                    <td colspan="3" style="text-align: left;"><?php echo form_input($data); ?></td>
                    <td class="error-msg"><?php echo form_error('catt'); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

<?php ?>
        </fieldset>
        <fieldset>
            <legend>Data Lampiran</legend>
            <table id="table-karyawan-2" style="width: 800px; text-align: center;">
                <?php
                if (count($lampiran) > 0) {
                    foreach ($lampiran as $key => $value) {
                        ?>
                        <tr style="margin-top:10px;">
                            <td style="text-align: left;">File Lampiran : </td>
                            <td style="font-size:14px;"><i><?php echo $value; ?></i></td>
                            <td style="font-size: smaller;"><a href="<?php echo base_url(); ?>index.php/sppd/get_file/id/<?php echo $dataSppd->sppd_id; ?>/filename/<?php echo $value; ?>" class="download">Download</a></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<p style=\"font-size:14px;\"><i>Tidak Ada File Lampiran</i></p>";
                }
                ?>
                <tr>
                    <td style="text-align: left;">File Lampiran :</td>
                    <td colspan="1" style="text-align: left;"><?php echo form_upload('file_sppd[]'); ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">File Lampiran :</td>
                    <td colspan="1" style="text-align: left;"><?php echo form_upload('file_sppd[]'); ?></td>
                    <td colspan="2"><button id="addfile-btn2" style="background-color: red; color: white;">+</button> Tambah</td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend>Pemeriksa</legend>
            <table>
                <?php
                foreach ($pemeriksa->result() as $rowdata) {
                    if ($rowdata->emp_num != null) {
                        ?>
                        <tr>
                            <td>Pemeriksa <?php echo $rowdata->job_name; ?></td>
                            <td> : <?php echo $rowdata->emp_firstname . " " . $rowdata->emp_lastname . "/" . $rowdata->job_code . "-" . $rowdata->emp_id . "/" . $rowdata->org_code; ?></td>
                        <input type="hidden" name="pemeriksa[]" value="<?php echo $rowdata->emp_num; ?>"/>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr>
                            <td>Pemeriksa : </td>
                            <td><select name="Pemeriksa" id="pemeriksa" style="margin-left:125px; width: 300px;" multiple></select></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p style="margin-left:125px;"><a href="javascript:window.open('<?php echo base_url(); ?>index.php/sppd/show_exam','Pilih Pemeriksa','height=500,width=800')">Add Person</a></p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p style="margin-left:105px;"><?php
                                    echo form_open('sppd/save_profile');
                                    echo form_checkbox('save_check');
                                    ?>  Save Profile</p></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </fieldset>
        <fieldset>
            <legend>Komentar</legend>
            <table id="table-karyawan-3" style="width: 800px;">
                <tr>
                    <td style="text-align: left;">Tanggal/Komentator :</td>
                    <td colspan="4" style="text-align: left;"><?php
                        $datestring = "%d-%m-%Y";
                        $time = time();
                        echo mdate($datestring, $time) . " - ";
                        echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . "-" . $row->id_emp . '/' . $row->org_code;
                        ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                $data = array(
                    'id' => 'komentator',
                    'name' => 'komentator',
                    'size' => '74'
                );
                ?>
                <tr>
                    <td style="text-align: left;">Komentator Baru : </td>
                    <td colspan="4" style="text-align: left;"><?php echo form_input($data); ?></td>
                </tr>
            </table>
        </fieldset>
        <br/>

        <table id="table-karyawan-3" style="width: 800px;">
            <tr>
                <td></td>
                <td></td>
                <?php
                $data = array(
                    "id" => "submit_button",
                    "name" => "submit_button",
                    "disabled" => "disabled"
                );
                ?>
                <td style="width: 300px;"><button id="save-btn" disabled="disabled">Simpan</button><?php echo form_submit($data, "Simpan & Kirim"); ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>