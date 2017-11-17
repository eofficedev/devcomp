<style type="text/css">
    #table-karyawan td, #table-karyawan-2 td, #table-karyawan-3 td {
        padding-left: 20px;
        width: 150px;
        text-align: center;
    }
    .error-validate {
        font-size: smaller;
    }

    .error-msg {
        font-size: smaller;
        font-weight: bold;
        color:red;
    }

    .error-validate{
        font-size: smaller;
    }

    .ui-datepicker-unselectable .ui-state-disabled .ui-state-active{
        background-color: red;
    }

    .ui-button.ui-widget{
        height:25px;
        width:70px;
    }

    .ui-button.ui-widget .ui-button-text{
        font-size:12px;
    }

    #add-pemeriksa {
        height:25px;

    }


</style>
<script type="text/javascript">
    $("document").ready(function() {

        $("#dialog-form").dialog({
            autoOpen: false,
            width: 600,
            height: 500,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

        $("#dialog-form-pemohon").dialog({
            autoOpen: false,
            width: 600,
            height: 500,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

        $("#tabs").tabs();

        $('#add-pemeriksa').click(function() {
            $('#dialog-form').dialog('open');
            return false;
        });
        var disabledDaysRange = new Array();
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        var departdate = new Array();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/sppd/get_date_sppd",
            data: "emp_num=" + $('#emp_num').val(),
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
            var isi2 = $("#total-pem").html();
            if (isi != "" && isi2 > 0) {
                $("#submit_button").attr("disabled", false);
            }
            else {
                $("#submit_button").attr("disabled", true);
            }
        });

        $('#send-btn').click(function() {
            var isi = $("#komentator").val();
            if (isi == "") {
                alert('Komentar Tidak Boleh Kosong');
            }

            return false;
        });

        $('#draft-btn').click(function() {
            $('#tipe').val('2');
            $('#form-data').submit();
        });

        $('#pilih-pemohon').click(function() {
            $("#dialog-form-pemohon").dialog("open");
            return false;
        });


        $('#pmh').click(function() {
            $("#dialog-form-pemohon").dialog("open");
            return false;
        });
        $('#del-btn').button();
        $('#add-pemeriksa').button();

        $('#check_prof').change(function() {
            var check = $(this).attr('checked');

            if (check != null) {
                $('#prof_name').show();
            }
            else {
                $('#prof_name').hide();
            }
        });

        $('#cancel-btn').click(function() {

            window.location = "<?php echo base_url(); ?>index.php/site";
            return false;
        });

        $('#back-btn').click(function() {

            window.location = '<?php echo base_url(); ?>index.php/site';
            return false;
        });

        var i = 2;

        $('#addfile-btn').click(function() {
            var isi = "<tr id=\"baris-" + i + "\"><td style=\"text-align: left;\">File Lampiran :</td><td colspan=\"1\" style=\"text-align: left;\"><input type=\"file\" name=\"file_sppd[]\" /></td><td colspan=\"2\"><button class=\"btn-" + i + "\" id=\"addfile-btn\">&nbsp;-</button> Hapus &nbsp;</td></tr>";
            $('#table-karyawan-2').append(isi);

            $(".btn-" + i).click(function() {
                var id = $(this).attr("class").split('-')[1];

                $('#baris-' + id).remove();
                return false;
            });
            i++;
            return false;
        });

        $('#search-jabatan').click(function() {
            var keyword = $('#key-jabatan').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/emp/get_jabatan_by_keyword",
                data: "keyword=" + keyword,
                success: function(data) {

                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";
                    isi += "<th>Nama Jabatan</th>";
                    isi += "<th>Pilih</th>";
                    isi += "</tr>";

                    $('#list-pem-table').html(isi);
                    if (total > 0) {
                        var i = 0;
                        var j = 1;
                        for (i = 0; i < total; i++) {
                            var isi2 = "<tr>";
                            isi2 += "<td style=\"padding-left:20px;\">" + content[i].job_id + " - " + content[i].job_name + "</td>";
                            isi2 += "<td style=\"padding-left:20px;\"><button id=\"pem-" + i + "\" class=\"btn-pilih-jbt-" + i + "\">Pilih</button></td>";
                            isi2 += "<td style=\"padding-left:20px;\"><p id=\"data-pem6-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p>";
                            isi2 += "<p id=\"pem-num6-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            j++;
                            $('#list-pem-table').append(isi2);
                            $('.btn-pilih-jbt-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];
                                var pemid = "#data-pem6-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num6-' + id).html();
                                var x = document.getElementById("pemeriksa");
                                var option = document.createElement("option");
                                option.text = jobname;
                                option.value = empnum;
                                x.add(option, x.options[null]);

                                var tmbh = "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa[]\" value=\"" + empnum + "\" />";
                                tmbh += "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa2-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa-def[]\" value=\"" + empnum + "\" />";

                                $('#tambah-input').append(tmbh);
                                counter_pemeriksa++;
                                var tot = $('#total-pem').html();
                                var totalpem = parseInt(tot) + 1;
                                $('#total-pem').html(totalpem);
                                $('#dialog-form').dialog('close');
                            });
                        }
                    }



                }
            });
            return false;
        });

        $('#hapus-prof-btn').click(function() {
            var id = $('#prof').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/emp/del_profile",
                data: "prof_id=" + id,
                success: function(data) {
                    $("#prof option:selected").remove();
                    $("#prof-data").html("<p><b>Anda Belum Memilih Profil</b></p>");
                }
            });

        });

        var counter_pemeriksa = 0;
        var count_pem2 = 0;
        $('#search-nama').click(function() {
            var keyword2 = $('#keyword-nama').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/emp/get_employee_by_name",
                data: "key=" + keyword2,
                success: function(data) {

                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";

                    isi += "<th>Nama/NIK/Organisasi</th>";
                    isi += "<th>Pilih</th></tr>";
                    $('#list-pem-table2').html(isi);
                    if (total > 0) {
                        var i = 0;
                        var j = 1;
                        for (i = 0; i < total; i++) {
                            var isi2 = "<tr>";
                            isi2 += "<td style=\"padding-left:20px;\">" + content[i].emp_firstname + " " + content[i].emp_lastname + "/" + content[i].job_code + "-" + content[i].emp_id + "/" + content[i].org_code + "</td>";
                            isi2 += "<td style=\"padding-left:20px;\"><button id=\"pem5-" + i + "\" class=\"btn-pilih2-" + i + "\">Pilih</button></td>";
                            isi2 += "<td style=\"padding-left:20px;\"><p id=\"data-pem5-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p>";
                            isi2 += "<p id=\"pem-num5-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            j++;
                            $('#list-pem-table2').append(isi2);

                            $('.btn-pilih2-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];

                                var pemid = "#data-pem5-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num5-' + id).html();
                                var x = document.getElementById("pemeriksa");
                                var option = document.createElement("option");
                                option.text = jobname;
                                option.value = empnum;
                                x.add(option, x.options[null]);

                                var tmbh = "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa[]\" value=\"" + empnum + "\" />";
                                tmbh += "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa2-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa-def[]\" value=\"" + empnum + "\" />";
                                $('#tambah-input').append(tmbh);
                                counter_pemeriksa++;
                                var tot = $('#total-pem').html();
                                var totalpem = parseInt(tot) + 1;
                                $('#total-pem').html(totalpem);
                                $('#dialog-form').dialog('close');
                            });
                        }
                    }

                }
            });
            return false;
        });

        $(".btn-pil").click(function() {

            var id = $(this).attr('id').split('-')[1];
            alert(id);
            var pemid = "#data-pem2-" + id;

            var jobname = $(pemid).html();
            var empnum = $('#pem-num2-' + id).html();

            var x = document.getElementById("pemeriksa");
            var option = document.createElement("option");
            option.text = jobname;
            option.value = empnum;
            x.add(option, x.options[null]);

            var tmbh = "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa-" + empnum + "\" type=\"hidden\" name=\"pemeriksa[]\" value=\"" + empnum + "\" />";
            tmbh += "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa2-" + empnum + "\" type=\"hidden\" name=\"pemeriksa-def[]\" value=\"" + empnum + "\" />";
            $('#tambah-input').append(tmbh);
            counter_pemeriksa++;

            $('#dialog-form').dialog('close');

            $('#pilihan-' + id).remove();
            return false;
        });

        $('.btn-pil-jbt2').click(function() {
            var id = $(this).attr('id').split('-')[1];
            var pemid = "#data-pem3-" + id;
            var jobname = $(pemid).html();
            var empnum = $('#pem-num3-' + id).html();
            var x = document.getElementById("pemeriksa");
            var option = document.createElement("option");
            option.text = jobname;
            option.value = empnum;
            x.add(option, x.options[null]);

            var tmbh = "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa[]\" value=\"" + empnum + "\" />";
            tmbh += "<input class=\"pema2-" + empnum + "\" id=\"pemeriksa2-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa-def[]\" value=\"" + empnum + "\" />";
            $('#tambah-input').append(tmbh);
            counter_pemeriksa++;
            count_pem2++;
            
            
            //$('#pilihan-jbt-' + id).remove();
            var tot = $('#total-pem').html();
            var totalpem = parseInt(tot) + 1;
            $('#total-pem').html(totalpem);
            $('#dialog-form').dialog('close');
        });

        $('#check_prof').change(function() {
            if ($(this).val()) {
                $('#prof_name').attr('display', 'block');
            }
            else {
                $('#prof_name').attr('display', 'none');
            }
        });

        $('#del-btn').click(function() {
            var id = $('#pemeriksa').val();
            $("#pemeriksa option:selected").remove();
            $('#pilihan-jbt-' + id).add();
            $('.pema2-' + id).remove();
            return false;
        });

        var totalsemua = 0;
        var content2 = "";
        $('#prof').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/emp/load_detail_profile",
                data: "prof=" + id,
                success: function(data) {
                    $('#prof-data').html("<p><b>Urutan Pemeriksa : </b></p>");
                    $('#temp-prof').html("");
                    var content = JSON.parse(data);
                    content2 = content;
                    var total = content.length;
                    totalsemua = total;
                    var i = 0;
                    for (i = 0; i < total; i++) {
                        var isi = content[i].prof_order + ". " + content[i].emp_firstname + " " + content[i].emp_lastname + "/" + content[i].job_code + "-" + content[i].emp_id + "/" + content[i].org_code;
                        $('#prof-data').append("<p>" + isi + "</p>");
                        var inputan = "<input id=\"pemeriksa-" + counter_pemeriksa + "\" type=\"hidden\" name=\"pemeriksa[]\" value=\"" + content[i].emp_num + "\" />";
                        $('#temp-prof').append(inputan);
                    }
                }
            });
        });

        $('#pil-btn').click(function() {
            var inputan = $('#temp-prof').html();
            if (inputan == "") {
                alert("Anda belum memilih profil");
            }
            else {
                $('#tambah-input').html(inputan);
                for (var i = 0; i < totalsemua; i++) {
                    var x = document.getElementById("pemeriksa");
                    var option = document.createElement("option");
                    option.text = content2[i].job_name;
                    option.value = content2[i].emp_num;
                    x.add(option, x.options[null]);
                }
                $('#dialog-form').dialog('close');
                var tot = $('#total-pem').html();
                var totalpem = parseInt(tot) + 1;
                $('#total-pem').html(totalpem);
            }
        });
        var nama = "";
        var jobcode = "";
        var empid = "";
        var empnum = "";
        $('.btn-pil-pmh').click(function() {
            var id = $(this).attr('id').split("-")[1];
            nama = $('#pem-name8-' + id).html();
            jobcode = $('#pem-job8-' + id).html();
            empid = $('#pem-id8-' + id).html();
            empnum = $('#pem-num8-' + id).html();

            var x = document.getElementById("nama");
            x.value = nama;
            var y = document.getElementById("emp_id");
            y.value = empid;

            var z = document.getElementById("job_code");
            z.value = jobcode;
            var w = document.getElementById("emp_num");
            w.value = empnum;

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/sppd/get_date_sppd",
                data: "emp_num=" + $('#emp_num').val(),
                success: function(data) {
                    disabledDaysRange = new Array();
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

            $('#dialog-form-pemohon').dialog('close');
        });

        $('#total-pem').change(function() {
            alert('msk');
            var isi = $("#komentator").val();
            var isi2 = $("#total-pem").html();
            if (isi != "" && isi2 > 0) {
                $("#submit_button").attr("disabled", false);
            }
            else {
                $("#submit_button").attr("disabled", true);
            }
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style type="text/css">
    .ui-tabs .ui-tabs-nav li a {font-size:9pt !important;}
    .ui-tabs-panel {font-size: smaller;}
    #add-pemeriksa {
        height:25px;
    }
    .ui-dialog{
        z-index: 9999;
    }
</style>

<div id="dialog-form" title="Pilih Pemeriksa">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Berdasarkan Jabatan</a></li>
            <li><a href="#tabs-2">Berdasarkan Nama</a></li>
            <li><a href="#tabs-3">Load Profile</a></li>
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
                foreach ($all_atasan->result() as $row) {
                    ?>
                    <tr id="pilihan-jbt-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->job_id . "-" . $row->job_name; ?></td>
                        <td style="padding-left:20px;"><button id="pem3-<?php echo $i; ?>" class="btn-pil-jbt2">Pilih</button></td>

                    <p id="data-pem3-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num3-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
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
                <input type="text" id="keyword-nama" name="keyword" style="width:150px;" />
                <button id="search-nama">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-pem-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIP/Organisasi</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_atasan->result() as $row) {
                    ?>
                    <tr id="pilihan-<?php echo $i; ?>">
                        <td style="padding-left:20px;"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . " - " . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td style="padding-left:20px;"><button id="pem-<?php echo $i; ?>" class="btn-pil">Pilih</button></td></tr>
                    <p id="data-pem2-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p>
                    <p id="pem-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p>
                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>
            </table>
        </div>
        <div id="tabs-3">
            <h4>Load Profile</h4>
            <fieldset>
                <legend>List Profile Yang Telah di Save</legend>
                <select multiple="multiple" id="prof" style="width:250px; height: 100px;">
                    <?php
                    foreach ($list_profile->result() as $row) {
                        ?>
                        <option value="<?php echo $row->prof_id; ?>"><?php echo $row->prof_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <button id="pil-btn">Pilih</button>
                <button id="hapus-prof-btn">Hapus</button>

            </fieldset>
            <fieldset>
                <legend>Detail Profil</legend>
                <div id="prof-data">
                    <p><b>Anda Belum Memilih Profil</b></p>
                </div>
                <div style="display: none;" id="temp-prof">

                </div>
            </fieldset>
        </div>

        <div id="tambahan" style="display:none;">
        </div>
    </div>
</div>

<div id="dialog-form-pemohon" title="Pilih Pemohon">
    <div id="tabs">
        <div id="tabs-1" style="font-size: smaller;">
            <h4>Pilih Pemohon berdasarkan Nama</h4>
            <fieldset>
                <legend>Filter</legend>
                Cari :
                <input type="text" id="keyword-nama" name="keyword" style="width:150px;" />
                <button id="search-nama">Cari</button>
            </fieldset>
            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:30px; text-align: left;" id="list-pem-table2">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIK/Organisasi</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_atasan_pmh->result() as $row8) {
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


<div id="content">

    <h2 style="margin: 0px; padding: 20px; text-align: left;">Create New SPPD</h2>
    <?php
    if ($pemeriksa->num_rows() == 0) {
        ?>
        <fieldset>
            <legend>Warning</legend>
            <p>Flow SPPD belum di konfigurasi</p>
            <p>Mohon Hubungi Admin</p>

            <button id="back-btn">Kembali ke Home</button>
        </fieldset>
        <?php
    } else {
        ?>
        <div style="text-align: left; margin-left: 560px;">
            <table>
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

        <form id="form-data" method="post" action="<?php echo base_url() ?>index.php/sppd/process" accept-charset="utf-8" enctype="multipart/form-data">
            <?php
            $this->load->helper('form');

            echo form_hidden("emp_create_id", $row->emp_num);
            ?>
            <input type="hidden" name="tipe" id="tipe" value="1"/>
            <fieldset>
                <div class="error-validate" style="border-bottom: 1px dotted black; <?php
                if ($error == null) {
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
                    <input type="hidden" name="emp_num" id="emp_num" value="<?php echo $row->emp_num; ?>"/>
                    <td id="pmh"><?php
                        echo form_input(array('name' => 'emp_name2', 'disabled' => 'disabled', 'value' => $row->emp_firstname . " " . $row->emp_lastname, 'id' => 'nama'));
                        echo form_input(array('name' => 'emp_id2', 'disabled' => 'disabled', 'value' => $row->id_emp, 'id' => 'emp_id'));
                        echo form_input(array('name' => 'job_code2', 'disabled' => 'disabled', 'value' => $row->job_code, 'id' => 'job_code'));
                        ?><a id="pilih-pemohon" href="#">Pilih</a></td>

                    <td><?php echo form_input('destination', set_value('destination')); ?></td>
                    <td><?php echo form_input(array('id' => 'depart', 'name' => 'depart', 'value' => set_value('depart'), 'size' => '10', 'readonly' => 'readonly')); ?></td>
                    <td><?php echo form_input(array('id' => 'arrive', 'name' => 'arrive', 'value' => set_value('arrive'), 'size' => '10', 'readonly' => 'readonly')); ?></td>
                    <td><textarea name="keterangan" cols="20" rows="4"><?php echo set_value('keterangan'); ?></textarea></td>
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
                            'value' => set_value('dasar')
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
                            'value' => set_value('tujuan')
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
                            'value' => set_value('catt')
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
                <table id="table-karyawan-2" style="width: 800px;">
                    <tr>
                        <td style="text-align: left;">File Lampiran :</td>
                        <td colspan="1" style="text-align: left;">
                            <input type="file" name="file_sppd[]" />
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">File Lampiran :</td>
                        <td colspan="1" style="text-align: left;">
                            <input type="file" name="file_sppd[]" />
                        </td>
                        <td colspan="2" style=""><button style="background-color: red; color: white;" id="addfile-btn">+</button> Tambah</td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Pemeriksa</legend>
                <table>
                    <?php
                    $j=0;
                    foreach ($pemeriksa->result() as $rowdata) {
                        if ($rowdata->emp_num != 24) {
                            ?>
                            <tr>
                                <td>Pemeriksa <?php echo $rowdata->job_name; ?></td>
                                <td><p style="margin-left:20px;"> : <?php echo $rowdata->emp_firstname . " " . $rowdata->emp_lastname . "/" . $rowdata->job_code . "-" . $rowdata->emp_id . "/" . $rowdata->org_code; ?></p></td>
                            <input type="hidden" name="pemeriksa[]" value="<?php echo $rowdata->emp_num; ?>"/>
                            </tr>
                            <?php
                            
                        } else {
                            ?>
                            <tr>
                                <td>Pemeriksa : </td>
                                <td><select name="Pemeriksa" id="pemeriksa" style="margin-left:20px; width: 300px;" multiple></select></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><p style="margin-left:20px;"><a href="#" id="add-pemeriksa">Add</a><a href="#" id="del-btn">Delete</a></p>
                                    <p id="tambah-input" style="display:none;"></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input id="check_prof" style="margin-left:20px;" type="checkbox" name="save_prof" />Save Profile
                                    <p id="prof_name" style="margin-left:20px; margin-top: 5px; font-size: smaller; display:none;">Nama Profil : <input type="text" name="prof_name" /> <br/></p>
                                </td>
                            </tr>
                            <?php
                        }
                        $j++;
                    }
                    $rowfiatur = $fiatur->row();
                    ?>
                            <p id="total-pem" style="display:none;"><?php echo $j; ?></p>
                    <tr>
                        <td>Pemeriksa <?php echo $rowfiatur->job_name; ?></td>
                        <td><p style="margin-left:20px;"> : <?php echo $rowfiatur->emp_firstname . " " . $rowfiatur->emp_lastname . "/" . $rowfiatur->job_code . "-" . $rowfiatur->emp_id . "/" . $rowfiatur->org_code; ?></p></td>
                    <input type="hidden" name="pemeriksa[]" value="<?php echo $rowfiatur->emp_num; ?>"/>
                    </tr>
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
            <table id="table-karyawan-3" style="width: 800px; height:50px;">
                <tr>
                    <td></td>
                    <td></td>
                    <?php
                    if($j >=1){
                        $data = array(
                            "id" => "submit_button",
                            "name" => "submit_button"
                        );
                    }
                    else {
                        $data = array(
                            "id" => "submit_button",
                            "name" => "submit_button",
                            "disabled" => "disabled"
                        );
                    }
                    
                    ?>
                    <td style="width: 300px;"><small><button id="draft-btn">Draft</button></small> <?php echo form_submit($data, "Submit"); ?> <button id="cancel-btn">Cancel</button></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </form>
        <?php
    }
    ?>
</div>