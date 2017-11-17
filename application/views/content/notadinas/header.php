
    <script type="text/css" src="<?php echo base_url(); ?>js/jquery-1.8.1.min.js"></script>
    <script type="text/css" src="<?php echo base_url(); ?>js/PIE.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/drop_style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ui-darkness/jquery-ui-1.10.3.custom.css"/>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.json-2.4.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>ckeditor/config.js"></script>
        <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>ckeditor/styles.js"></script>
      
 <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>my.js"></script>
 <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>ajaxfileupload.js"></script>
       <link rel="stylesheet" type="text/css" href="<?php  echo $this->config->item('css') ?>bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php  echo $this->config->item('css') ?>jqueryui.css">
<link rel="stylesheet" type="text/css" href="<?php  echo $this->config->item('css') ?>mycss.css"> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.json-2.4.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="<?php  echo $this->config->item('js') ?>bootstrap.js"></script>
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
<style type="text/css">
    .ui-tabs .ui-tabs-nav li a {font-size:9pt !important;}
    .ui-tabs-panel {font-size: smaller;}
    #add-pemeriksa {
        height:25px;
    }
    .ui-dialog{
        z-index: 9999;
    }</style>
<script type="text/javascript">
var aktif_user = "<?php echo $user_aktif->emp_num  ?>"
function open_options(){
    $("#dialog-options").dialog("open");
    
}
function paste_ref(){
    $.ajax({
                    type:"GET",
                    cache:false,
                    url:"<?php echo site_url('notadinas/nav/paste_ref') ?>/",
                    success:function (data){
                         var content = JSON.parse(data);
                    var total = content.length;
                        var x = document.getElementById("ref");
                                var option = document.createElement("option");
                                option.text = content[0].nota_number ;
                                option.value = content[0].nota_id;
                                x.add(option, x.options[null]);
                    
                }
                });
}
function show_agenda(){
    $("#dialog-agenda").dialog("open");
}
     $("document").ready(function() {

        $("#kota").change(function(){
            document.getElementById("text_kota").innerHTML = this.value;
        });
        $("#jabatan_pengirim").change(function(){
            document.getElementById("nama-dari").innerHTML = this.value;
        });
        $("#nik_pengirim").change(function(){
            document.getElementById("nik-dari").innerHTML = this.value;
        });

$('#search-nama-nota').click(function() {
            var keyword2 = $('#keyword-nama').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/notadinas/nav/employe_json/"+keyword2,
                data: "key=" + keyword2,
                success: function(data) {

                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";

                    isi += "<th>Nama/NIP/Organisasi</th>";
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
                           isi2 += "<p id=\"nama-pem5-" + i + "\" style=\"display:none\">" + content[i].emp_firstname + " " + content[i].emp_lastname + "/" + content[i].job_code + "-" + content[i].emp_id + "/" + content[i].org_code + "</p>";
                           
                            isi2 += "<p id=\"pem-num5-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            j++;
                            $('#list-pem-table2').append(isi2);

                            $('.btn-pilih2-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];
                                var n =  "#nama-pem5-" + id;
                                var nname = $(n).html();
                                var pemid = "#data-pem5-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num5-' + id).html();
                                var x = document.getElementById(pil);
                                if(pil=="pemeriksa"){
                                        var selectdari = document.getElementById("dari");
                                        if(selectdari.length=1){
                                            if(empnum==selectdari.options[0].value){
                                                alert("data dari dan pemeriksa tidak boleh sama!");
                                                return false;
                                            }
                                        }
                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pemeriksa!");
                                                return false;
                                            
                                        }


                                    }
                                var option = document.createElement("option");
                                option.text = nname  ;
                                option.value = empnum;
                                var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
                                x.add(option, x.options[null]);
                                if(pil=="sel_disposisi"){
                                     var value_nama = nname + " / " + jobname;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+value_nama+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                   textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
                                }
                                 $('#dialog-form').dialog('close');
                            });
                        }
                    }

                }
            });
            return false;
        });
   
   
   $("#dialog-form-info-pemeriksa").dialog({
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

        $("#dialog-form-pilih-folder").dialog({
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

        $("#dialog-form-pilih-folder").css("z-index","99999");
$("#dialog-agenda").dialog({
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
        $("#dialog-agenda").css("z-index","99999");

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

        $("#dialog-form").css("z-index","99999");
        $("#dialog-form-pemeriksa").dialog({
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
        $("#dialog-options").dialog({
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

        $("#dialog-form-disposisi").dialog({
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

        $("#dialog-form-disposisi").css("z-index","99999");

        $("#tabs").tabs();
        $("#tabs-form").tabs();
       
        $('#pmh').click(function() {
            $("#dialog-form-pemohon").dialog("open");
            return false;
        });
        $('#btn-show-approver').click(function() {
            $("#dialog-form-info-pemeriksa").dialog("open");
            return false;
        });

        var i = 2;

      

        $('#search-nama').click(function() {
            var keyword2 = $('#keyword-nama-pemeriksa').val();
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/notadinas/nav/search_atasan_nama/",
                data: "key=" + keyword2,
                success: function(data) {
                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";

                    isi += "<th>Nama/NIP/Organisasi</th>";
                    isi += "<th>Pilih</th></tr>";
                    $('#list-pemeriksa-table2').html(isi);
                    if (total > 0) {
                        var i = 0;
                        var j = 1;
                        for (i = 0; i < total; i++) {
                            var isi2 = "<tr>";
                            isi2 += "<td style=\"padding-left:20px;\">" + content[i].emp_firstname + " " + content[i].emp_lastname + "/" + content[i].job_code + "-" + content[i].emp_id + "/" + content[i].org_code + "</td>";
                            isi2 += "<td style=\"padding-left:20px;\"><button id=\"pem5-" + i + "\" class=\"btn-pilih2-" + i + "\">Pilih</button></td>";
                            isi2 += "<td style=\"padding-left:20px;\"><p id=\"data-pem5-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p>";
                            isi2 += "<p id=\"pem-num5-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"org-pem5-" + i + "\" style=\"display:none\">" + content[i].org_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nama-pem5-" + i + "\" style=\"display:none\">" + content[i].emp_firstname +" "+ content[i].emp_lastname+ "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"jabat-pem5-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nik-pem5-" + i + "\" style=\"display:none\">" + content[i].emp_id + "</p></td></tr>";
                            j++;
                            $('#list-pemeriksa-table2').append(isi2);
                            $('.btn-pilih2-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];

                                var pemid = "#data-pem5-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num5-' + id).html();
                                var x = document.getElementById(pil);
                                var orgname = $("#org-pem5-"+id).html();
                                var nama = $('#nama-pem5-' + id).html();
                                var empid = $("#nik-pem5-"+id).html();
                                if(pil=="dari"){
                                    x.remove(0);
                                    var nama_dari = document.getElementById("nama-dari");
                                    var nik_dari = document.getElementById("nik-dari");
                                    var nama_pengirim = document.getElementById("nama_pengirim").value;
                                    var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                                    var nik_pengirim = document.getElementById("nik_pengirim").value;
                                    var unit_pengirim = document.getElementById("unit_pengirim").value;
                                    nama_dari.innerHTML = jabatan_pengirim;
                                    nik_dari.innerHTML ="NIP : " + empid;
                                    document.getElementById("nama_pengirim").value = jabatan_pengirim;
                                    document.getElementById("nik_pengirim").value = empid;
                                    document.getElementById("jabatan_pengirim").value = jobname;
                                    document.getElementById("unit_pengirim").value = orgname;
                                    document.getElementById("nama-dari").innerHTML=jobname;

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }

                                }
                                var option = document.createElement("option");
                                option.text = nama +" / "+jobname;
                                option.value = empnum;
                                x.add(option, x.options[null]);

                                $('#dialog-form-pemeriksa').dialog('close');
                            });
                        }
                    }

                }
            });
            return false;
        });
        $('#search-nama-pegawai').click(function() {
            var keyword2 = $('#keyword-nama-pegawai').val();
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/notadinas/nav/employe_json/"+keyword2,
                data: "key=" + keyword2,
                success: function(data) {
                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";

                    isi += "<th>Nama/NIP/Organisasi</th>";
                    isi += "<th>Pilih</th></tr>";
                    $('#list-emp-table2').html(isi);
                    if (total > 0) {
                        var i = 0;
                        var j = 1;
                        for (i = 0; i < total; i++) {
                            var isi2 = "<tr>";
                            isi2 += "<td style=\"padding-left:20px;\">" + content[i].emp_firstname + " " + content[i].emp_lastname + "/" + content[i].job_code + "-" + content[i].emp_id + "/" + content[i].org_code + "</td>";
                            isi2 += "<td style=\"padding-left:20px;\"><button id=\"pem4-" + i + "\" class=\"btn-pilih4-" + i + "\">Pilih</button></td>";
                            isi2 += "<td style=\"padding-left:20px;\"><p id=\"data-pem4-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p>";
                            isi2 += "<p id=\"pem-num4-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"org-pem4-" + i + "\" style=\"display:none\">" + content[i].org_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nama-pem4-" + i + "\" style=\"display:none\">" + content[i].emp_firstname +" "+ content[i].emp_lastname+ "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"jabat-pem4-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nik-pem4"+ i + "\" style=\"display:none\">" + content[i].emp_id + "</p></td></tr>";
                            j++;
                            $('#list-emp-table2').append(isi2);
                            $('.btn-pilih4-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];

                                var pemid = "#data-pem4-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num4-' + id).html();
                                var x = document.getElementById(pil);
                                var orgname = $("#org-pem4-"+id).html();
                                var nama = $('#nama-pem4-' + id).html();
                                var empid = $("#nik-pem4-"+id).html();

               if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+jobname+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                    textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }
                                if(pil=="dari"){
                                    x.remove(0);
                                    var nama_dari = document.getElementById("nama-dari");
                                    var nik_dari = document.getElementById("nik-dari");
                                    var nama_pengirim = document.getElementById("nama_pengirim").value;
                                    var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                                    var nik_pengirim = document.getElementById("nik_pengirim").value;
                                    var unit_pengirim = document.getElementById("unit_pengirim").value;
                                    nama_dari.innerHTML = jabatan_pengirim;
                                    nik_dari.innerHTML ="NIP : " + empid;
                                    document.getElementById("nama_pengirim").value = nama;
                                    document.getElementById("nik_pengirim").value = empid;
                                    document.getElementById("jabatan_pengirim").value = jobname;
                                    document.getElementById("unit_pengirim").value = orgname;
                                    document.getElementById("nama-dari").innerHTML=jobname;
                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }

                                }
                                var option = document.createElement("option");
                                option.text = nama +" / "+jobname;
                                option.value = empnum;
                                var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
                                x.add(option, x.options[null]);

                                $('#dialog-form').dialog('close');
                            });
                        }
                    }

                }
            });
            return false;
        });
        $('#search-jabatan').click(function() {
            var keyword = $('#key-jabatan').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/notadinas/nav/search_atasan_jabatan",
                data: "key=" + keyword,
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
                            isi2 += "<tr style=\"display:none\"><td><p id=\"org-num6-" + i + "\" style=\"display:none\">" + content[i].org_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nama-num6-" + i + "\" style=\"display:none\">" + content[i].emp_firstname +" "+ content[i].emp_lastname+ "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"jabat-num6-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nik-num6-" + i + "\" style=\"display:none\">" + content[i].emp_id + "</p></td></tr>";
                            
                            j++;
                            $('#list-pem-table').append(isi2);
                            $('.btn-pilih-jbt-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];
                                var pemid = "#data-pem6-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num6-' + id).html();
                                var orgname = $("#org-num6-"+id).html();
                                var nama = $('#nama-num6-' + id).html();
                                var empid = $("#nik-num6-"+id).html();
                                var x = document.getElementById(pil);
                                if(pil=="dari"){
                                    x.remove(0);
                                    var nama_dari = document.getElementById("nama-dari");
                                    var nik_dari = document.getElementById("nik-dari");
                                    var nama_pengirim = document.getElementById("nama_pengirim").value;
                                    var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                                    var nik_pengirim = document.getElementById("nik_pengirim").value;
                                    var unit_pengirim = document.getElementById("unit_pengirim").value;
                                    nama_dari.innerHTML = jabatan_pengirim;
                                    nik_dari.innerHTML ="NIP : " + empid;
                                    document.getElementById("nama_pengirim").value = nama;
                                    document.getElementById("nik_pengirim").value = empid;
                                    document.getElementById("jabatan_pengirim").value = jobname;
                                    document.getElementById("unit_pengirim").value = orgname;

                                    document.getElementById("nama-dari").innerHTML=jobname;
                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }

                                }
                                if(pil=="pemeriksa"){
                                        var selectdari = document.getElementById("dari");
                                        if(selectdari.length=1){
                                            if(empnum==selectdari.options[0].value){
                                                alert("data dari dan pemeriksa tidak boleh sama!");
                                                return false;
                                            }
                                        }
                                        
                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pemeriksa!");
                                                return false;
                                            
                                        }

                                }
                                var option = document.createElement("option");
                                option.text = nama + " / "+jobname;
                                option.value = empnum;
                                var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
                                x.add(option, x.options[null]);

                                $('#dialog-form-pemeriksa').dialog('close');
                            });
                        }
                    }
                }
            });
            return false;
        });
        $('#search-jabatan-pegawai').click(function() {
            var keyword = $('#key-jabatan-pegawai').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/notadinas/nav/employe_json_jabatan/"+keyword,
                success: function(data) {
                    var content = JSON.parse(data);
                    var total = content.length;

                    var isi = "<tr style=\"background-color: black; color:white;\">";
                    isi += "<th>Nama Jabatan</th>";
                    isi += "<th>Pilih</th>";
                    isi += "</tr>";

                    $('#list-emp-table').html(isi);
                    if (total > 0) {
                        var i = 0;
                        var j = 1;
                        for (i = 0; i < total; i++) {
                            var isi2 = "<tr>";
                            isi2 += "<td style=\"padding-left:20px;\">" + content[i].job_id + " - " + content[i].job_name + "</td>";
                            isi2 += "<td style=\"padding-left:20px;\"><button id=\"pem-" + i + "\" class=\"btn-pilih-jbt2-" + i + "\">Pilih</button></td>";
                            isi2 += "<td style=\"padding-left:20px;\"><p id=\"data-pem1-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p>";
                            isi2 += "<p id=\"pem-num1-" + i + "\" style=\"display:none\">" + content[i].emp_num + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"org-num1-" + i + "\" style=\"display:none\">" + content[i].org_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nama-num1-" + i + "\" style=\"display:none\">" + content[i].emp_firstname +" "+ content[i].emp_lastname+ "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"jabat-num1-" + i + "\" style=\"display:none\">" + content[i].job_name + "</p></td></tr>";
                            isi2 += "<tr style=\"display:none\"><td><p id=\"nik-num1-" + i + "\" style=\"display:none\">" + content[i].emp_id + "</p></td></tr>";
                            
                            j++;
                            $('#list-emp-table').append(isi2);
                            $('.btn-pilih-jbt2-' + i).click(function() {
                                var id = $(this).attr('id').split('-')[1];
                                var pemid = "#data-pem1-" + id;
                                var jobname = $(pemid).html();
                                var empnum = $('#pem-num1-' + id).html();
                                var orgname = $("#org-num1-"+id).html();
                                var nama = $('#nama-num1-' + id).html();
                                var empid = $("#nik-num1-"+id).html();
                                var x = document.getElementById(pil);
                                
               if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+jobname+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                    textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }
                                var option = document.createElement("option");
                                option.text = nama +" / "+jobname;
                                option.value = empnum;
                                var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
                                x.add(option, x.options[null]);

                                $('#dialog-form').dialog('close');
                            });
                        }
                    }
                }
            });
            return false;
        });
        
        var nama = "";
        var jobcode = "";
        var empid = "";
        var empnum = "";
        $(".btn-pil").click(function() {

            var id = $(this).attr('id').split('-')[1];
            var pemid = "#data-pem2-" + id;

            var jobname = $(pemid).html();
            var empnum = $('#pem-num2-' + id).html();
            var nama = $('#name-num2-' + id).html();
            var empid = $('#nik-num2-' + id).html();
            var orgname = $("#org-num2-"+id).html();
            var x = document.getElementById(pil);
            if(pil=="dari"){
                x.remove(0);
                var nama_dari = document.getElementById("nama-dari");
                var nik_dari = document.getElementById("nik-dari");
                var nama_pengirim = document.getElementById("nama_pengirim").value;
                var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                var nik_pengirim = document.getElementById("nik_pengirim").value;
                var unit_pengirim = document.getElementById("unit_pengirim").value;
                nama_dari.innerHTML = jabatan_pengirim;
                nik_dari.innerHTML ="NIP : " + empid;
                document.getElementById("nama_pengirim").value = nama;
                document.getElementById("nik_pengirim").value = empid;
                document.getElementById("jabatan_pengirim").value = jobname;
                document.getElementById("unit_pengirim").value = orgname;
                                    document.getElementById("nama-dari").innerHTML=jobname;

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }
            }
            if(pil=="pemeriksa"){
                var selectdari = document.getElementById("dari");
                if(selectdari.length=1){
                    if(empnum==selectdari.options[0].value){
                        alert("data dari dan pemeriksa tidak boleh sama!");
                        return false;
                    }
                }

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pemeriksa!");
                                                return false;
                                            
                                        }
            }
            var option = document.createElement("option");
            option.text = nama +" / "+jobname;
            option.value = empnum;
            var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
             x.add(option, x.options[null]);

            $('#dialog-form-pemeriksa').dialog('close');

            return false;
        });
        $(".btn-pil-pegawai-nama").click(function() {

            var id = $(this).attr('id').split('-')[1];
            var pemid = "#data-pem8-" + id;

            var jobname = $(pemid).html();
            var empnum = $('#pem-num8-' + id).html();
            var nama = $('#name-num8-' + id).html();
            var empid = $('#nik-num8-' + id).html();
            var orgname = $("#org-num8-"+id).html();
            var x = document.getElementById(pil);
            
               if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+jobname+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                    textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }
            
            var option = document.createElement("option");
            option.text = nama+" / "+jobname;
            option.value = empnum;
            var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
             x.add(option, x.options[null]);

            $('#dialog-form').dialog('close');

            return false;
        });
        $('.btn-pil-jbt2').click(function() {
            var id = $(this).attr('id').split('-')[1];
            var pemid = "#data-pem3-" + id;
            var jobname = $(pemid).html();
            var empnum = $('#pem-num3-' + id).html();
            var nama = $('#name-num3-' + id).html();
            var empid = $('#nik-num3-' + id).html();
            var orgname = $("#org-num3-"+id).html();
            var x = document.getElementById(pil);

               if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+jobname+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                    textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }
            if(pil=="dari"){

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }
                x.remove(0);
                var nama_dari = document.getElementById("nama-dari");
                var nik_dari = document.getElementById("nik-dari");
                var nama_pengirim = document.getElementById("nama_pengirim").value;
                var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                var nik_pengirim = document.getElementById("nik_pengirim").value;
                var unit_pengirim = document.getElementById("unit_pengirim").value;
                nama_dari.innerHTML = jabatan_pengirim;
                nik_dari.innerHTML ="NIP : " + empid;
                document.getElementById("nama_pengirim").value = nama;
                document.getElementById("nik_pengirim").value = empid;
                document.getElementById("jabatan_pengirim").value = jobname;
                document.getElementById("unit_pengirim").value = orgname;
                                    document.getElementById("nama-dari").innerHTML=jobname;
            }
            if(pil=="pemeriksa"){
                var selectdari = document.getElementById("dari");
                if(selectdari.length=1){
                    if(empnum==selectdari.options[0].value){
                        alert("data dari dan pemeriksa tidak boleh sama!");
                        return false;
                    }
                }

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pemeriksa!");
                                                return false;
                                            
                                        }


            }
            var option = document.createElement("option");
            option.text = nama +" / "+ jobname;
            option.value = empnum;
            var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
            x.add(option, x.options[null]);
            $('#dialog-form-pemeriksa').dialog('close');
        });
    $('.btn-pil-jbt').click(function() {
            var id = $(this).attr('id').split('-')[1];
            var pemid = "#data-pem9-" + id;
            var jobname = $(pemid).html();
            var empnum = $('#pem-num9-' + id).html();
            var nama = $('#name-num9-' + id).html();
            var empid = $('#nik-num9-' + id).html();
            var orgname = $("#org-num9-"+id).html();
            var x = document.getElementById(pil);
               if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+jobname+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                    textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }
            var option = document.createElement("option");
            option.text = nama+" / "+jobname;
            option.value = empnum;
            var i = 0;
            for(;i<x.length;i++){
                                if(x.options[i].value == option.value){
                    alert("Data pilihan tidak boleh ada duplikasi, silahkan cek field "+pil);
                    return false;
                }
            }
            x.add(option, x.options[null]);
            $('#dialog-form').dialog('close');
        });

        $('.btn-pil-pmh').click(function() {
            var id = $(this).attr('id').split("-")[1];
            nama = $('#pem-name8-' + id).html();
            jobcode = $('#pem-job8-' + id).html();
            empid = $('#pem-id8-' + id).html();
            empnum = $('#pem-num8-' + id).html();
            var x = document.getElementById(pil);
            if (pil=="dari") x.remove(0);
            var option = document.createElement("option");
            option.text = nama + " / " + jobcode + " / " + empid;
                                option.value = empnum;
                                x.add(option, x.options[null]);

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
            if(pil=="dari"){

                                        if(aktif_user==empnum){
                                                alert("Pembuat nota tidak di perkenankan sebagai pengirim!");
                                                return false;
                                            
                                        }
                var nama_dari = document.getElementById("nama-dari");
                var nik_dari = document.getElementById("nik-dari");
                var nama_pengirim = document.getElementById("nama_pengirim").value;
                var jabatan_pengirim = document.getElementById("jabatan_pengirim").value;
                var nik_pengirim = document.getElementById("nik_pengirim").value;
                var unit_pengirim = document.getElementById("unit_pengirim").value;
                var kota = document.getElementById("kota").value;
                nama_dari.innerHTML = jabatan_pengirim;
                nik_dari.innerHTML ="NIP : " + empid;
                document.getElementById("nama_pengirim").value = nama;
                document.getElementById("nik_pengirim").value = empid;
                document.getElementById("jabatan_pengirim").value = jobcode;
                                    document.getElementById("nama-dari").innerHTML=jobname;

            }
            if(pil=="sel_disposisi"){
                var value_nama = nama + " / " + empid + " / " + jobcode;
                var textbox  = "<tr class='attdis"+empnum+"'><td><input type=hidden name='disposisi_kepada[]' value='"+empnum+"'><input readonly type=\"text\" value='"+value_nama+"' ></td><td><a onclick=remove_att('dis"+empnum+"')>Delete</a></td><td><select name=\"nota_tindakan[]\" >";
                              textbox  =textbox+"<option value='Untuk dihadiri'>Untuk dihadiri</option>";
                                    textbox  =textbox+"<option value='Untuk diketahui'>Untuk diketahui</option>";
                                    textbox  =textbox+"<option value='Setuju dilaksanakan dan proses selanjutnya'>Setuju dilaksanakan dan proses selanjutnya</option>";
                                    textbox  =textbox+"<option value='Buatkan konsep jawabannya'>Buatkan konsep jawabannya</option>";
                                    textbox  =textbox+"<option value='Harap menjadi perhatian Sdr.'>Harap menjadi perhatian Sdr.</option>";
                                    textbox  =textbox+"<option value='Proses sesuai kewenangan Sdr.'>Proses sesuai kewenangan Sdr.</option>";
                                    textbox  =textbox+"<option value='Agar dijawab langsung oleh Sdr.'>Agar dijawab langsung oleh Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap dibicarakan langsung dengan kami'>Harap dibicarakan langsung dengan kami</option>";
                                   textbox  =textbox+" <option value='Harap dilaporkan hasilnya'>Harap dilaporkan hasilnya</option>";
                                    textbox  =textbox+"<option value='Agar diperiksa dan ditindaklanjuti'>Agar diperiksa dan ditindaklanjuti</option>";
                                    textbox  =textbox+"<option value='Manfaatkan informasi ini'>Manfaatkan informasi ini</option>";
                                    textbox  =textbox+"<option value='Ajukan saran tindak lanjut'>Ajukan saran tindak lanjut</option>";
                                    textbox  =textbox+"<option value='Teruskan hal ini ke jajaran Sdr.'>Teruskan hal ini ke jajaran Sdr.</option>";
                                    textbox  =textbox+"<option value='Harap prioritaskan tugas ini'>Harap prioritaskan tugas ini</option>";
                                    textbox  =textbox+"</select></td></tr>";
                var isitindakan = document.getElementById("tindakan").innerHTML
                document.getElementById("tindakan").innerHTML =   isitindakan+textbox;
            }

            $('#dialog-form').dialog('close');
            $('#dialog-form-pemeriksa').dialog('close');
        });
    
    });


</script>    