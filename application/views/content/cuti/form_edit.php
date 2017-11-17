<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	
    table{
    }
    .ui-tabs{
        font-size: 10px;
        height: 70%;
    }
    .ui-datepicker{
        z-index: 9999999999;
    }
    td{
        padding-top: 10px;
    }
</style>
<script type="text/javascript" src="<?php echo base_url('public/js') ?>/jquery.validate.min.js"></script>
<div id="content" style="height:auto;min-height:500px;overflow-y:scroll" >
    <?php if(isset($errornya))
        echo $errornya;
        else{ ?>
    <h1 class="center">Permohonan Cuti</h1><br>
    <?php echo form_open_multipart("cuti/home/input/".$cutinya->id) ?>
    <div class="center">Jenis Cuti : 
        <select required name="jenis_id" id="jenis_cuti">
            <option value="">Pilih Jenis Cuti</option>
            <?php 
                foreach ($cuti_config as $key) {
                    $sel = "";
                    if($key->id == $cutinya->jenis_id)
                        $sel="selected";
                    echo "<option ".$sel." value='".$key->id."'>[".$key->kode."]&nbsp;".$key->jenis."</option>";
                }
            ?>
        </select>

    </div>
        <br>
        <div style="width:100%;height:400px;">
            <div style="float:left;width:48%">
                <table>
                    <tr>
                        <td>Nama/NIK</td>
                        <td>:</td>
                        <td><?php echo $user_aktif->emp_firstname." ".$user_aktif->emp_lastname." / ".$user_aktif->emp_id ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $user_aktif->job_name ?></td>
                    </tr>
                    <tr>
                        <td>Unit Kerja</td>
                        <td>:</td>
                        <td><?php echo $user_aktif->org_name ?></td>
                    </tr>
                    <tr>
                        <td>Mulai Cuti</td>
                        <td>:</td>
                        <td><input type="text" required name="mulai" id="tglMulai" value="<?php echo $cutinya->mulai ?>"></td>
                    </tr>
                    <tr>
                        <td>Selesai Cuti</td>
                        <td>:</td>
                        <td><input type="text" required name="selesai" id="tglSelesai" value="<?php echo $cutinya->selesai ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat Selama Cuti</td>
                        <td>:</td>
                        <td><textarea required name="alamat"><?php echo $cutinya->alamat ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><input type="text" required name="telp"  value="<?php echo $cutinya->telpon ?>"></td>
                    </tr>
                    <tr>
                        <td>Alasan Tuti</td>
                        <td>:</td>
                        <td><textarea required name="alasans"><?php echo $cutinya->alasan ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td id="lampir">
                            <?php  foreach ($lampirannya as $key ) {
                                echo "<div id='lampiran-".$key->id."'><a href='".base_url("upload/cuti")."/".$key->link."'>".$key->name."</a> <a  onclick='hapusLampiran(".$key->id.")'>Hapus</a></div>";
                            }
                            ?>
                            <input id="jml-0" type="file" name="lampiran[]">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a  onclick='tambahLampiran()'>Tambah</a></td>
                    </tr>
                    <tr>
                        <td>Komentar</td>
                        <td>:</td>
                        <td><textarea required name="komentar"><?php echo $komennya->komentar ?></textarea></td>
                    </tr>

                </table>
            </div>
            <div style="float:left;width:40%">
                <table>
                    <tr>
                        <td>Sisa Cuti</td>
                        <td>:</td>
                        <td id="sisanya"></td>
                    </tr>
                    <tr>
                        <td colspan="3">Pemeriksa :</td>
                    </tr>
                    <tr>
                        <td>Atasan</td>
                        <td>:</td>
                        <td><input type="hidden" style="display:none" name="kepala_id" value="<?php echo $kepalanya[0]->emp_num ?>"><?php echo $kepalanya[0]->emp_id." / ".$kepalanya[0]->emp_firstname." ".$kepalanya[0]->emp_lastname ?></td>
                    </tr>
                    <tr>
                        <td>Petugas HR</td>
                        <td>:</td>
                        <td><input type="hidden" style="display:none" name="hr_id" value="<?php echo $hrnya[0]->emp_num ?>"><?php echo $hrnya[0]->emp_id." / ".$hrnya[0]->emp_firstname." ".$hrnya[0]->emp_lastname ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="padding-bottom:50px">
            <div class="center" style="width:auto;">
                <input type="submit" name="submit" value="Simpan">
                <input type="submit" name="submit" value="Kirim">
                <input type="submit" name="submit" value="Kembali">
            </div>
        </div>
    <?php echo form_close(); 
}
    ?>
