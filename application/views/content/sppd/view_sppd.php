<style type="text/css">
    #table-karyawan td, #table-karyawan-2 td, #table-karyawan-3 td {
        padding-left: 20px;
        width: 150px;
        text-align: center;
    }
    #table-karyawan tr {

    }
    .ui-button,  .ui-button-text .ui-button{  
        font-size: 9px;
        padding: 2px;
        margin-left:5px;
    }

</style>
<?php
$sppd = $data_sppd->row();
?>
<script src="<?php echo base_url(); ?>js/number_format.js"></script>
<script src="<?php echo base_url(); ?>js/number-format.js"></script>
<script type="text/javascript">
    $('document').ready(function() {
        var i = 2;
        var j = 2;

        $('#setuju-btn').click(function() {
            var isi = $('#komentar').val();
            var sppdnum = $('#sppd_number').val();
            var empnum = $('#emp_number').val();
            var stat_rin = $('#stat_rin').html();
            if (isi == "") {
                alert("Komentar Tidak Boleh Kosong");
            }
            else {
                if (stat_rin == 2) {
                    alert("Data Perincian Belum diinput");
                }
                else {
                    $('#form-sppd').submit();
                    alert('SPPD berhasil di approve');
                }
            }
            return false;
        });

        $('#setuju-btn2').click(function() {
            var isi = $('#komentar').val();
            var sppdnum = $('#sppd_number').val();
            var empnum = $('#emp_number').val();
            var stat_rin = $('#stat_rin').html();
            if (isi == "") {
                alert("Komentar Tidak Boleh Kosong");
            }
            else {
                if (stat_rin == 2) {
                    alert("Data Perincian Belum diinput");
                }
                else {
                    $('#form-sppd').submit();
                    alert('SPPD berhasil di approve');
                }
            }
            return false;
        });

        $('#return-btn').click(function() {
            var isi_komentar = $('#komentar').val();
            $('#komentar2').val(isi_komentar);
            $('#frm-reject').submit();

            return false;
        });

        $('#reject-btn').click(function() {
            var isi_komentar = $('#komentar').val();
            $('#komentar3').val(isi_komentar);
            $('#frm-tolak').submit();
            return false;
        });

        $('#simpan-btn').click(function() {
            var isi_komentar = $('#komentar').val();
            $('#komentar4').val(isi_komentar);
            $(".file-sppd").each(function() {
                var $this = $(this), $clone = $this.clone();
                $this.after($clone).appendTo("#frm-simpan");
            });
            $('#frm-simpan').submit();
            return false;
        });
        
        $('#simpan-btn2').click(function() {
            $('#form-sppd').submit();
            return false;
        });

        $('#perincian-btn').click(function() {

            $('#dialog-form').dialog('open');
            return false;
        });

        $('#edit-btn').button();

        $('#edit-btn').click(function() {

            var id = $('#sppd_number').val();
            window.location = "<?php echo base_url(); ?>index.php/sppd/edit_sppd_by_pemeriksa/id/" + id;
            return false;
        });

        $("#dialog-form").dialog({
            autoOpen: false,
            width: 900,
            height: 600,
            hide: 'fadeOut',
            show: 'fadeIn',
            modal: true,
            position: 'top',
            buttons: {
                "Simpan": function() {
                    $('#simpan-perincian-form').submit();
                },
                "Close": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

        $('#add-btn').click(function() {
            var isi = "<tr id=\"row-" + i + "\">";
            isi += "<td><input type=\"text\" id=\"no-" + i + "\" style=\"width:30px; text-align: right;\" value=\"" + i + "\" readonly=\"readonly\" /></td>";
            isi += "<td><input type=\"text\" id=\"angkutan-" + i + "\" name=\"angkutan[]\" style=\"width:200px;\" /></td>";
            isi += "<td><input type=\"text\" id=\"asal-" + i + "\" name=\"asal[]\" style=\"width:100px;\" /></td>";
            isi += "<td><input type=\"text\" id=\"tujuan-" + i + "\" name=\"tujuan[]\" style=\"width:100px;\" /></td>";
            isi += "<td><input type=\"text\" onkeyup=\"addSeparator(this)\" id=\"trfangkutan-" + i + "\" class=\"trfa-" + i + "\" name=\"trfangkutan[]\" style=\"width:100px;\" /></td>";
            isi += "<td><input type=\"text\" id=\"jumlah-" + i + "\" name=\"jml[]\" class=\"trfa-" + i + "\" style=\"width:40px;\" /></td>";
            isi += "<td><input type=\"text\" id=\"jmltrans-" + i + "\" class=\"aaa\" name=\"jmltrans[]\" readonly=\"readonly\" style=\"width:100px;\" /></td>";
            isi += "<td><button id=\"remove-btn-" + i + "\" class=\"rem-" + i + "\">-</button> Hapus Row</td>";
            isi += "</tr>";

            $('#main-angkutan-body').append(isi);

            $('#remove-btn-' + i).click(function() {
                var row_id = $(this).attr('class').split('-')[1];
                $('#row-' + row_id).remove();
            });

            $('.trfa-' + i).change(function() {
                var id = $(this).attr('id').split('-');
                var type = id[0];
                var no = id[1];

                var trf2 = $('#trfangkutan-' + no).val();
                var trf = trf2.replace(/,/g, '');
                var jml = $('#jumlah-' + no).val();


                if (trf != "" && jml != "") {
                    var total = trf * jml;
                    var total2 = FormatNumberBy3(total);
                    $('#jmltrans-' + no).val(total2);
                }
            });

            i++;
            return false;
        });

        $('.trfa-1').keyup(function() {

            var trf2 = $('#trfangkutan-1').val();
            var trf = trf2.replace(/,/g, '');
            var jml = $('#jumlah-1').val();


            if (trf != "" && jml != "") {
                var total = trf * jml;
                var total2 = FormatNumberBy3(total);
                $('#jmltrans-1').val(total2);
            }
        });
        $('.trfhari-1').keyup(function() {

            var trf = $('#jharian-1').val().replace(/,/g, '');
            var jml = $('#persentase-1').val();
            var lama = $('#lama-1').val();
            if (trf != "" && jml != "") {
                var total = trf * (jml / 100) * lama;
                $('#tharian-1').val(FormatNumberBy3(total));
            }
        });

        $('.add-harian-btn').click(function() {
            var isi = "<tr id=\"row-harian-" + j + "\">";
            isi += "<td><input type=\"text\" name=\"tgl-berangkat[]\" class=\"tgl\" id=\"tgl-berangkat-" + j + "\" style=\"width:140px;\" /></td>";
            isi += "<td><input type=\"text\" name=\"tgl-kembali[]\" class=\"tgl\" id=\"tgl-kembali-" + j + "\" style=\"width:140px;\"/></td>";
            isi += "<td><input type=\"text\" name=\"lama[]\" id=\"lama-" + j + "\" readonly=\"readonly\" style=\"width:40px;\" /></td>";
            isi += "<td><input type=\"text\" name=\"jharian[]\" onkeyup=\"addSeparator(this)\" id=\"jharian-" + j + "\" class=\"trfhari-" + j + "\" style=\"width:140px;\"/></td>";
            isi += "<td><input type=\"text\" name=\"persen[]\" id=\"persentase-" + j + "\" class=\"trfhari-" + j + "\" style=\"width:45px;\" /></td>";
            isi += "<td><input type=\"text\" name=\"tharian[]\" id=\"tharian-" + j + "\" class=\"thari\" readonly=\"readonly\" style=\"width:140px;\" /></td>";
            isi += "<td><button id=\"rem-harian-" + j + "\" class=\"remh-" + j + "\">-</button></td></tr>";

            $("#data-body").append(isi);
            var date = new Date();
            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
            $('#rem-harian-' + j).click(function() {
                var id = $(this).attr('class').split('-')[1];
                $('#row-harian-' + id).remove();
            });

            $('#tgl-kembali-' + j).change(function() {
                var id = $(this).attr('id').split('-')[2];
                var tglpergi = $('#tgl-berangkat-' + id).val();
                var tglplg = $(this).val();
                var dayp = tglpergi.split('-')[2];
                var monthp = tglpergi.split('-')[1];
                var yearp = tglpergi.split('-')[0];

                var dayplg = tglplg.split('-')[2];
                var monthplg = tglplg.split('-')[1];
                var yearplg = tglplg.split('-')[0];

                var datepergi = new Date(yearp, monthp, dayp);
                var dateplg = new Date(yearplg, monthplg, dayplg);

                var yearDiff = dateplg.getFullYear() - datepergi.getFullYear();
                var y2 = datepergi.getFullYear();
                var y1 = dateplg.getFullYear();

                var monthDiff = (dateplg.getMonth() + y1 * 12) - (datepergi.getMonth() + y2 * 12);
                var day2 = dayplg;
                var day1 = dayp;
                var dayDiff = (day2 - day1) + (monthDiff * 30);

                $('#lama-' + id).val(dayDiff);
                return false;
            });
                
            $('#tgl-berangkat-' + j).datepicker({
                minDate: new Date(y, m, d),
                onClose: function(selectedDate) {
                    $("#tgl-kembali-' + j").datepicker("option", "minDate", selectedDate);
                }
            });
            $('#tgl-kembali-' + j).datepicker();

            $('.trfhari-' + j).change(function() {
                var id = $(this).attr('class').split('-')[1];
                var trf = $('#jharian-' + id).val().replace(/,/g, '');
                var jml = $('#persentase-' + id).val();
                var lama = $('#lama-' + id).val();
                if (trf != "" && jml != "") {
                    var total = trf * (jml / 100) * lama;
                    $('#tharian-' + id).val(FormatNumberBy3(total));
                }
            });
            j++;
            return false;
        });

        $('#calculate').click(function() {
            var total = 0;
            $('.aaa').each(function() {
                var trf2 = $(this).val();
                var trf = trf2.replace(/,/g, '');
                total += parseInt(trf);
            });
            $('#total-angkutan').val(FormatNumberBy3(total));

            var trf2 = $('#total-harian').val();
            var trf = trf2.replace(/,/g, '');
            var totalharian = parseInt(trf);

            if (totalharian != "") {
                var totalsemua = total + totalharian;
                var anggaran = $('#anggaran-sisa').html();

                var sisa_anggaran = parseInt(anggaran) - totalsemua;

                $('#total-biaya').html(" : Rp. " + FormatNumberBy3(totalsemua));
                $('#sisa-sekarang').html(" : Rp. " + FormatNumberBy3(sisa_anggaran));
            }
            return false;
        });
        $('#calculate-harian').click(function() {
            var total = 0;
            $('.thari').each(function() {
                var trf2 = $(this).val();
                var trf = trf2.replace(/,/g, '');
                total += parseInt(trf);
            });
            $('#total-harian').val(FormatNumberBy3(total));

            var totalangkutan = parseInt($('#total-angkutan').val().replace(/,/g, ''));

            if (totalangkutan != "") {
                var totalsemua = total + totalangkutan;
                var anggaran = $('#anggaran-sisa').html();

                var sisa_anggaran = parseInt(anggaran) - totalsemua;

                $('#total-biaya').html(" : Rp. " + FormatNumberBy3(totalsemua));
                $('#sisa-sekarang').html(" : Rp. " + FormatNumberBy3(sisa_anggaran));
            }
            return false;
        });

        $('.tgl').datepicker();

        $('#tgl-kembali-1').change(function() {
            var tglpergi = $('#tgl-berangkat-1').val();
            var tglplg = $(this).val();
            var dayp = tglpergi.split('-')[2];
            var monthp = tglpergi.split('-')[1];
            var yearp = tglpergi.split('-')[0];

            var dayplg = tglplg.split('-')[2];
            var monthplg = tglplg.split('-')[1];
            var yearplg = tglplg.split('-')[0];

            var datepergi = new Date(yearp, monthp, dayp);
            var dateplg = new Date(yearplg, monthplg, dayplg);

            var yearDiff = dateplg.getFullYear() - datepergi.getFullYear();
            var y2 = datepergi.getFullYear();
            var y1 = dateplg.getFullYear();

            var monthDiff = (dateplg.getMonth() + y1 * 12) - (datepergi.getMonth() + y2 * 12);
            var day2 = dayplg;
            var day1 = dayp;
            var dayDiff = (day2 - day1) + (monthDiff * 30);

            $('#lama-1').val(dayDiff);
        });
        $('.download').button();
    });

</script>

<div id="content">
    <?php
    $res = $result->row();
    $row = $data_sppd->row();
    ?>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Perlu Proses SPPD</h2>
    <form id="form-sppd" method="post" action="<?php echo base_url(); ?>index.php/sppd/approve_sppd" enctype="multipart/form-data" accept-charset="utf-8">
        <div style="text-align: right; margin-left: 570px;">
            <?php
            $this->load->helper('form');
            ?>
            <table style="text-align: left;">
                <tr><td><b>Status Dokumen</b></td><td>: Sedang Diproses</td></tr>
                <tr><td><b>Pembuat Dokumen</b></td>
                    <td>: 
                        <?php
                        echo $row->pem_fname . " " . $row->pem_lname . "/" . $row->pem_jobcode . "-" . $row->pem_id . '/' . $row->pem_orgcode;
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        ?>
        <fieldset>
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
                <input type="hidden" id="sppd_number" name="sppd_num" value="<?php echo $sppd->sppd_num; ?>" />
                <input type="hidden" id="sppd_number" name="sppd_num3" value="<?php echo $sppd->sppd_num; ?>" />
                <input type="hidden" id="emp_number" name="emp_num" value="<?php echo $res->emp_num; ?>" />
                <input type="hidden" id="job_code" name="job_code2" value="<?php echo $sppd->job_code; ?>" />

                <td><?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname . " / " . $sppd->emp_id . "/" . $sppd->job_code ?></td>
                <td><?php echo $sppd->sppd_dest; ?></td>
                <td><?php echo $sppd->sppd_depart; ?></td>                    
                <td><?php echo $sppd->sppd_arrive; ?></td>                    
                <td><?php echo $sppd->sppd_ket; ?></td>
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
                    <td colspan="4" style="text-align: left;"><?php echo $sppd->sppd_dsr; ?></td>
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
                    <td colspan="4" style="text-align: left;"><?php echo $sppd->sppd_tuj; ?></td>
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

                    <td colspan="4" style="text-align: left;"><?php echo $sppd->sppd_catt; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <?php
            if($status_pemeriksa == '0'){
                ?>
            <button style="margin-left: 20px;" id="edit-btn">Edit</button>
            <?php
            }
            ?>
            
            
        </fieldset>
        <fieldset id="dt-lampiran">
            <legend>File Lampiran</legend>
            <table style="width:650px;">
                <?php
                if (count($lampiran) > 0) {
                    foreach ($lampiran as $key => $value) {
                        ?>
                        <tr style="margin-top:5px;">
                            <td style="text-align: left;">File Lampiran : </td>
                            <td style="font-size:14px;"><i><?php echo $value; ?></i></td>
                            <td style="font-size: smaller;"><a href="<?php echo base_url(); ?>index.php/sppd/get_file/id/<?php echo $sppd->sppd_id; ?>/filename/<?php echo $value; ?>" class="download">Download</a></td>
                        </tr>


                        <?php
                    }
                } else {
                    echo "<p style=\"font-size:14px;\"><i>Tidak Ada File Lampiran</i></p>";
                }
                ?>
                <tr>
                    <td style="text-align: left;">File Lampiran :</td>
                    <td colspan="1" style="text-align: left;">
                        <input class="file-sppd" type="file" name="file-sppd[]" style="width:250px;"/>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;">File Lampiran :</td>
                    <td colspan="1" style="text-align: left;">
                        <input class="file-sppd" type="file" name="file-sppd[]" style="width:250px;"/>
                    </td>
                    <td colspan="2" style=""><button id="addfile-btn">+</button> Tambah</td>
                </tr>
            </table>
        </fieldset>

        <fieldset>
            <legend>Urutan Pemeriksa</legend>

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
//            echo form_open('sppd/save_profile');
                                    echo form_checkbox('save_check');
                                    ?>  Save Profile</p></td>
                        </tr>
                        <?php
//                    echo form_close();
                    }
                }
                ?>
            </table>

        </fieldset>
        <?php
        if ($res->job_code == 'FIA') {
            ?>
            <fieldset>
                <legend>Perincian Biaya</legend>
                <?php
                if ($rincian_angkutan->num_rows() != 0) {
                    ?>
                    <p style="display:none;" id="stat_rin">1</p>
                    <p style="font-size: smaller; margin-top:0px;"><b>Biaya Angkutan</b></p>
                    <table style="width:850px; text-align: center; font-size: smaller;">
                        <tbody id="main-angkutan-body2">
                            <tr style="background-color: black; color:white;">
                                <th rowspan="2">No.</th>
                                <th colspan="6">Angkutan</th>
                            </tr>
                            <tr style="background-color: black; color: white;">
                                <th>Angkutan</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>T.Angkutan</th>
                                <th>X</th>
                                <th>J.Trans</th>
                            </tr>
                            <?php
                            $i = 1;
                            $totalAngkutan = 0;
                            foreach ($rincian_angkutan->result() as $row) {
                                ?>
                                <tr id="row-1" style="border-bottom: 1px dotted black;">
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->transport_name; ?></td>
                                    <td><?php echo $row->from_dest; ?></td>
                                    <td><?php echo $row->to_dest; ?></td>
                                    <td>Rp. <?php echo number_format($row->transport_fee, 0, '.', '.'); ?></td>
                                    <td><?php echo $row->transport_amount; ?></td>
                                    <td>Rp. <?php echo number_format($row->transport_amount * $row->transport_fee, 0, '.', '.'); ?></td>
                                    <?php
                                    $totalAngkutan += $row->transport_amount * $row->transport_fee;
                                    ?>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td colspan="2"><b>Total Uang Angkutan : </b></td>
                                <td><b>Rp. <?php echo number_format($totalAngkutan, 0, '.', '.'); ?></b></td>

                            </tr>
                        </tbody>
                    </table>

                    <p style="font-size: smaller; margin-top:0px;"><b>Biaya Harian</b></p>

                    <table style="text-align: center; width: 850px; font-size: smaller;">
                        <tbody id="data-body2">
                            <tr style="background-color: black; color:white;">
                                <th colspan="6">Harian</th>
                            </tr>
                            <tr style="background-color: black; color:white;">
                                <th>Berangkat</th>
                                <th>Kembali</th>
                                <th>Lama (Hari)</th>
                                <th>J.Harian</th>
                                <th>%</th>
                                <th>T.Harian</th>
                            </tr>

                            <?php
                            $totalHarian = 0;
                            foreach ($rincian_harian->result() as $rowharian) {
                                ?>
                                <tr id="row-harian-1">
                                    <td><?php echo $rowharian->from_date; ?></td>
                                    <td><?php echo $rowharian->to_date; ?></td>
                                    <td><?php echo $rowharian->lama; ?></td>
                                    <td>Rp. <?php echo number_format($rowharian->day_amount, 0, '.', '.'); ?></td>
                                    <td><?php echo $rowharian->percentage; ?> % </td>
                                    <td>Rp. <?php echo number_format($rowharian->lama * $rowharian->day_amount * ($rowharian->percentage / 100), 0, '.', '.'); ?></td>

                                </tr>
                                <?php
                                $totalHarian += $rowharian->lama * $rowharian->day_amount * ($rowharian->percentage / 100);
                            }
                            ?>

                        </tbody>
                        <tbody id="opsi-body">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"><b>Total Uang Harian : </b></td>
                                <td><b>Rp. <?php echo number_format($totalHarian, 0, '.', '.'); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="font-size: small;"><b>Total Biaya SPPD : Rp. <?php echo number_format($totalAngkutan + $totalHarian, 0, '.', '.'); ?></b></p>
                    <input type="hidden" name="totalbiaya" value="<?php echo $totalAngkutan + $totalHarian; ?>" />
                    <?php
                } else {
                    ?>
                    <p style="display:none;" id="stat_rin">2</p>
                    <h4>Data Rincian Biaya belum diinput</h4>
                    <?php
                }
                ?>
                <button id="perincian-btn" style="<?php
                if ($status_pemeriksa != '0') {
                    echo "display:none;";
                }
                ?>">Input/Update Perincian Biaya</button>
            </fieldset>
            <?php
        } else {
            ?>
            <p style="display:none;" id="stat_rin">3</p>
            <?php
        }
        ?>
        <fieldset>
            <legend>Komentar</legend>
            <table id="table-karyawan-3" style="width: 800px;">
                <?php
                if ($data_komentar->num_rows() > 0) {
                    ?>

                    <tr>
                        <td style="text-align: left;">Komentar :</td>
                        <td colspan="4" id="content4" style="text-align: left;"><?php
                            foreach ($data_komentar->result() as $rowkomentar) {
                                ?>
                                <?php echo $rowkomentar->date_comment . " - " . $rowkomentar->emp_firstname . " " . $rowkomentar->emp_lastname . " - <i>" . $rowkomentar->comment . "</i><br/>"; ?>
                                <?php
                            }
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
                }
                ?>
                <tr>
                    <td style="text-align: left;">Tanggal/Komentator :</td>
                    <td colspan="4" style="text-align: left;"><?php
                        $datestring = "%d-%m-%Y";
                        $time = time();
                        echo mdate($datestring, $time) . " - ";
                        echo $res->emp_firstname . " " . $res->emp_lastname . "/" . $res->job_code . "-" . $res->id_emp . '/' . $res->org_code;
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
                    'id' => 'komentar',
                    'name' => 'komentator',
                    'size' => '74'
                );
                ?>

                <?php
                if ($status_pemeriksa == '0') {
                    ?>

                    <tr>
                        <td style="text-align: left;">Komentator Baru : </td>
                        <td colspan="4" style="text-align: left;"><?php
                            $value2 = "";
                            if ($sppd->temp_comment != "") {
                                $value2 = $sppd->temp_comment;
                            }
                            echo form_input($data, $value2);
                            ?>
                    </tr>
                    <?php
                }
                ?>


                <input type="hidden" name="approved" value="1" id="app"/>
                <input type="hidden" name="pem_id" value="<?php echo $res->emp_num; ?>"/>
            </table>
        </fieldset>
        <br/>
        
        <table id="table-karyawan-3" style="width: 800px; text-align: center;">
            <?php
            if ($status_pemeriksa == '0') {
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="width: 600px; margin-bottom: 10px;">
                        <?php
                        if ($order != "0") {
                            ?>
                            <button id="simpan-btn">Simpan</button>
                            <button id="setuju-btn">Setuju</button>
                            <button id="return-btn">Kembalikan</button>
                            <button id="reject-btn">Tolak</button>
                            <button  id="tutup-btn">Tutup</button>
                            <?php
                            ?>

                            <?php
                        } else {
                            ?>
                            <button id="simpan-btn2">Kirim</button>
                            <button  id="tutup-btn">Tutup</button>
                            <?php
                        }
                        ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
            } else {
                ?>
                <p style="text-align: center; margin-bottom: 20px;"><b>Anda Telah Memproses SPPD ini</b></p>
                <?php
            }
            ?>

        </table>
    </form>
    <form id="frm-reject" method="post" action="<?php echo base_url(); ?>index.php/sppd/reject_sppd">
        <input type="hidden" name="sppd_num" value="<?php echo $sppd->sppd_num; ?>"/>
        <input type="hidden" name="komentator" id="komentar2" value=""/>
    </form>
    <form id="frm-tolak" method="post" action="<?php echo base_url(); ?>index.php/sppd/tolak_sppd">
        <input type="hidden" name="sppd_num" value="<?php echo $sppd->sppd_num; ?>"/>
        <input type="hidden" name="emp_num" value="<?php echo $sppd->emp_num; ?>"/>
        <input type="hidden" name="pem_id" value="<?php echo $res->emp_num; ?>"/>
        <input type="hidden" name="komentator" id="komentar3" value=""/> 
    </form>
    <form id="frm-simpan" method="post" action="<?php echo base_url(); ?>index.php/sppd/simpan_sppd" enctype="multipart/form-data" accept-charset="utf-8">
            <input type="hidden" name="sppd_num" value="<?php echo $sppd->sppd_num; ?>"/>
            <input type="hidden" name="komentator" id="komentar4" value=""/> 
            <input type="hidden" name="sppd_id" id="sppd_id" value="<?php echo $sppd->sppd_id; ?>"/>
            <div id="tambah-file" style="display: none;">

            </div>
        </form>

</div>

<div id="dialog-form" title="Form Perincian Biaya">

    <form method="post" id="simpan-perincian-form" action="<?php echo base_url(); ?>index.php/sppd/simpan_perincian">
        <fieldset style="width:850px;">
            <input type="hidden" name="sppdnum" value="<?php echo $sppd->sppd_num; ?>"/>

            <?php
            $type = 0;
            if ($rincian_angkutan->num_rows() != 0) {
                $type = 1;
            }
            ?>
            <input type="hidden" name="type" value="<?php echo $type; ?>" /> 

            <legend style="font-size: smaller;"><b>SPPD Information</b></legend>
            <table style="width:600px; font-size: smaller;">
                <tr>
                    <td>SPPD ID</td>
                    <td> : <?php echo $sppd->sppd_id; ?></td>
                </tr>
                <tr>
                    <td>Pemohon SPPD</td>
                    <td> : <?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname . "/" . $sppd->job_code . "-" . $sppd->emp_id . "/" . $sppd->org_code; ?></td>
                </tr>
                <tr>
                    <td>Tujuan Perjalanan</td>
                    <td> : <?php echo $sppd->sppd_tuj; ?></td>
                </tr>
                <tr>
                    <td>Asal-Tujuan</td>
                    <td> : <?php echo $sppd->sppd_dest; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Perjalanan</td>
                    <td> : <?php echo $sppd->sppd_depart . " - " . $sppd->sppd_arrive; ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <legend style="font-size: smaller;"><b>Form Perincian Angkutan</b></legend>
            <table style="width:850px; text-align: center; font-size: smaller;">
                <tbody id="main-angkutan-body">
                    <tr style="background-color: black; color:white;">
                        <th rowspan="2">No.</th>
                        <th colspan="7">Angkutan</th>
                    </tr>
                    <tr style="background-color: black; color: white;">
                        <th>Angkutan</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>T.Angkutan</th>
                        <th>X</th>
                        <th>J.Trans</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $totalbiaya = 0;
                    $totalang = 0;
                    $totalhar = 0;
                    if ($rincian_harian->num_rows() == 0) {
                        ?>
                        <tr id="row-1" style="border-bottom: 1px dotted black;">
                            <td><input type="text" id="no-1" style="width:30px; text-align: right;" value="1" readonly="readonly"  /></td>
                            <td><input type="text" id="angkutan-1" name="angkutan[]" style="width:200px;" /></td>
                            <td><input type="text" id="asal-1" name="asal[]" style="width:100px;" /></td>
                            <td><input type="text" id="tujuan-1" name="tujuan[]" style="width:100px;" /></td>
                            <td><input type="text" id="trfangkutan-1" onkeyup="addSeparator(this)" name="trfangkutan[]" class="trfa-1" style="width:100px;" /></td>
                            <td><input type="text" id="jumlah-1" name="jml[]" class="trfa-1" style="width:40px;" /></td>
                            <td><input type="text" id="jmltrans-1" name="jmltrans[]" class="aaa" readonly="readonly" style="width:100px;" /></td>
                            <td><button id="add-btn">+</button> Tambah Row</td>
                        </tr>
                        <?php
                    } else {
                        $j = 1;
                        $counter = 1;
                        foreach ($rincian_angkutan->result() as $rowangkutan) {
                            ?>
                            <tr id="row-<?php echo $j; ?>" style="border-bottom: 1px dotted black;">
                                <td><input type="text" id="no-<?php echo $j; ?>" style="width:30px; text-align: right;" value="<?php echo $j; ?>" readonly="readonly"  /></td>
                                <td><input type="text" id="angkutan-<?php echo $j; ?>" name="angkutan[]" style="width:200px;" value="<?php echo $rowangkutan->transport_name; ?>" /></td>
                                <td><input type="text" id="asal-<?php echo $j; ?>" name="asal[]" style="width:100px;" value="<?php echo $rowangkutan->from_dest; ?>" /></td>
                                <td><input type="text" id="tujuan-<?php echo $j; ?>" name="tujuan[]" style="width:100px;" value="<?php echo $rowangkutan->to_dest; ?>"/></td>
                                <td><input type="text" id="trfangkutan-<?php echo $j; ?>" name="trfangkutan[]" onkeyup="addSeparator(this)" class="trfa-<?php echo $j; ?>" style="width:100px;" value="<?php echo $rowangkutan->transport_fee; ?>"/></td>
                                <td><input type="text" id="jumlah-<?php echo $j; ?>" name="jml[]" class="trfa-<?php echo $j; ?>" style="width:40px;" value="<?php echo $rowangkutan->transport_amount; ?>"/></td>
                                <td><input type="text" id="jmltrans-<?php echo $j; ?>" name="jmltrans[]" class="aaa" readonly="readonly" style="width:100px;" value="<?php echo $rowangkutan->transport_fee * $rowangkutan->transport_amount; ?>"/></td>
                                <?php
                                if ($counter == 1) {
                                    ?>
                                    <td><button id="add-btn">+</button> Tambah Row</td>

                                    <?php
                                } else {
                                    ?>
                                    <td><button id="remove-btn-<?php echo $j; ?>" class="rem-<?php echo $j; ?>">-</button> Hapus Row</td>

                            <script type="text/javascript">

                            </script>    
                            <?php
                        }
                        ?>
                        </tr>
                        <?php
                        $j++;
                        $counter++;
                        $totalbiaya += $rowangkutan->transport_fee * $rowangkutan->transport_amount;
                        $totalang += $rowangkutan->transport_fee * $rowangkutan->transport_amount;
                    }
                    ?>

                    <?php
                }
                ?>

                </tbody>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td colspan="2">Total Uang Angkutan : </td>
                        <td><input type="text" disabled="disabled" id="total-angkutan" style="width:100px;" value="<?php echo number_format($totalang, 0, '.', '.'); ?>" /></td>
                        <td><button id="calculate">Kalkulasi</button></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend style="font-size: smaller;"><b>Form Biaya Harian</b></legend>
            <table style="text-align: center; width: 850px; font-size: smaller;">
                <tbody id="data-body">
                    <tr style="background-color: black; color:white;">
                        <th colspan="7">Harian</th>
                    </tr>
                    <tr style="background-color: black; color:white;">
                        <th>Berangkat</th>
                        <th>Kembali</th>
                        <th>Lama</th>
                        <th>J.Harian</th>
                        <th>%</th>
                        <th>T.Harian</th>
                        <th>Opsi</th>
                    </tr>

                    <?php
                    if ($rincian_harian->num_rows() == 0) {
                        ?>
                        <tr id="row-harian-1">
                            <td><input type="text" name="tgl-berangkat[]" class="tgl" id="tgl-berangkat-1" style="width:140px;" /></td>
                            <td><input type="text" name="tgl-kembali[]" class="tgl" id="tgl-kembali-1" style="width:140px;"/></td>
                            <td><input type="text" name="lama[]" id="lama-1" readonly="readonly" style="width:40px;" /></td>
                            <td><input type="text" name="jharian[]" id="jharian-1" onkeyup="addSeparator(this)" class="trfhari-1" style="width:140px;"/></td>
                            <td><input type="text" name="persen[]" id="persentase-1" class="trfhari-1" style="width:45px;" /></td>
                            <td><input type="text" name="tharian[]" id="tharian-1" class="thari" readonly="readonly" style="width:140px;" /></td>
                            <td><button class="add-harian-btn">+</button></td>
                        </tr>
                        <?php
                    } else {
                        $i = 1;
                        $count = 1;
                        foreach ($rincian_harian->result() as $rowharian2) {
                            ?>
                            <tr id="row-harian-<?php echo $i; ?>">
                                <td><input type="text" name="tgl-berangkat[]" class="tgl" id="tgl-berangkat-<?php echo $i; ?>" style="width:140px;" value="<?php echo $rowharian2->from_date; ?>"/></td>
                                <td><input type="text" name="tgl-kembali[]" class="tgl" id="tgl-kembali-<?php echo $i; ?>" style="width:140px;" value="<?php echo $rowharian2->to_date; ?>"/></td>
                                <td><input type="text" name="lama[]" id="lama-<?php echo $i; ?>" readonly="readonly" style="width:40px;" value="<?php echo $rowharian2->lama; ?>"/></td>
                                <td><input type="text" name="jharian[]" onkeyup="addSeparator(this)" id="jharian-<?php echo $i; ?>" class="trfhari-<?php echo $i; ?>" style="width:140px;" value="<?php echo $rowharian2->day_amount; ?>"/></td>
                                <td><input type="text" name="persen[]" id="persentase-<?php echo $i; ?>" class="trfhari-<?php echo $i; ?>" style="width:45px;" value="<?php echo $rowharian2->percentage; ?>"/></td>
                                <td><input type="text" name="tharian[]" id="tharian-<?php echo $i; ?>" class="thari" readonly="readonly" style="width:140px;" value="<?php echo $rowharian2->lama * $rowharian2->day_amount * ($rowharian2->percentage / 100); ?>"/></td>
                                <?php if ($count == 1) {
                                    ?>
                                    <td><button class="add-harian-btn">+</button></td>
                                    <?php
                                    $count++;
                                } else {
                                    ?>
                                    <td><button id="rem-harian-<?php echo $i; ?>" class="remh-"<?php echo $i; ?>>-</button></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                            $i++;
                            $totalbiaya += $rowharian2->lama * $rowharian2->day_amount * ($rowharian2->percentage / 100);
                            $totalhar += $rowharian2->lama * $rowharian2->day_amount * ($rowharian2->percentage / 100);
                        }
                    }
                    ?>

                </tbody>
                <tbody id="opsi-body">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="2">Total Uang Harian : </td>
                        <td><input type="text" disabled="disabled" id="total-harian" style="width:140px;" value="<?php echo number_format($totalhar, 0, '.', '.'); ?>"/></td>
                        <td><button id="calculate-harian">Kalkulasi</button></td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset style="font-size: smaller; width: 855px;">
            <legend>Summary</legend>
            <table style="font-size:small">
                <tr>
                    <td><b>Sisa Anggaran</b></td>
                    <td><b> : Rp. <?php echo number_format($anggaran, 0, ',', ','); ?></b></td>
                <p id="anggaran-sisa" style="display:none;"><?php echo $anggaran; ?></p>
                </tr>
                <tr>
                    <td><b>Total uang/biaya perjalanan dinas</b></td>
                    <?php if ($rincian_angkutan->num_rows() != 0) {
                        ?>
                        <td id="total-biaya"> : <b>Rp. <?php echo number_format($totalbiaya, 0, '.', '.'); ?></b></td>
                        <?php
                    } else {
                        ?>
                        <td id="total-biaya"> : </td>
                        <?php
                    }
                    ?>

                </tr>
                <tr>
                    <td><b>Sisa Sekarang</b></td>
                    <?php if ($rincian_angkutan->num_rows() != 0) {
                        ?>
                        <td id="sisa-sekarang"> : <b>Rp. <?php echo number_format($anggaran - $totalbiaya, 0, '.', '.'); ?></b></td>
                        <?php
                    } else {
                        ?>
                        <td id="sisa-sekarang"></td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
        </fieldset>
    </form>    
</div>
