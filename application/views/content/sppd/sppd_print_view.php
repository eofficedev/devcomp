<html>
    <head>
        <title>Print SPPD</title>
        <style type="text/css">
            @page Section1 {
                size:a4; 
                margin:.5in .5in .5in .5in; 
                mso-header-margin:.5in; 
                mso-footer-margin:.5in; 
            }

            @media print {
                #all-content
                {
                    page-break-after:always;
                }
            }


            body {
                font-family: arial;
                font-size: 14px;
            }
            #top-header {
                text-align: center;
                border-bottom: 1px solid black;
                font-size: 16px;
            }
            #all-content, #all-content2{
                border:1px solid black;
                margin: auto;
                width:800px;
                min-height: 800px;
                margin-bottom: 40px;
            }

            #nomor-sppd {
                text-align: center;
                width:800px;
                height: 50px;
                margin-top:20px;
            }

            #main-content {
                width:800px;
                padding-left: 15px;
            }

            #keterangan {
                width:800px;
                padding-left: 15px;
                margin-top:40px;
            }

            #paraf, #paraf2 {
                width: 800px;
                min-height: 200px;
                margin-top:10px;
            }

            #paraf2 {
                padding-top:25px;
            }
            #paraf-left, #paraf-right {
                width:380px;
                min-height: 200px;
                float:left;
                padding-left: 20px;
            }

            #content-left {
                float:left;
                width:500px;
                height:150px;
            }
            #content-right {
                float:left;
                width:300px;
                height:150px;
            }
        </style>

    </head>

    <body onload="">
        <?php
        $sppd = $detail_sppd->row();
        $totalHarian2 = 0;
        $pemdata = $pemeriksa->result();
        
        foreach ($rincian_harian->result() as $rowharian) {
            $totalHarian2 += $rowharian->lama * $rowharian->day_amount * ($rowharian->percentage / 100);
        }

        $totalAngkutan2 = 0;
        foreach ($rincian_angkutan->result() as $row) {
            $totalAngkutan2 += $row->transport_amount * $row->transport_fee;
        }

        $totalsemua = $totalHarian2 + $totalAngkutan2;
        $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober', 'November','Desember');
 
        $month = $array_bulan[date('n')];

        $day = date("j");
        $year = date("Y");
        
        $today = $day." ".$month." ".$year;
        ?>
        <div class="Section1" id="all-content">
            <div id="top-header">
                <b>PERMOHONAN PENERBITAN SURAT PERINTAH PERJALANAN DINAS / <br/> SURAT PERJALANAN DINAS</b>
            </div>
            <div id="nomor-sppd">
                NOMOR : <?php echo $sppd->sppd_id; ?>/<?php echo $sppd->org_code; ?>-<?php echo $sppd->emp_id; ?>/<?php echo $year; ?>
            </div>
            <div id="main-content">
                <p>Kepada : Mgr. Keuangan</p>
                <p>Harap bantuan Saudara untuk menerbitkan Surat Perintah Perjalanan Dinas/Surat Perjalanan Dinas atas nama :</p>

                <table style="font-size: smaller; width: 650px; min-height: 200px; margin-left: 50px; text-align: center;" border="2">
                    <tr>
                        <th rowspan="2">NO</th>
                        <th rowspan="2">NAMA/NIK/JABATAN</th>
                        <th rowspan="2"></th>
                        <th rowspan="2">LOKASI/TEMPAT</th>
                        <th colspan="2">TANGGAL</th>
                        <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
                        <th>BERANGKAT</th>
                        <th>KEMBALI</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td><?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname; ?> / <?php echo $sppd->emp_id; ?>/ <?php echo $sppd->org_code; ?></td>
                        <td>:</td>
                        <td><?php echo $sppd->sppd_dest; ?></td>
                        <td><?php echo $sppd->sppd_depart; ?></td>
                        <td><?php echo $sppd->sppd_arrive; ?></td>
                        <td><?php echo $sppd->sppd_ket; ?></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Dasar Perjalanan Dinas</td>
                        <td>:</td>
                        <td colspan="4"><?php echo $sppd->sppd_dsr; ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Maksud/ Tujuan/ Tugas Perjalanan Dinas</td>
                        <td>:</td>
                        <td colspan="4"><?php echo $sppd->sppd_tuj; ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Catatan</td>
                        <td>:</td>
                        <td colspan="4"><?php echo $sppd->sppd_catt; ?></td>
                    </tr>
                </table>
            </div>
            <div id="keterangan" style="font-size:14px;">
                <p><b>Catatan : </b></p>
                <p><b>Anggaran Tahun</b></p>
                <table style="font-size: 14px;">
                    <tr>
                        <td>Sisa Anggaran : </td>
                        <td>Rp. <?php echo number_format($anggaran + $totalsemua, 0, '.', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Untuk SPPD Ini :</td>
                        <td>Rp.<?php echo number_format($totalsemua, 0, '.', '.'); ?>,-</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sisa Sekarang :</td>
                        <td>Rp.<?php echo number_format($anggaran, 0, '.', '.'); ?>,-</td>
                    </tr>
                </table>
            </div>
            <div id="paraf">
                
                <div id="content-left"></div>
                <div id="content-right"><p>Bandung, <?php echo $today; ?></p>
                    <br/>
                    <b><?php echo $pemdata[0]->job_name; ?></b>
                    <br/><br/><br/><br/><br/><br/>
                    <b style="text-decoration: underline;"><?php echo $pemdata[0]->emp_firstname . " " . $pemdata[0]->emp_lastname; ?></b> <br/><br/>
                    NIK:<?php echo $pemdata[0]->emp_id; ?>
                </div>

            </div>
            <div id="notice" style="text-align: center; margin-top: 80px; margin-bottom: 50px;font-size: smaller;">
                <p>SEGALA SESUATU YANG TERCANTUM DALAM APLIKASI SPPD ONLINE</p>
                <p>DICETAK SECARA OTOMATIS OLEH SISTEM KOMPUTER <?php echo strtoupper($org_name); ?>, CAP / STEMPEL TIDAK DIPERLUKAN</p>
            </div>

        </div>

        <div class="Section2" id="all-content">
            <div id="top-header" style="padding-top:10px;">
                <b style="font-size: larger;">BIAYA PERJALANAN DINAS</b>
                <p style="font-size: smaller;">NOMOR : <?php echo $sppd->sppd_id; ?>/<?php echo $sppd->org_code; ?>-<?php echo $sppd->emp_id; ?>/2013</p>
                <p style="font-size: smaller;">Tanggal : <?php echo $today; ?></p>
            </div>
            <div id="main-content" style="padding-top:20px;">
                <p>Harap dibayar uang sebesar Rp.<?php echo number_format($totalsemua, 0, '.', '.'); ?>,-</p>
                <p>Kepada : </p>
                <table>
                    <tr>
                        <td>1.</td>
                        <td>a.</td>
                        <td>NAMA / NIK</td>
                        <td>:</td>
                        <td><?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname; ?> / <?php echo $sppd->emp_id; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>b.</td>
                        <td>JABATAN</td>
                        <td>:</td>
                        <td><?php echo $sppd->job_name; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td colspan="4">Untuk Biaya Perjalanan Dinas dengan rincian sebagai berikut :</td>
                    </tr>
                </table>
                <br/>
                <p style="font-size: smaller; margin-top:0px;"><b>Biaya Angkutan</b></p>
                <table style="width:750px; text-align: center; font-size: smaller;">
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

                <table style="text-align: center; width: 750px; font-size: smaller;">
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
            </div>

            <style>

            </style>
            <div id="paraf2" style="padding-left:20px;">
                <div id="paraf-left">
                    Bandung, <?php echo $today; ?> <br/>
                    Fiatur<br/><br/><br/><br/><br/><br/><br/>
                    <b>
                        <?php
                        $total = $pemeriksa->num_rows();
                        $total--;
                        echo $pemdata[$total]->emp_firstname . " " . $pemdata[$total]->emp_lastname;
                        ?></b>
                    <br/><br/>
                    NIK : <?php echo $pemdata[$total]->emp_id; ?>

                </div>
                <div id="paraf-right">
                    Bandung, <?php echo $today; ?> <br/>
                    Telah terima uang sebesar <br/>
                    Rp..<?php echo number_format($totalsemua, 0, '.', '.'); ?>,-<br/><br/><br/><br/><br/><br/>
                    <b><?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname; ?></b><br/><br/> NIK : <?php echo $sppd->emp_id; ?>
                </div>

            </div>
            <div style="padding-left:20px; border-top:1px dotted black; height: 120px; border-bottom: 1px dotted black;">
                <p><b>Catatan : </b></p>
            </div>
            <div style="width:800px; height: 100px; line-height: 30px;">
                <div id="left-data" style="height: 150px; width:400px; float:left; padding-left:10px; padding-top: 5px;">
                    KODE RECORD : ... <br/>
                    NOMOR URUT MODEL INPUT : ... <br/>
                    NOMOR URUT BUKTI PEMBUKUAN : ... <br/>
                </div>
                <div id="right-data" style="height: 150px; width:350px; float:left; padding-left:10px; padding-top: 5px; float:left; ">
                    KODE MATA UANG (RP,US$) : ... <br/>
                    KODE LOKASI COST CENTER : ... <br/>
                    DEBET NOMOR PERKIRAAN : ... <br/>
                    KREDIT NOMOR PERKIRAAN : ... <br/>
                </div>
            </div>
            <br/>
            <div id="notice" style="text-align: center; margin-top: 80px; margin-bottom: 50px;font-size: smaller;">
                <p>SEGALA SESUATU YANG TERCANTUM DALAM APLIKASI SPPD ONLINE</p>
                <p>DICETAK SECARA OTOMATIS OLEH SISTEM KOMPUTER <?php echo strtoupper($org_name); ?>, CAP / STEMPEL TIDAK DIPERLUKAN</p>
            </div>

        </div>

        <div class="Section3" id="all-content2">
            <div id="top-header" style="padding-top:10px;">
                <b style="font-size: larger;"><?php echo strtoupper($org_name); ?></b>
                <p style="font-size: smaller;"><b>SURAT PERINTAH PERJALANAN DINAS</b></p>
                <p style="font-size: smaller;">NOMOR : <?php echo $sppd->sppd_id; ?>/<?php echo $sppd->org_code; ?>-<?php echo $sppd->emp_id; ?>/2013</p>
            </div>
            <br/>
            <fieldset>
                <table style="width:750px; font-size: 14px; line-height: 30px;">
                    <tbody style="border:1px solid black;">
                        <tr>
                            <td><b>1.</b></td>
                            <td><b>a. Nama /NIK</b></td>
                            <td> : <?php echo $sppd->emp_firstname . " " . $sppd->emp_lastname; ?> / <?php echo $sppd->emp_id; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>b. Jabatan</b></td>
                            <td> : <?php echo $sppd->job_name; ?></td>
                        </tr>
                    </tbody>

                    <tbody style="border:1px solid black;">
                        <tr>
                            <td><b>2.</b></td>
                            <td><b>Maksud / Tugas Perjalanan Dinas</b></td>
                            <td> : <?php echo $sppd->sppd_tuj; ?></td>
                        </tr>
                        <tr>
                            <td><b>3.</b></td>
                            <td><b>a.Lokasi/Tempat yang dituju</b></td>
                            <td> : <?php echo $sppd->sppd_dest; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>c. Berangkat/Kembali</b></td>
                            <td> : Tanggal <?php echo $sppd->sppd_depart; ?> / Tanggal <?php echo $sppd->sppd_arrive; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>d. Keterangan</b></td>
                            <td> : <?php echo $sppd->sppd_ket; ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <fieldset>
                <div id="left-catt" style="float:left; width:500px; height: 250px;">
                    <p><b>Catatan</b></p>

                </div>
                <div id="right-catt" style="float:left; width:200px; height:250px; text-align: center;">
                    <p style="margin-top:20px;">Bandung, <?php echo $today; ?></p>
                    <p style="margin-top:20px;">Yang Memberi perintah</p>
                    <p><b><?php $t = $total - 1;
                        echo $pemdata[$t]->job_name; ?></b></p>
                    <br/><br/><br/>
                    <p><b style="text-decoration: underline;"><?php echo $pemdata[$t]->emp_firstname . " " . $pemdata[$t]->emp_lastname; ?></b></p>
                    <p>NIK : <?php echo $pemdata[$t]->emp_id; ?></p>
                </div>
            </fieldset>
            <fieldset>
                <table style="font-size:14px;">
                    <tr>
                        <td>Tujuan Kota Keberangkatan</td>
                        <td> : <?php echo $sppd->sppd_dest; ?></td>
                    </tr>
                    <tr>
                        <td>Pada Tanggal</td>
                        <td> : <?php echo $sppd->sppd_depart; ?></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <div id="left-ket" style="float:left; height: 150px; width:380px; border-right: 1px dotted black;">
                    <table style="font-size:14px; padding-left:5px;">
                        <tr>
                            <td>Tiba di</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Mengetahui</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIK : ....................................</td>
                        </tr>
                    </table>
                </div>
                <div id="right-ket" style="float:left; height: 150px; width:380px;">
                    <table style="font-size:14px; padding-left:5px;">
                        <tr>
                            <td>Tiba di</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Mengetahui</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIK : ....................................</td>
                        </tr>
                    </table>
                </div>
            </fieldset>
            <fieldset>
                <div id="left-ket" style="float:left; height: 150px; width:380px; border-right: 1px dotted black;">
                    <table style="font-size:14px; padding-left:5px;">
                        <tr>
                            <td>Tiba di</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Mengetahui</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIK : ....................................</td>
                        </tr>
                    </table>
                </div>
                <div id="right-ket" style="float:left; height: 150px; width:380px;">
                    <table style="font-size:14px; padding-left: 5px;">
                        <tr>
                            <td>Tiba di</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td>Pada tanggal</td>
                            <td> : .............................</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Mengetahui</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp; </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>_______________________</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIK : ....................................</td>
                        </tr>
                    </table>
                </div>
            </fieldset>
            <br/>
            <div id="notice" style="text-align: center; margin-top: 30px; margin-bottom: 40px;font-size: smaller;">
                <p>SEGALA SESUATU YANG TERCANTUM DALAM APLIKASI SPPD ONLINE</p>
                <p>DICETAK SECARA OTOMATIS OLEH SISTEM KOMPUTER <?php echo strtoupper($org_name); ?>, CAP / STEMPEL TIDAK DIPERLUKAN</p>
            </div>
        </div>
    </body>
</html>
