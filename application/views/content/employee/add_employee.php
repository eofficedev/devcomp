<script src="<?php echo base_url(); ?>js/jquery.numberformatter.js"></script>
<script>
    $(document).ready(function() {
        var orgnum = "";
        $("#list_org").change(function() {
            orgnum = $('#list_org').val();
            $('#list_org2').val(orgnum);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/jobs/load_job",
                dataType: "JSON",
                data: "org=" + orgnum,
                success: function(data) {
                    var count = 1;
                    $('#list_job')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="0">--Pilih--</option>');
                    $.each(data, function(i, n) {
                        $("#org_code").val(n['org_code']);
                        var x = document.getElementById("list_job");
                        var option = document.createElement("option");
                        option.text = n['job_name'];
                        option.value = n['job_num'];
                        x.add(option, x.options[null]);
                    });
                }
            });
            return false;

        });
        
        $("#dob").datepicker();

        $('#list_job').change(function() {
            var jobnum = $('#list_job').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/jobs/load_mgr",
                dataType: "JSON",
                data: "job_num=" + jobnum,
                success: function(data) {
                    $('#add_data').html("");
                    $.each(data, function(i, n) {
                        $("#job_code").val(n['job_code']);
                    });
                }
            });
        });

        $("#reg_salary").change(function() {
            var number = $("#reg_salary").val();
            $("#reg_salary_send").val(number);

            var dollars = number.split('.')[0],
                    cents = (number.split('.')[1] || '') + '00';
            dollars = dollars.split('').reverse().join('')
                    .replace(/(\d{3}(?!$))/g, '$1.')
                    .split('').reverse().join('');
            $("#reg_salary").val("Rp. " + dollars);
        });

        $("#over_salary").change(function() {
            var number = $("#over_salary").val();
            $("#over_salary_send").val(number);

            var dollars = number.split('.')[0],
                    cents = (number.split('.')[1] || '') + '00';
            dollars = dollars.split('').reverse().join('')
                    .replace(/(\d{3}(?!$))/g, '$1.')
                    .split('').reverse().join('');
            $("#over_salary").val("Rp. " + dollars);

        });

        $("#dialog-form").dialog({
            autoOpen: false,
            width: 350,
            modal: true,
            position: 'top',
            buttons: {
                "Add Job": function() {
                    var bValid = true;
                    if (bValid) {
                        var jobid = $('#job_id2').val();
                        var jobname = $('#job_name2').val();
                        var jobcode = $('#job_code2').val();
                        var jobdesc = $('#job_desc2').val();
                        var org = $('#list_org2').val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>index.php/jobs/process_add_ajax",
                            data: "job_id=" + jobid + "&job_name=" + jobname + "&job_code=" + jobcode + "&job_description=" + jobdesc + "&organization=" + org,
                            success: function(data) {
                                var output = data.split(';')[0];
                                var value = data.split(';')[1];
                                $('#list_job').append(output);
                                $('#list_job').val(value);
                                $("#job_code").val(jobcode);
                            }
                        });
                        $(this).dialog("close");
                    }
                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).dialog("close");
            }
        }).css("font-size", "15px");


        $('#add-job').click(function() {
            $('#dialog-form').dialog("open");
            return false;
        });
        var total_telp = 0;
        $('.tambah-btn').click(function() {
            var isi = "<tr id=\"tamb-" + total_telp + "\">";
            isi += "<td></td>";
            isi += "<td> : <input type=\"text\" size=\"25\" name=\"emp_work_telp[]\" /></td>";
            isi += "</tr>";

            $('#tambah-telp').append(isi);

            $('.del-btn').click(function() {
                var id = $(this).attr('id');
                $('#tamb-' + id).remove();
            });
            return false;
        });

        $('.tambah-email-btn').click(function() {
            var isi = "<tr id=\"tambemail-" + total_telp + "\">";
            isi += "<td></td>";
            isi += "<td> : <input type=\"text\" size=\"25\" name=\"emp_work_telp[]\" /></td>";
            isi += "</tr>";

            $('#tambah-telp').append(isi);

            $('.del-btn').click(function() {
                var id = $(this).attr('id');
                $('#tambemail-' + id).remove();
            });
            return false;
        });
    });



</script>
<style type="text/css">
    .error-msg {
        font-size: smaller;
        color:red;
        font-weight: bold;
    }
</style>

<div id="dialog-form" title="Create new Job">
    <p class="validateTips">Setiap field form harus diisi</p>

    <form>
        <fieldset>
            <label for="job_id">ID Jabatan</label>
            <input type="text" name="job_id" id="job_id2" class="text ui-widget-content ui-corner-all" readonly="readonly" value="<?php echo $job_curr; ?>"/>
            <label for="job_name">Nama Jabatan</label>
            <input type="text" name="job_name" id="job_name2" value="" class="text ui-widget-content ui-corner-all" />
            <label for="job_code">Kode Jabatan</label>
            <input type="text" name="job_code" id="job_code2" value="" class="text ui-widget-content ui-corner-all" />
            <label for="job_code">Deskripsi Jabatan</label>
            <textarea name="job_desc" id="job_desc2" class="text ui-widget-content ui-corner-all"></textarea>
            <input type="hidden" name="emp_org" id="list_org2"/>

        </fieldset>
    </form>
</div>

