<html>
    <head>
        <title><?php echo $title; ?></title>
        <style>
            body {
                font-family: calibri;
            }
        </style>

        <script type="text/javascript">
            function setValueInParent() {
                var x = opener.document.getElementById("pemeriksa");
                var option = document.createElement("option");
                option.text = "tes";
                option.value = "aaa";
                try
                {
                    // for IE earlier than version 8
                    x.add(option, x.options[null]);
                }
                catch (e)
                {
                    x.add(option, null);
                }
                window.close();
                return false;
            }
        </script>
    </head>

    <body>
        <div id='header' style='background-color: #000; color: white;'>
            <h2>Pilih Pemeriksa :</h2>
        </div>

        <div id='content' style='height: 370px; text-align: center;'>

            <p><b>Search By Name:</b></p>
            <?php
            $this->load->helper('form');
            echo form_open('sppd/show_exam');
            echo form_input('keyword');
            echo form_submit('submit', 'Search');
            ?>
            <br/>
            <p><b>List Atasan : </b></p>
            <table style='width:600px; margin-top: 10px; margin-left: 80px; border: 1px dotted black; text-align: center;'>
                <thead style='background-color: #1f2024; color:white;'>
                <th>Employee Details</th>
                <th>Jabatan</th>
                <th>Pilih</th>
                </thead>

                <?php
                foreach ($all_atasan->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->emp_firstname . " " . $row->emp_lastname . "/" . $row->job_code . "-" . $row->emp_id . "/" . $row->org_code; ?></td>
                        <td><?php echo $row->job_name ?></td>
                        <td><?php 
                        $data = array(
                            "class"=>"pem",
                            "id"=>"sm",
                            "name"=>"data",
                            "value"=>$row->emp_num
                        );
                        echo form_radio($data); ?></td>
                    </tr>
                    <?php
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

