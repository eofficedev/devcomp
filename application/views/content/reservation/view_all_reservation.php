<script type="text/javascript">
    $('document').ready(function() {
        $("#dialog-form").dialog({
            autoOpen: false,
            width: 650,
            hide: 'fadeOut',
            show: 'fadeIn',
            modal: true,
            position: 'top',
            buttons: {
                "Close": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

        $('.desc-button').click(function() {
            var id = $(this).attr('id');
            $('#dialog-form').dialog('open');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/reservation/load_request",
                data: "req_id=" + id,
                success: function(data) {
                    var flight = data.split('!@#')[0];
                    var time = data.split('!@#')[1];
                    var hotel = data.split('!@#')[2];
                    var sppdid = '<b>' + data.split('!@#')[3] + '</b>';
                    var tuj = '<b>' + data.split('!@#')[4] + '</b>';
                    var fname = '<b>' + data.split('!@#')[5] + '</b>';
                    var lname = '<b>' + data.split('!@#')[6] + '</b>';
                    var email = '<b>' + data.split('!@#')[7] + '</b>';
                    var telp = '<b>' + data.split('!@#')[8] + '</b>';


                    $('#flight-desc').html(flight);
                    $('#time-desc').html(time);
                    $("#hotel-desc").html(hotel);
                    $('#sppd_id').html(sppdid);
                    $('#sppd_tuj').html(tuj);
                    $('#sppd_pemohon').html(fname + " " + lname);
                    $('#no-kontak').html(telp);
                    $('#email').html(email);

                }
            });
        });

        $('.proses-btn').click(function() {
            var id = $(this).attr('id').split('-')[1];
            window.location = '<?php echo base_url(); ?>index.php/reservation/reservation_view/id/' + id;
        });
    });


</script>

<style>
    .ui-dialog {
        z-index: 9999;
    }
</style>

<div id="dialog-form" title="Lihat Deskripsi    ">
    <fieldset>
        <legend>SPPD Description</legend>
        <table style="font-size: smaller;">
            <tr>
                <td><b>ID SPPD : </b></td>
                <td id="sppd_id"></td>
            </tr>
            <tr>
                <td><b>Tujuan : </b></td>
                <td id="sppd_tuj"></td>
            </tr>
            <tr>
                <td><b>Pemohon : </b></td>
                <td id="sppd_pemohon"></td>
            </tr>
            <tr>
                <td><b>No Kontak : </b></td>
                <td id="no-kontak"></td>
            </tr>
            <tr>
                <td><b>Email : </b></td>
                <td id="email"></td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Deskripsi Request Airline</legend>
        <p id="flight-desc" style="font-size: smaller;"></p>
    </fieldset>
    <fieldset>
        <legend>Deskripsi Request Waktu keberangkatan</legend>
        <p id="time-desc" style="font-size: smaller;"></p>
    </fieldset>
    <fieldset>
        <legend>Deskripsi Request Hotel</legend>
        <p id="hotel-desc" style="font-size: smaller;"></p>
    </fieldset>
</div>


<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">List Permintaan Reservasi</h2>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"/>
    <div id="content-sppd-left" style='border-top: 1px dotted black;'>
        <div id="sppd-right-title" style="">
            <form method="post" action="<?php echo base_url(); ?>index.php/reservation/view_all_reservation">
            <p style="margin-left: 20px; margin-top: 10px;"><b>Cari Berdasarkan nama pegawai</b></p>
            <table>
                <tr>
                    <td><input style='margin-left: 20px;' type='text' name='keyword' value="<?php echo $this->input->post('keyword'); ?>"/></td>
                </tr>
                <tr>
                    <td><button style='margin-left: 20px;' id='search-btn'>Search</button></td>
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
            <p style="margin-left: 20px; margin-top: 10px;"><b>List Seluruh Permintaan : </b></p>
        </div>
        <div id="sppd-right-filter">
            <div id='filter-left'>
                <p style='font-size: smaller; margin-left: 20px; margin-bottom: 3px; margin-top: 3px;'><i>Filter By : <?php echo $this->input->post('keyword'); ?></i></p>
            </div>
            <div id='filter-right' style="background-color: black; color:white;">
                <p style='margin-top: 3px; margin-left: 40px;'>Page : <?php echo $this->pagination->create_links(); ?></p>
            </div>

        </div>
        <table style="width:760px; margin-left: 20px; margin-top: 10px;">
            <thead style="background-color: black; color: white;">
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>Tanggal Berangkat</th>
                <th>Tanggal Kembali</th>
                <th>Deskripsi Perjalanan</th>
                <th>Status</th>
                <th>Opsi</th>
            </thead>
            <?php
            if ($reservation->num_rows() > 0) {
                $i = 1;
                foreach ($reservation->result() as $row) {
                    ?>
                    <tr style="text-align: center; font-size: 14px;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row->emp_firstname . " " . $row->emp_lastname; ?></td>
                        <td><?php echo $row->emp_id; ?></td>
                        <td><?php echo $row->job_name; ?></td>
                        <td><?php echo $row->sppd_depart; ?></td>
                        <td><?php echo $row->sppd_arrive; ?></td>
                        <td><button id="<?php echo $row->req_id; ?>" class="desc-button" style="font-size: smaller;">Lihat Deskripsi</button></td>
                        <td><?php
                            if ($row->status == 1) {
                                echo 'Belum Di Proses';
                            } else {
                                echo 'Sudah Di proses';
                            }
                            ?></td>
                        <td><button class="proses-btn" id="req-<?php echo $row->req_id; ?>">Proses</button></td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            else {
                ?>
                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="8"><b>Tidak Ada Request Reservasi</b></td>
                    </tr>
                    <?php
            }
            ?>

        </table>



    </div>
</div>