<div id="content">
    <?php 
        if($countEmployee-2 == $app_config->result_object[0]->maxUsers){
            echo "<h2>Jumlah data pegawai untuk versi eOffice Anda telah mencapai batas, silahkan update ke versi Premium</h2>";
        }
        else{
    ?>
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Tambah Pegawai Baru</h2>
    <form id="form_add_emp" action="<?php echo base_url(); ?>index.php/emp/process_add" method="post"> 
        <fieldset style="border:1px dotted black;">
            <legend>Basic Information</legend>
            <table>
                <?php
                $this->load->helper('form');
                ?>

                <tr>
                    <td>NIP</td>
                    <?php
                    $data = array(
                        'name' => 'emp_id',
                        'size' => '15',
                        'value' => set_value('emp_id')
                    );
                    ?>
                    <td> : <?php echo form_input($data); ?></td>
                    <td></td>

                </tr>
                <tr>
                    <td>Nama Depan</td>
                    <td> : <?php
                        $data = array(
                            'name' => 'emp_firstname',
                            'size' => '30',
                            'value' => set_value('emp_firstname')
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('emp_firstname'); ?></td>
                </tr>
                <tr>
                    <td>Nama Belakang</td>
                    <td> : <?php
                        $data = array(
                            'name' => 'emp_lastname',
                            'size' => '30',
                            'value' => set_value('emp_lastname')
                        );
                        echo form_input($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('emp_lastname'); ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <?php
                    $valgender = set_value('gender');
                    ?>
                    <td> : <select name="gender">
                            <option value="">--Pilih--</option>
                            <option value="L" 
                            <?php
                            if (isset($valgender) && $valgender == 'L') {
                                echo "selected=\"selected\"";
                            }
                            ?>>Laki - Laki</option>
                            <option value="P" <?php
                            if (isset($valgender) && $valgender == 'P') {
                                echo "selected=\"selected\"";
                            }
                            ?>>Perempuan</option>
                        </select></td>
                    <td class="error-msg"><?php echo form_error('gender'); ?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td> : <?php
                        $data = array(
                            'id' => 'dob',
                            'name' => 'emp_dob',
                            'size' => '20',
                            'value' => set_value('emp_dob')
                        );

                        echo form_input($data);
                        ?></td>
                    <td class="error-msg"><?php echo form_error('emp_dob'); ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : <?php
                        $data = array(
                            'name' => 'emp_street',
                            'size' => '40',
                            'value' => set_value('emp_street')
                        );
                        echo form_input($data);
                        ?></td>
                    <td class="error-msg"><?php echo form_error('emp_street'); ?></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td> : <?php
                        $data = array(
                            'name' => 'emp_work_telp[]',
                            'size' => '25',
                            'value' => set_value('emp_work_telp')
                        );
                        echo form_input($data);
                        ?></td>
                    <td class="error-msg"><?php echo form_error('emp_work_telp'); ?></td>
                    <td><button class="tambah-btn">+</button></td>
                </tr>
                <tbody id="tambah-telp">

                </tbody>
                <tr>
                    <td>Email</td>
                    <td> : <?php
                        $data = array(
                            'name' => 'emp_email',
                            'size' => '35',
                            'value' => set_value('emp_email')
                        );
                        echo form_input($data);
                        ?></td>
                    <td class="error-msg"><?php echo form_error('emp_email'); ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="border:1px dotted black; margin-top: 10px;">
            <legend>Informasi Standar Kepegawaian</legend>
            <table>

                <tr>
                    <td>Organisasi Pegawai</td>
                    <td>      : <select id="list_org" name="emp_org">
                            <option value="">--Pilih--</option>
                            <?php
                            foreach ($org->result() as $row3) {
                                ?>
                                <option value="<?php echo $row3->org_num; ?>"><?php echo $row3->org_name; ?></option>
                                <?php
                            }
                            ?>

                        </select></td>
                    <td class="error-msg"><?php echo form_error('emp_org'); ?></td>
                </tr>
                <input type="hidden" name="org_code" id="org_code" value=""/>
                <input type="hidden" name="job_code" id="job_code" value=""/>
                <tr>
                    <td>Jabatan Pegawai</td>
                    <td> : <select id="list_job" onchange="load_manager()" name="emp_job">
                            <option value="">--Pilih--</option>
                        </select><button id="add-job">Add new Job</button></td>
                    <td class="error-msg"><?php echo form_error('emp_job'); ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset style="border:1px dotted black; margin-top: 10px;">
            <legend>Informasi Login</legend>
            <table>
                <tr>
                    <td>Password</td>
                    <td> : 
                        <?php
                        $data = array(
                            'name' => 'password',
                            'size' => '30',
                            'value' => set_value('password')
                        );

                        echo form_password($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('password'); ?></td>
                </tr>
                <tr>
                    <td>Ketik Ulang Password</td>
                    <td> : 
                        <?php
                        $data = array(
                            'name' => 'cpassword',
                            'size' => '30',
                            'value' => set_value('cpassword')
                        );
                        echo form_password($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('cpassword'); ?></td>
                </tr>

            </table>
        </fieldset>
        <fieldset style="border:1px dotted black; margin-top: 10px;">
            <legend>Informasi Email Login</legend>
            <table>
                <tr>
                    <td>Email Username</td>
                    <td> : 
                        <?php
                        $data = array(
                            'name' => 'email_username',
                            'size' => '30',
                            'value' => set_value('email_username')
                        );

                        echo form_input($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('email_username'); ?></td>
                </tr>
                <tr>
                    <td>Email Password</td>
                    <td> : 
                        <?php
                        $data = array(
                            'name' => 'email_password',
                            'size' => '30',
                            'value' => set_value('email_password')
                        );

                        echo form_password($data);
                        ?>
                    </td>
                    <td class="error-msg"><?php echo form_error('email_password'); ?></td>
                </tr>

            </table>
        </fieldset>
        <div style="text-align: center; margin-top: 20px;">
<?php echo form_submit('simpan', 'Simpan'); ?>
        </div>
    </form>
    <?php }
    ?>
</div>


