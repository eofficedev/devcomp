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
            $(function(){
                var nama="";
                var orgcode="";
                var empid="";
                var empnum="";
                
               $('.pem').click(function(){
                  var id = $(this).attr('id').split('-')[1];
                  alert(id);
                  var data = $('#nama-'+id).html();
                  
                  nama = data.split('/')[0];
                  empid = data.split('/')[1];
                  orgcode = data.split('/')[2];
                  empnum = $('#emp_num-'+id).html();
                  
               });
               
               $('#btnPilih').click(function(){
                  var x = opener.document.getElementById("employee");
                  x.value=nama+"/"+empid+"/"+orgcode;
                  $('#emp_num',window.opener.document).val(empnum);
                  
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
            
            <?php
            if($employee->num_rows()==0){
                
                ?>
            <p><b>Data Tidak Ada</b></p>
            <?php
            }
            else {
            ?>
            <table style='width:600px; margin-top: 10px; margin-left: 80px; border: 1px dotted black; text-align: center;'>
                <thead style='background-color: #1f2024; color:white;'>
                <th>Employee Details</th>
                <th>Pilih</th>
                </thead>

                <?php
                $i = 1;
                foreach ($employee->result() as $row) {
                    ?>
                    <tr>
                        
                    <p id="emp_num-<?php echo $i; ?>" style="display:none;"><?php echo $row->emp_num; ?></p>
                        <td id="nama-<?php echo $i; ?>"><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->emp_id . "/" . $row->org_code; ?></td>
                        
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
                    <td><button id="btnPilih" onclick="javascript:setValueInParent();">Pilih</button></td>
                </tr>
            </table>
            <?php
            }
            ?>
        </div>
        <div id='footer' style='height: 40px; background-color: #000; color: white;'>

        </div>
    </body>
</html>