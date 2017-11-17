<script type="text/javascript">
    $("document").ready(function() {
        var i = 1;
        if ($("#counter2").html() != null) {
            i = $("#counter2").html();
        }
        $("#dialog-form").dialog({
            autoOpen: false,
            width: 600,
            height: 550,
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
        var nama = "";
        var jobcode = "";
        var jobname = "";
        var empid = "";
        var empnum = "";
        var orgname = "";
        $("#tambah-btn").click(function() {
            $('#dialog-form').dialog('open');

            return false;
        });

        $('.btn-pil').click(function() {
            var id = $(this).attr('id').split('-')[1];
            var data = $('#pem-nama-' + id).html();
            nama = data.split('/')[0];
            jobcode = data.split('/')[1].split('-')[0];
            empid = data.split('/')[1].split('-')[1];
            empnum = $('#pem-num2-' + id).html();
            orgname = $('#org-num2-' + id).html();
            jobname = $('#data-pem2-'+id).html();
            var nomor = $('#counter').html();
            var title = "<p><b>Pemeriksa ke " + nomor + "</b></p>";
            nomor++;
            $('#counter').html(nomor);
            var isi = title;
            isi += "<div class=\"content-div\">";
            isi += "<div class=\"content-div-image\">";
            isi += "<img style=\"margin-left: 10px; margin-top: 10px;\" height=\"80\" width=\"80\" src=\"<?php echo base_url(); ?>css/unknown-prof-pic.png\"/>";
            isi += "</div><div class=\"content-div-data\">";
            isi += "<table>";
            isi += "<tr><td>NIK</td><td> : " + empid + "</td></tr>";
            isi += "<tr><td>Nama</td><td> : " + nama + "</td></tr>";
            isi += "<tr><td>Jabatan</td><td> : " + jobname + "</td></tr>";
            isi += "<tr><td>Organization</td><td> : " + orgname + "</td></tr>";
            isi += "</table></div></div>"

            var input = "<input type=\"hidden\" name=\"fitur_id[]\" value=\"3\" />";
            input += "<input type=\"hidden\" name=\"emp_num[]\" value=\"" + empnum + "\" />";

            
            $("#tambah").append(isi);
            $("#inputan").append(input);
            $("#dialog-form").dialog('close');
            
            return false;
        });
        $('.hapus').button();
        $('#submit-btn').button();
        $('#tambah-btn').button();
        
        $('#not-define-btn').click(function(){
            var nomor = $('#counter').html();
            var title = "<p><b>Pemeriksa ke " + nomor + "</b></p>";
            nomor++;
            $('#counter').html(nomor);
            var isi = title;
            isi += "<div class=\"content-div\">";
            isi += "<div class=\"content-div-image\">";
            isi += "<img style=\"margin-left: 10px; margin-top: 10px;\" height=\"80\" width=\"80\" src=\"<?php echo base_url(); ?>css/unknown-prof-pic.png\"/>";
            isi += "</div><div class=\"content-div-data\">";
            isi += "<table>";
            isi += "<tr><td>Pemeriksa</td>";
            isi += "<td> : Tidak Didefinisikan (Dapat Di custom)</td></tr>";
            isi += "</table></div></div>"
            $("#tambah").append(isi);
            var inputan = "<input type=\"hidden\" name=\"fitur_id[]\" value=\"4\" />";
            inputan += "<input type=\"hidden\" name=\"emp_num[] \" value=\"24\" />";
            $("#inputan").append(inputan);
            $("#dialog-form").dialog('close');
            return false;
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style type="text/css">
    .ui-button,  .ui-button-text .ui-button{  
        font-size: 12px;
        padding: 2px;
        margin-left:5px;
    }
    .ui-dialog {
        z-index: 9999;
    }
    .ui-tabs .ui-tabs-nav li a {font-size:9pt !important;}
    .ui-tabs-panel {font-size: smaller;}
</style>

<div id="dialog-form" title="Pilih Pemeriksa">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">List Data Pegawai</a></li>
        </ul>
        <div id="tabs-1">
            <h4>Pilih Pemeriksa SPPD</h4>

            <table style="font-size: smaller; width: 500px; margin-top: 20px; margin-left:10px; text-align: left;" id="list-pem-table">
                <tr style="background-color: black; color:white; text-align: center;">
                    <th>Nama/NIK/Jabatan</th>
                    <th>Pilih</th>
                </tr>
                <?php
                $i = 0;
                $j = 1;
                foreach ($all_atasan->result() as $row) {
                    ?>
                    <tr id="pilihan-<?php echo $row->emp_num; ?>">
                        <td style="padding-left:20px;" id="pem-nama-<?php echo $i; ?>"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . " - " . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td style="padding-left:20px;"><button id="pem-<?php echo $i; ?>" class="btn-pil">Pilih</button></td>
                        <td><p id="data-pem2-<?php echo $i; ?>" style="display:none"><?php echo $row->job_name; ?></p></td>
                        <td><p id="pem-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->emp_num; ?></p></td>
                        <td><p id="org-num2-<?php echo $i; ?>" style="display:none"><?php echo $row->org_name; ?></p></td>
                        
                    </tr>
                    <?php
                    $i++;
                    $j++;
                }
                ?>

            </table>
            <fieldset>
                <legend>Opsi</legend>
                <button id="not-define-btn">Pemeriksa tidak didefinisikan</button>
            </fieldset>
        </div>

        <div id="tambahan" style="display:none;">
        </div>
    </div>
</div>

<div id='content'>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Konfigurasi SPPD</h2>
    <form id="frm-data" method="post" action="<?php echo base_url(); ?>index.php/sppd_config/save_flow_sppd">
        <fieldset>
            <?php
            
            ?>
            <legend>List Urutan Pemeriksa</legend>
            <div id="main_table">
                <div id="awal">
                    <div id="first_div">
                        <?php
                        if ($flow->num_rows() == 0) {
                            ?>
                            <p>Belum Ada Pemeriksa</p>
                            <?php
                        }
                        ?>
                    </div>
                    <div id="tambah">   
                        <?php
                        $i = 1;
                        $total = $flow->num_rows();
                        foreach ($flow->result() as $row) {
                            ?>
                            <p><b>Pemeriksa ke <?php echo $i; ?></b></p>
                            <div class="content-div">
                                <div class="content-div-image">
                                    <img style="margin-left: 10px; margin-top: 10px;" height="80" width="80" src="<?php echo base_url(); ?>css/unknown-prof-pic.png"/>
                                </div>
                                <div class="content-div-data">
                                    <div class="content-div-data-left">

                                        <?php
                                        if ($row->emp_num != 24) {
                                            ?>
                                            <table>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td> : <?php echo $row->emp_id; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td> : <?php echo $row->emp_firstname . " " . $row->emp_lastname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jabatan</td>
                                                    <td> : <?php echo $row->job_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Organisasi</td>
                                                    <td> : <?php echo $row->org_name; ?></td>
                                                </tr>

                                            </table>
                                            <?php
                                        } else {
                                            ?>
                                            <table>
                                                <tr>
                                                    <td>Pemeriksa</td>
                                                    <td> : Tidak didefinisikan (Dapat Di custom)</td>
                                                </tr>

                                            </table>
                                            <?php
                                        }
                                        ?>    
                                    </div>
                                    <div class="content-div-data-right">
                                        <table>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td><a class="hapus" href="<?php echo base_url(); ?>index.php/sppd_config/hapus_pemeriksa/id/<?php echo $row->emp_num; ?>" >Hapus </a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i == $total) {
                                ?>
                                <p id="counter2" style="display: none;"><?php echo $i + 1; ?></p>
                                <?php
                            } else {
                                if ($total == 0) {
                                    ?>
                                    <p id="counter2" style="display: none;">1</p>
                                    <?php
                                }
                            }
                            $i++;
                        }
                        ?>
                                    <p id="counter" style="display:none;"><?php echo $i; ?></p>
                    </div>
                    <div id="pilihan">

                    </div>

                    <div id="inputan">
                        <?php
                        foreach ($flow->result() as $row2) {
                            ?>
                            <input type="hidden" name="fitur_id[]" value="<?php echo $row2->fitur_id; ?>" />
                            <input type="hidden" name="emp_num[]" value="<?php echo $row2->emp_num; ?>" />
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
            <button id="tambah-btn">Tambah Pemeriksa</button>
        </fieldset>
        <div style="text-align: center; margin-top: 10px;">
            <input type="submit" id="submit-btn" value="Simpan"/>
        </div>
    </form>
</div>
