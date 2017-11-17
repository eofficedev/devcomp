<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/cssmenu/style.css"/>
<div id="side-menu" style='margin-bottom: 0px;'>
    <ul id="css3menu1" class="topmenu">
        <?php
        $dat = $result->row();
        if ($dat->emp_role == 1) {
            ?>
            <li class="topfirst"><a href="<?php echo base_url() ?>index.php/site/admin_index" style="height:15px;line-height:15px;">Home</a></li>
            <li class="topmenu"><a href="<?php echo base_url() ?>index.php/site/admin_dashboard" style="height:15px;line-height:15px;">Dashboard</a></li>
            <li class="topmenu"><a href="<?php echo base_url() ?>index.php/site/admin_anggaran" style="height:15px;line-height:15px;">Anggaran</a></li>
            <li class="topmenu"><a href="#" style="height:15px;line-height:15px;"><span>Organisasi</span></a>
                <ul>
                    <li class="subfirst"><a href="<?php echo base_url() ?>index.php/org">Lihat List Organisasi</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/org/add_org">Tambah Organisasi Baru</a></li>
                </ul>
            </li>
            <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">Jabatan</a>
                <ul>
                    <li class="subfirst"><a href="<?php echo base_url() ?>index.php/jobs">Manage jabatan</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/jobs/form_job">Tambah jabatan baru</a></li>
                </ul>
            </li>
            <li class="toplast"><a href="#" style="height:15px;line-height:15px;">Pegawai</a>
                <ul>
                    <li class="subfirst"><a href="<?php echo base_url() ?>index.php/emp">Lihat List Pegawai</a></li>
                    <li><a href="<?php echo base_url() ?>index.php/emp/add_emp">Tambah Pegawai Baru</a></li>
                </ul>
            </li>
            <?php
        }
        ?>
        <?php
        if ($dat->emp_role == 1) {
            ?>
            <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">Konfigurasi</a>
                <ul>
                    <li class="subfirst"><a href="<?php echo base_url() ?>index.php/sppd_config">Konfigurasi Flow SPPD</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/notadinas/config">Konfigurasi Nomor Nota Dinas</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin">Konfigurasi Admin</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/absensi/config/">Konfigurasi Absensi</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cuti/config/">Konfigurasi Aplikasi Cuti</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/email/config/">Konfigurasi Web Mail</a></li>
                    <li><a href="#">Konfigurasi Flow Aplikasi Cuti</a></li>
<!--                    <li><a href="<?php echo base_url(); ?>index.php/jobs">Konfigurasi Anggaran</a></li>-->
                </ul>
            </li>
            <li class="topmenu"><a href="<?php echo base_url(); ?>index.php/utilities/change_password_view" style="height:15px;line-height:15px;">Ganti Password</a></li>
            <?php
        } else {
            if ($dat->emp_role == 3) {
                ?>
                <li class="topmenu"><a href="<?php echo base_url() ?>index.php/site/home_reservation" style="height:15px;line-height:15px;">Home</a></li>
                <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">Request Reservasi</a>
                    <ul>
                        <li class="subfirst"><a href="<?php echo base_url(); ?>index.php/reservation/view_all_reservation">Lihat Semua Request Perlu Diproses</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/reservation/finish_reservation">Lihat Semua Reservasi Selesai Diproses</a></li>
                    </ul>
                </li>
                <li class="topmenu"><a href="<?php echo base_url(); ?>index.php/utilities/change_password_view">Ganti Password</a></li>
                <?php
            } else {
                ?>
                <li class="topfirst"><a href="<?php echo base_url() ?>index.php/site" style="height:15px;line-height:15px;">Home</a></li>


                    <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">SPPD</a>
                        <ul>
                            <li class="subfirst"><a href="<?php echo base_url() ?>index.php/sppd/new_sppd">Create New SPPD</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/sppd/draft_sppd">SPPD Draft</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/sppd/proses_sppd">SPPD Sedang Diproses</a></li>
                            <li><a href="<?php echo base_url() ?>index.php/sppd/perlu_proses_sppd">SPPD Perlu Diproses</a></li>

                            <li><a href="<?php echo base_url() ?>index.php/sppd/telah_proses_sppd">SPPD Telah Diproses</a></li></ul></li>

                    
                <li class="topmenu"><a href="<?php echo base_url() ?>index.php/notadinas/index/" style="height:15px;line-height:15px;">Nota Dinas</a></li>

                <li class="topmenu">
                    <a href="<?php echo site_url('cuti/home') ?>" style="height:15px;line-height:15px;">Cuti</a>
                    <ul>
                        <li>
                            <a href="<?php echo site_url('cuti/home/mohon') ?>">Ajukan Permohonan Cuti</a>
                        </li>
                    </ul>
                </li>
                <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">Absensi</a>
                    <ul>
                        <li><a href="<?php echo site_url('absensi/home') ?>" >Absen</a></li>
                        <?php if($dat->job_code=="KPL"){ ?>
                        <li><a href="<?php echo site_url('absensi/home/cekabsen/ALL/'.date('Y-m-d')) ?>" >Cek Absensi</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">View Gaji</a></li>
                <li class="topmenu"><a href="<?php echo site_url('email/home/index') ?>" id="email" style="height:15px;line-height:15px;">Email</a></li>
                <li class="topmenu"><a href="#" style="height:15px;line-height:15px;">Utilitas</a>
                    <ul>
                        <li class="subfirst"><a href="<?php echo base_url() ?>index.php/utilities/edit_profile_view">Edit Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/utilities/change_password_view">Ganti Password</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </li>
                <?php
            }
        }
        ?>
        <li class="toplast"><a href="<?php echo base_url() ?>index.php/login/signout" style="height:15px;line-height:15px;">Log Out</a></li>
    </ul>
</div>