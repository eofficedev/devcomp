<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Selamat Datang di Sistem E-Office</h2>
    <div id="content-left" style="padding-left:20px;">
        <div class="content-left-data" id="top-left-content">
            <div class="content-left-img">
                <img width="100" style="margin-left: 20px; margin-top: 20px;" height="100" src="<?php echo base_url();?>css/employee.jpg"/>
            </div>
            <div class="content-left-2">
                <p><b>Pegawai :</b></p>
                <a href="<?php echo base_url(); ?>index.php/emp/add_emp">Tambah Pegawai Baru</a><br/>
                <a href="<?php echo base_url(); ?>index.php/emp">Lihat &amp; Edit Pegawai</a><br/>
                
            </div>
        </div>
        <div class="content-left-data">
            <div class="content-left-img">
                <img width="90" style="margin-left: 25px; margin-top: 20px;" height="90" src="<?php echo base_url();?>css/suitcase.png"/>
            </div>
            <div class="content-left-2" id="content-left-2">
                <p><b>Jabatan :</b></p>
                <a href="<?php echo base_url(); ?>index.php/jobs/form_job">Tambah Jabatan Baru</a><br/>
                <a href="<?php echo base_url(); ?>index.php/jobs">Lihat &amp; Edit Jabatan</a><br/>
            </div>
        </div>
        <div class="content-left-data">
            <div class="content-left-img">
                <img width="100" style="margin-left: 25px; margin-top: 20px;" height="100" src="<?php echo base_url();?>css/organization.jpg"/>
            </div>
            <div class="content-left-2">
                <p><b>Organisasi : </b></p>
                <a href="<?php echo base_url(); ?>index.php/org/add_org">Tambah Organisasi Baru</a><br/>
                <a href="<?php echo base_url(); ?>index.php/org">Lihat & Edit Organisasi</a><br/>
            </div>
        </div>
        <div class="content-left-data">
            <div class="content-left-img">
                <img width="100" style="margin-left: 20px; margin-top: 20px;" height="100" src="<?php echo base_url();?>css/nodin.png"/>
            </div>
            <div class="content-left-2">
                <p><b>Konfigurasi :</b></p>
                    <a href="<?php echo base_url(); ?>index.php/admin">Konfigurasi Admin</a><br/>
                <a href="<?php echo base_url(); ?>index.php/sppd_config">Konfigurasi Flow SPPD</a><br/>
                <a href="<?php echo base_url(); ?>index.php/notadinas/config/">Konfigurasi Nota Dinas</a><br/>
                <a href="#">Konfigurasi Flow Aplikasi Cuti</a><br/>
            </div>
        </div>
    </div>
    <div id="content-right">
        <div id="content-right-data">
            <p><b>Akun Anda :</b></p>
             <img width="80" style="margin-left: 105px; margin-top: 20px;" height="80" src="<?php echo base_url();?>css/unknown-prof-pic.png"/>
             <table style="margin-left: 50px; margin-top: 40px;">
                 <?php $row = $result->row(); ?>
                 
                 <tr>
                     <td>Nama</td>
                     <td> : <?php echo $row->emp_firstname." ".$row->emp_lastname; ?></td>
                 </tr>
                 <tr>
                     <td>Tipe Akun</td>
                     <td> : Administrator</td>
                 </tr>
                 
                 <br/>
                 <tr>
                     <td>&nbsp;</td>
                     <td></td>
                 </tr>
             </table>
        </div>
    </div>
</div>