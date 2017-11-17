<div id="content2">
    <div id="login-form">
        <div id='login-content-left'>
            <img id="login-picture" height="200px" src='<?php echo base_url('css').'/'.$app_config->row()->logo_url; ?>' />
        </div>
        <div id='login-content-right'>
            <div id='title' style='border-bottom: 1px dotted black;'>
                <h3 id="title" style='margin-top:5px;margin-bottom:5px;'>Login To System</h3>
            </div>
            <?php // echo validation_errors('<p class="error" style="margin-top:5px; margin-bottom:5px;">'); ?>
            <?php
            $this->load->helper('form');
            echo form_open('login/validate_credentials');
            ?>
            <table style="margin-top: 10px;">
                <tr>
                    <td colspan="2" style="text-align: center;background-color:red; color:white; <?php if (!isset($error)) { echo "display:none;";} ?>"><?php
                    if(isset($error)){
                        echo "<b>".$error."</b>";
                    }
                    ?></td>
                </tr>
                <tr style="font-size: smaller; color: red;">
                    <td></td>
                    <td>
                        <p style="font-size: smaller; color: red;"><b><?php echo form_error('username'); ?></b></p>
                    </td>
                </tr>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" /></td>
                </tr>
                
                <tr style="font-size: smaller; color: red;">
                    <td></td>
                    <td><p style="font-size: smaller; color: red;"><b><?php echo form_error('password'); ?></b></p></td>
                </tr>
                <tr>
                    <td>Sandi : </td>
                    <td><input type="password" name="password" /></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login" /></td>
                </tr>
            </table>
        
        <a  href="<?php echo site_url('absensi') ?>"><img style="padding-top:50px" width="100px" src="<?php echo base_url('public/images/icon-absen.jpg') ?>"><br> Absen</a>
            <?php
                echo form_close();
            ?>    
        </div>

    </div>
</div>
<script type="text/javascript">

</script>