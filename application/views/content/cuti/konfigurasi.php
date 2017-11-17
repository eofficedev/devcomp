<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	
    table{
        width: 100%;
    }
    .ui-tabs{
        font-size: 12px;
        height: 70%;
    }
    .ui-datepicker{
        z-index: 9999999999;
    }
    .hightlight > tr:hover{
        background: #66b3ff;
    }
</style>
<div id="content2">
    <h1 class="center">Konfigurasi Cuti</h1><br>
	
<div id="tabs-form">
        <ul>
            <li><a href="#tabss-1">Jenis Cuti</a></li>
            <li><a href="#tabss-2">Hari Libur</a></li>
        </ul>
        <div id="tabss-1">
            <div class="formnya">
		<p class="center" id="jamAbsen"></p><br>
        <form method="post" id="frm" action="<?php echo site_url('cuti/config/hapus') ?>">
		<table  class="center">
			<thead>
                <tr  style="background-color: black; color:white; text-align: center;">
                    <td>No.</td>
                    <td>Jenis Cuti</td>
                    <td>Alokasi Cuti</td>
                    <td>Hari Kerja</td>
                    <td>Semua Hari</td>
                    <td>Sekaligus</td>
                    <td>Interval</td>
                </tr>
            </thead>
            <tbody class="hightlight">
                <?php 
                $i=1;
                    foreach ($cuti_config as $key) {
                        $semua = "Tidak";
                        $kerja = "Tidak";
                        if($key->hari==1)
                            $semua = "Ya";
                        else
                            $kerja="Ya";
                        if($key->sekaligus==1)
                            $sekaligus="Ya";
                        else
                            $sekaligus="Tidak";
                        echo "
                            <tr>
                                <td>".$i."<input type='checkbox' name='id[]' value='".$key->id."'></td>
                                <td><div  id='jenis-".$key->id."' onclick='showFormEdit(".$key->id.")'>".$key->jenis."</div></td>
                                <td ><div style='display:none' id='alokasi-".$key->id."' >".$key->alokasi."</div>".$key->alokasi." Hari</td>
                                <td id='kerja-".$key->id."' >".$kerja."</td>
                                <td id='semua-".$key->id."' >".$semua."</td>
                                <td id='sekaligus-".$key->id."' >".$sekaligus."</td>
                                <td  ><div style='display:none' id='interval-".$key->id."' >".$key->interval."</div>".$key->interval." Tahun</td>
                            </tr>
                        ";
                        $i++;
                    }

                ?>
                
            </tbody>
		</table>
        
        
        </form>
        <div>
            <button style="float:right" id="btn-tambahkan">Tambahkan</button>    <button style="float:right" id="btn-hapus">Hapus</button>
        </div>
	</div>
    </div>
    <div id="tabss-2">
             <div class="formnya">
        <p class="center" id="jamAbsen"></p><br>
        <form method="post" id="frm-libur" action="<?php echo site_url('cuti/config/hapus_libur') ?>">
        <table class="center">
            <thead>
                <tr  style="background-color: black; color:white; text-align: center;">
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Tanggal</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                    foreach ($libur_config as $key) {
                        $tanggal=$key->tanggal_mulai;
                        if($key->tanggal_mulai!=$key->tanggal_akhir)
                            $tanggal.=" s./.d ".$key->tanggal_akhir;
                        echo "
                            <tr>
                                <td>".$i."<input type='checkbox' name='id[]' value='".$key->id."'></td>
                                <td>".$key->nama."</td>
                                <td>".$tanggal."</td>
                            </tr>
                        ";
                        $i++;
                    }

                ?>
                
            </tbody>
        </table>
        
        
        </form>
        <div>
            <button style="float:right" id="btn-tambahkan-libur">Tambahkan</button>  <button style="float:right" id="btn-hapus-libur">Hapus</button>
        </div>
    </div>
</div>
</div>
<style type="text/css">
    .ui-dialog{
        z-index: 999;
    }