</div>
<script type="text/javascript">
var jml = 0;
var obj = <?php echo json_encode($jenisnya) ?>;
    var disabledDaysRange = new Array();
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        
        var departdate = new Array();
function setObj(objek){
    obj = objek;
}
function getJen(id){

    $.ajax({
                type:"get",
                cache:false,
                data:"jenis_id="+id,
                url:"<?php echo site_url('cuti/home/getjenis') ?>",
                success:function(data){
                    data = JSON.parse(data);
                    setObj(data);
                    obj = data;
                    $("#sisanya").html(data.sisa);
                    $("#tglMulai").removeAttr("readonly");
                    $("#tglMulai").datepicker({
                        showOn: "button",
                        buttonImage: "<?php echo base_url(); ?>css/calendar.png",
                        buttonImageOnly: true,
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(y, m, d),
                        numberOfMonths: 2,
                        onSelect: function(dateText, inst) {
                         $( "#tglSelesai" ).datepicker( "destroy" );
                            var d = new Date(dateText);
                            var y2 = d.getFullYear();
                            var m2 = parseInt(d.getMonth());
                            var d2 = d.getDate();
                            var max = addDays(d,obj.sisa);
                            var y3 = max.getFullYear();
                            var m3 = parseInt(max.getMonth());
                            var d3 = max.getDate();
                            $("input").removeAttr("readonly");
                            $("textarea").removeAttr("readonly");

                             $("#tglSelesai").datepicker({
                                showOn: "button",
                                buttonImage: "<?php echo base_url(); ?>css/calendar.png",
                                buttonImageOnly: true,
                                dateFormat: 'yy-mm-dd',
                                minDate: new Date(y2, m2, d2),
                                maxDate: new Date(y3, m3, d3),
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
                        }
                    });
                }
            });

          var d = new Date(document.getElementById("tglMulai").value);
          var y2 = d.getFullYear();
          var m2 = parseInt(d.getMonth());
          var d2 = d.getDate();
          var max = addDays(d,obj.sisa);
          var y3 = max.getFullYear();
                            var m3 = parseInt(max.getMonth());
                            var d3 = max.getDate();
                             $("#tglSelesai").datepicker({
                                showOn: "button",
                                buttonImage: "<?php echo base_url(); ?>css/calendar.png",
                                buttonImageOnly: true,
                                dateFormat: 'yy-mm-dd',
                                minDate: new Date(y2, m2, d2),
                                maxDate: new Date(y3, m3, d3),
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
}
    $(document).ready(function(){
            getJen(<?php echo $cutinya->jenis_id; ?>);
        $("#jenis_cuti").on("change",function(){
            var id = this.value;
            getJen(id);
        });
         
    });
    function addDays(dateObj,numDays){
        var tambah=0;
        var dat = dateObj;

        if(obj.hari==0){
            for(i=0;i<numDays;i=i){
                console.log(dat.getDay()+" "+i);
                if(parseInt(dat.getDay())===0){
                }
                else if(parseInt(dat.getDay())===6){
                }
                else
                    i++;    
                tambah++;
                var r = dat.setTime(dat.getTime()+(1*24*60*60*1000));
                dat = new Date(r);
            }
            tambah--;
        }
        else
            tambah=numDays-1;
        var res = dateObj.setTime(dateObj.getTime()+(tambah*24*60*60*1000));
        var d = new Date(res);
        return d;
    }
    function hapusLampiran(id){
        $.ajax({
             type:"post",
                cache:false,
                data:"id="+id,
                url:"<?php echo site_url('cuti/home/hapusLampiran') ?>",
                success:function (data){
                    if(data=="true")
                        $("#lampiran-"+id).remove();
                }
        })
    }
    function tambahLampiran(){
        jml++;
        var elm = '<div id="jml-'+jml+'"><input  type="file" name="lampiran[]"><a  onclick="hapusCol('+jml+')">Hapus</a></div>';
        $("#lampir").append(elm);
    }
    function hapusCol(id){
         $("#jml-"+id).remove();
    }
</script>
