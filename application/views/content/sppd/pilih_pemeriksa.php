<html>
    <head>
        <title><?php echo $title; ?></title>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.1.min.js"></script>
        <style>
            body {
                font-family: calibri;
            }
        </style>

        <script type="text/javascript">
//            function setValueInParent() {
//                var x = opener.document.getElementById("");
//                var name = $('#name').val();
//                x.value = name;
////                try
////                {
////                    // for IE earlier than version 8
////                    x.add(option, x.options[null]);
////                }
////                catch (e)
////                {
////                    x.add(option, null);
////                }
//                window.close();
//                return false;
//            }
            
            $(function(){
                var nama="";
                var jobcode="";
                var empid="";
                var empnum="";
                
               $('.pem').click(function(){
                  var id = $(this).attr('id').split('-')[1];
                  var data = $('#nama-'+id).html();
                  
                  nama = data.split('/')[0];
                  jobcode = data.split('/')[1].split('-')[0];
                  empid = data.split('/')[1].split('-')[1];
                  empnum = $('#emp_num-'+id).html();
                  
               });
               
               $('#btnPilih').click(function(){
                  var x = opener.document.getElementById("nama");
                  
                  x.value=nama;
                  var y = opener.document.getElementById("emp_id");
                  y.value=empid;
                   
                  var z = opener.document.getElementById("job_code");
                  z.value=jobcode;
                  var w = opener.document.getElementById("emp_num");
                  w.value=empnum;
                  
                  window.close();
                  
               });
               
            });


        </script>
    </head>

    <body>
        <div id='header' style='background-color: #000; color: white;'>
            <h2>Pilih Pemeriksa :</h2>
        </div>

        <div id='content' style='min-height: 370px; margin-bottom: 10px; text-align: center;'>

            <p><b>Search By Name:</b></p>
            <?php
            $this->load->helper('form');
            echo form_open('sppd/show_exam');
            echo form_input('keyword');
            echo form_submit('submit', 'Search');
            echo form_close();
            ?>
            <br/>
            <p><b>List Employees : </b></p>
            <p id="pilih"></p>
            <table style='width:600px; margin-top: 10px; margin-left: 80px; border: 1px dotted black; text-align: center;'>
                <thead style='background-color: #1f2024; color:white;'>
                <th>Employee Details</th>
                <th>Jabatan</th>
                <th>Pilih</th>
                </thead>

                <?php
                $i = 1;
                foreach ($all_atasan->result() as $row) {
                    ?>
                    <tr>
                        
                    <p id="emp_num-<?php echo $i; ?>" style="display:none;"><?php echo $row->emp_num; ?></p>
                        <td id="nama-<?php echo $i; ?>"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . "-" . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td><?php echo $row->job_name ?></td>
                        <td><?php
                            $data = array(
                                "name" => "pemohon",
                                "class" => "pem",
                                "id" => "pem-" . $i,
                                "value" => $row->emp_num
                            );
                            echo form_radio($data);
                            ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button id="btnPilih" onclick="javascript:setValueInParent();">Pilih</button></td>
                </tr>
            </table>
        </div>
        <div id='footer' style='height: 40px; background-color: #000; color: white;'>

        </div>
    </body>
</html>