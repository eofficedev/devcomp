<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	.formnya{
		width: 500px;
		height: 430px;
		margin: 0 auto;

	}
    table{
        width: 100%;
    }
</style>
<div id="content" class="enable-bootstrap">

    <h1 class="center">Data Absensi</h1><br>
    <input type="text" id="txtcari" placeholder="pencarian"><input type="text" id="detpiker" value="<?php echo date('Y-m-d') ?>"><button onclick="cari()" class="btn btn-default" id="cari">Cari</button>
	<table class="table" id="list-emp-table">
        <thead>
            <tr style="background-color: black; color:white; text-align: center;">
                <td>Tanggal</td>
                <td>Jam</td>
                <td>Nama Karyawan</td>
                <td>Jabatan</td>
                <td>Status absen</td>
                <td>Keterangan</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($data_absen as $key){
                echo"
                    <tr>
                        <td>".date("Y-m-d",strtotime($key->waktu))."</td>
                        <td>".date("H:i:s",strtotime($key->waktu))."</td>
                        <td>".$key->emp_firstname." ".$key->emp_lastname."</td>
                        <td>".$key->job_name."</td>
                        <td>".$key->status."</td>
                        <td>".$key->keterangan."</td>
                        <td><a href='#'>Tegur</a></td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    </table>
    <?php 
        if((int)$paging!=1)
            echo $paging;
     ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#detpiker").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
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

});
function cari(){
    var pencarian = $("#txtcari").val();
    var tanggal = $("#detpiker").val();
    if(pencarian=="")
        pencarian="ALL";
    var url = "<?php echo site_url('absensi/home/cekabsen/') ?>/"+pencarian+"/"+tanggal;
    window.location = url;
};
</script>