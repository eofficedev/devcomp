<script type="text/javascript">
    $('document').ready(function() {
        $("#list-org").change(function() {
            var orgnum = $('#list-org').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/jobs/load_job",
                dataType: "JSON",
                data: "org=" + orgnum,
                success: function(data) {
                    var count = 1;
                    $('#list-job')
                            .find('option')
                            .remove()
                            .end()
                            .append('<option value="0">--Pilih--</option>');
                    $.each(data, function(i, n) {
                        var x = document.getElementById("list-job");
                        var option = document.createElement("option");
                        option.text = n['job_name'];
                        option.value = n['job_num'];
                        x.add(option, x.options[null]);
                    });
                }
            });
            return false;

        });
        
        $('#hapus-btn').click(function(){
            var x = confirm("Apakah anda yakin akan menghapus jabatan ini ?");
            var empnum = $('#emp_num').val();
            if(x){
                window.location="<?php echo base_url();?>index.php/emp/hapus_emp/"+empnum;
            }
            return false;
        });
    });
</script>
<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Update Employees</h2>
    <fieldset style="border:1px dotted black;">
        <legend>Basic Information</legend>
        <table>
            <?php
            $this->load->helper('form');
            echo form_open('emp/process_update');
            ?>
            <tr>
                <td>NIK</td>
                <?php
                $row = $employee_data->row();


                $data = array(
                    'name' => 'emp_id',
                    'size' => '15',
                    'value' => $row->emp_id,
                    'readonly' => 'readonly'
                );
                ?>

                <td> : <?php echo form_input($data); ?></td>
                <input type="hidden" name="emp_num" id='emp_num' value='<?php echo $row->emp_num; ?>' />
            </tr>
            <tr>
                <td>Nama Depan</td>
                <td> : <?php
                    $data = array(
                        'name' => 'emp_firstname',
                        'size' => '30',
                        'value' => $row->emp_firstname
                    );
                    echo form_input($data);
                    ?>
                </td>
                <td><?php echo form_error('emp_firstname'); ?></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td> : <?php
                    $data = array(
                        'name' => 'emp_lastname',
                        'size' => '30',
                        'value' => $row->emp_lastname
                    );
                    echo form_input($data);
                    ?>
                </td>
                <td class="error-msg"><?php echo form_error('emp_lastname'); ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> : <select name="gender">
                        <option value="">--Pilih--</option>


                        <option value="L" <?php
                        if ($row->emp_gender == 'L') {
                            echo "selected=\"selected\" ";
                        }
                        ?>>Laki - Laki</option>
                        <option value="P" <?php
                        if ($row->emp_gender == 'P') {
                            echo "selected=\"selected\" ";
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
                        'value' => $row->emp_dob
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
                        'size' => '50',
                        'value' => $row->emp_street
                    );
                    echo form_input($data);
                    ?></td>
                <td class="error-msg"><?php echo form_error('emp_street'); ?></td>
            </tr>

<?php
if ($telp->num_rows() > 0) {
    foreach ($telp->result() as $row2) {
        ?>
                    <tr>
                        <td>Telepon</td>
                        <td> : <?php
                            $data = array(
                                'name' => 'telp_no[]',
                                'size' => '25',
                                'value' => $row2->telp_no
                            );
                            echo form_input($data);
                            ?></td>
                        <td class="error-msg"><?php echo form_error('telp_no'); ?></td>
                    </tr>
        <?php
    }
}
?>
            <tr>
                <td>Email</td>
                <td> : <?php
                    $data = array(
                        'name' => 'emp_email',
                        'size' => '35',
                        'value' => $row->emp_email
                    );
                    echo form_input($data);
                    ?></td>
                <td class="error-msg"><?php echo form_error('emp_email'); ?></td>
            </tr>
            <tr>
                <td>Hapus</td>
                <td> : <button id="hapus-btn">Hapus Pegawai</button></td>
                <td>  </td>
            </tr>
        </table>
    </fieldset>
    <fieldset style="border:1px dotted black; margin-top: 10px;">
        <legend>Informasi Standar Kepegawaian</legend>
        <table>

            <tr>
                <td>Organisasi Pegawai</td>
                <td>      : <select name="emp_org" id="list-org">
                        <option value="0">--Pilih--</option>
                        <?php
                        foreach ($org->result() as $row3) {
                            ?>
                            <option value="<?php echo $row3->org_num; ?>" <?php
                                    if ($row->org_id == $row3->org_num) {
                                        echo 'selected=selected ';
                                    }
                                    ?>><?php echo $row3->org_name; ?></option>
    <?php
}
?>

                    </select></td>
                <td class="error-msg"><?php echo form_error('emp_org'); ?></td>
            </tr>
            <tr>
                <td>Jabatan Pegawai</td>
                <td> : <select name="emp_job" id="list-job">
                        <option value="0">--Pilih--</option>
                        <?php
                        foreach ($job->result() as $row4) {
                            ?>
                            <option value="<?php echo $row4->job_num; ?>" <?php
                                    if ($row->emp_job == $row4->job_num) {
                                        echo 'selected=selected ';
                                    }
                                    ?>><?php echo $row4->job_name; ?></option>
    <?php
}
?>
                    </select>
                </td>
                <td><?php echo form_error('emp_job'); ?></td>
            </tr>

        </table>
    </fieldset>
    <fieldset style="border:1px dotted black; margin-top: 10px;">
        <legend>Login Information</legend>
        <table>
            <tr>
                <td>Username</td>
                <td> : 
                    <?php
                    $row4 = $user_data->row();

                    $data = array(
                        'name' => 'username',
                        'size' => '30',
                        'value' => $row4->emp_username
                    );

                    echo form_input($data);
                    ?>
                </td>
                <td class="error-msg"><?php echo form_error('username'); ?></td>
            </tr>
            <tr>
                <td>Sandi</td>
                <td> : 
                    <?php
                    $data = array(
                        'name' => 'password',
                        'size' => '30'
                    );

                    echo form_password($data);
                    ?>
                </td>
                <td class="error-msg"><?php echo form_error('password'); ?></td>
            </tr>
            <tr>
                <td>Ketik Ulang Sandi</td>
                <td> : 
                    <?php
                    $data = array(
                        'name' => 'cpassword',
                        'size' => '30'
                    );
                    echo form_password($data);
                    ?>
                </td>
                <td><?php echo form_error('cpassword'); ?></td>
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
                            'value' =>  $row->email_username 
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
                            'value' => $row->email_password
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
</div>
