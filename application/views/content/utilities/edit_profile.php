<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/profile-style.css"/>
<style type="text/css">
    .error-msg {
        color:red;
        font-size: smaller;
        font-weight: bold;
    }
</style>
<script>
    $('document').ready(function() {
        $("#datebirth").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>css/calendar.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
        });
        var i = 0;
        $('#tmbh-btn').click(function() {
            var isi = "<tr id=\"row-" + i + "\" >";
            isi += "<td></td>";
            isi += "<td> : <input type=\"text\" name=\"telp_no[]\" /></td>";
            isi += "<td><button id=\"rem-" + i + "\">-</button></td>";
            isi += "</tr>";

            $('#telp').append(isi);

            $('#rem-' + i).click(function() {
                var id = $(this).attr('id').split('-')[1];
                $('#row-' + id).remove();
            });

            i++;
            return false;
        });
        
        $('.rem-btn').click(function(){
            var id =$(this).attr('id').split('-')[1];
            $('#row2-'+id).remove();
            
            return false;
        });

    });
</script>
<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Edit Profile</h2>
    <div id="right_content">
        <div id="right_content-img">
            <img width="150" style="margin-left: 70px; margin-top: 20px;" height="150" src="<?php echo base_url(); ?>css/unknown-prof-pic.png"/>
        </div>
        <div id="right_content-data" style="text-align: center;">

        </div>
    </div>
    <div id="left_content">
        <form method="post" action="<?php echo base_url(); ?>index.php/utilities/process_edit_profile" >
        <table style="padding-left: 10px;">
            <?php
            $this->load->helper('form');
            echo form_open('utilities/process_edit_profile');
            $row2 = $employee_data->row();
            ?>
            <?php
            echo form_hidden("emp_num", $row2->emp_num);
            ?>
            <tr>
                <td>Nama Depan</td>
                <td> : <?php echo form_input("firstname", $row2->emp_firstname); ?></td>
                <td class="error-msg"><?php echo form_error('firstname'); ?></td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td> : <?php echo form_input("lastname", $row2->emp_lastname); ?></td>
                <td class="error-msg"><?php echo form_error('lastname'); ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> : <select name="gender">
                        <option value="">--Pilih--</option>
                        <option value="L" <?php
                        if ($row2->emp_gender == 'L') {
                            echo "selected='selected' ";
                        }
                        ?>>Laki-Laki</option>
                        <option value="P" <?php
                        if ($row2->emp_gender == 'P') {
                            echo "selected='selected' ";
                        }
                        ?>>Perempuan</option>
                    </select></td>
                <td class="error-msg"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td> : <input type="text" readonly="readonly" name="dob" id="datebirth" value="<?php echo $row2->emp_dob; ?>" /></td>
                <td class="error-msg"><?php echo form_error('dob'); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> : <input type="text" name="address" value="<?php echo $row2->emp_street; ?>" /></td>
                <td class="error-msg"><?php echo form_error('address'); ?></td>
            </tr>
            <tbody id="telp">
            <?php
            $i = 0;
            if ($emp_telp->num_rows() > 0) {
                foreach ($emp_telp->result() as $row3) {
                    ?>
                    <tr id="row2-<?php echo $i; ?>">
                        <td><?php
                            if ($i == 0) {
                                echo 'Telp No';
                            }
                            ?></td>
                        <td> : <input type="text" name="telp_no[]" value="<?php echo $row3->telp_no; ?>" /></td>
                        <td><?php
                            if ($i == 0) {
                                echo "<button id=\"tmbh-btn\">+</button>";
                            }
                            else {
                                echo "<button class=\"rem-btn\" id=\"dt-".$i."\">-</button>";
                            }
                            ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                    <?php
            } else {
                ?>
                    <tr>
                        <td>Telp No</td>
                        <td> : <input type="text" name="telp_no[]" /></td>
                        <td><button id="tmbh-btn">+</button></td>
                    </tr>
                   
                <?php
            }
            ?>
            </tbody>
            <tr>
                <td>Email</td>
                <td> : <input type="text" name="email" value="<?php echo $row2->emp_email; ?>"/></td>
                <td class="error-msg"><?php echo form_error('email'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" style="margin-left: 10px;"/></td>
            </tr>
        </table>
        </form>
    </div>
</div>