</style>
<script type="text/javascript">
function showFormEdit(id){
    $("#id_edit").val(id);
    $("#jenis_edit").val($("#jenis-"+id).html());
    $("#alokasi_edit").val($("#alokasi-"+id).html());
    if($("#kerja-"+id).html()=="Ya")        
       $("#harikerja").prop("checked",true);
    if($("#semua-"+id).html()=="Ya")        
       $("#semuahari").prop("checked",true);
    if($("#sekaligus-"+id).html()=="Ya")        
       $("#sekaligus_edit").prop("checked",true);
    $("#interval_edit").val($("#interval-"+id).html());

            $("#dialog-edit-cuti").dialog("open");
}
$(document).ready(function(){

        $("#tabs-form").tabs();
    $("#btn-hapus").on("click",function(){
        document.getElementById('frm').submit();
    });
    $("#btn-tambahkan").on("click",function(){
        $("#dialog-tambah").dialog("open");
    });
     $("#btn-hapus-libur").on("click",function(){
        document.getElementById('frm-libur').submit();
    });
    $("#btn-tambahkan-libur").on("click",function(){
        $("#dialog-tambah-libur").dialog("open");
    });
      $("#dialog-tambah").dialog({
            autoOpen: false,
            width: 500,
            height: 300,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                },
                "Submit": function() {
                    document.getElementById("form-tambah").submit();
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

      $("#dialog-tambah-libur").dialog({
            autoOpen: false,
            width: 500,
            height: 300,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                },
                "Submit": function() {
                    document.getElementById("form-tambah-libur").submit();
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");
    $("#dialog-edit-cuti").dialog({
            autoOpen: false,
            width: 500,
            height: 300,
            show: 'fadeIn',
            hide: 'fadeOut',
            modal: true,
            position: 'top',
            buttons: {
                Close: function() {
                    $(this).dialog("close");
                },
                "Submit": function() {
                    document.getElementById("form-edit-cuti").submit();
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");

         var disabledDaysRange = new Array();
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();

        var departdate = new Array();
      $("#tanggal-mulai").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
            minDate: new Date(y, m, d),
            numberOfMonths: 2,
            onSelect: function(dateText, inst) {
                var d = new Date(dateText);
                var y2 = d.getFullYear();
                var m2 = parseInt(d.getMonth()) + 1;
                var d2 = d.getDate();
             $("#tanggal-akhir").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
            minDate: new Date(y2, m2, d2),
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
            },
            onClose: function(selectedDate) {
                $("#arrive").datepicker("option", "minDate", selectedDate);
            }
        });
           $("#tanggal-akhir").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd',
            minDate: new Date(y, m, d),
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
});
</script>

<div id="dialog-tambah" title="Tambahkan"  style="z-index:99999">
    <div id="tabs">
        <?php echo form_open("cuti/config/simpan","id='form-tambah'") ?>
        <div id="tabs-1" style="font-size: smaller;">
            <table>
                <tr>
                    <td>Jenis Cuti</td>
                    <td><input type="text" name="jenis"></td>
                </tr>
                <tr>
                    <td>Alokasi Cuti 1 Tahun(Hari)</td>
                    <td><input type="number" min="1" name="alokasi"></td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="radio" value="0" name="hari"> Hari Kerja </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="radio" value="1" name="hari"> Semua Hari </td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="checkbox" value="1" name="sekaligus"> Harus di ambil sekaligus </td>
                </tr>
                <tr>
                    <td>Interval(Tahun)</td>
                    <td><input type="number" min="1" name="interval"></td>
                </tr>
            </table>
           
        </div>

        <?php echo form_close() ?>
    </div>
</div>
<div id="dialog-tambah-libur" title="Tambahkan"  style="z-index:99999">
    <div id="tabs">
        <?php echo form_open("cuti/config/simpan_libur","id='form-tambah-libur'") ?>
        <div id="tabs-1" style="font-size: smaller;">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="text" id="tanggal-mulai" name="tanggal_mulai"></td>
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td><input type="text" id="tanggal-akhir" name="tanggal_akhir"></td>
                </tr>
            </table>
           
        </div>

        <?php echo form_close() ?>
    </div>
</div>
<div id="dialog-edit-cuti" title="Tambahkan"  style="z-index:99999">
    <div id="tabs">
        <?php echo form_open("cuti/config/edit_simpan","id='form-edit-cuti'") ?>
        <div id="tabs-1" style="font-size: smaller;">
            <input type="hidden" style="display:none" name="id" id="id_edit"> 
            <table>
                <tr>
                    <td>Jenis Cuti</td>
                    <td><input type="text" id="jenis_edit" name="jenis"></td>
                </tr>
                <tr>
                    <td>Alokasi Cuti 1 Tahun(Hari)</td>
                    <td><input type="number" min="1" name="alokasi" id="alokasi_edit"></td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="radio" value="0" id="harikerja" name="hari"> Hari Kerja </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="radio" value="1" id="semuahari" name="hari"> Semua Hari </td>
                </tr>
                <tr>
                    <td colspan="2"><br><input type="checkbox" id="sekaligus_edit" value="1" name="sekaligus"> Harus di ambil sekaligus </td>
                </tr>
                <tr>
                    <td>Interval(Tahun)</td>
                    <td><input type="number" min="1" name="interval" id="interval_edit"></td>
                </tr>
            </table>
           
        </div>

        <?php echo form_close() ?>
    </div>
</div>