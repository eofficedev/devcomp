<style type="text/css">
    .error-msg {
        color:red;
        font-size: smaller;
        font-weight: bold;
    }
    
</style>

<div id="content">
    <h2 style="margin: 0px; padding: 20px; text-align: left;">Change Password</h2>
    
    <fieldset>
        <legend>Informasi Login</legend>
        <table>
            <?php 
            $this->load->helper('form');
            echo form_open("utilities/process_change_password"); ?>
            <tr>
                <td>Sandi Lama : </td>
                <td><input type="password" name="old" /></td>
                <td class="error-msg"><?php echo form_error('old'); ?></td>
            </tr>
            <tr>
                <td>Sandi Baru : </td>
                <td><input type="password" name="new" /></td>
                <td class="error-msg"><?php echo form_error('new'); ?></td>
            </tr>
            <tr>
                <td>Ketik Ulang Sandi Baru : </td>
                <td><input type="password" name="confirm" /></td>
                <td class="error-msg"><?php echo form_error('confirm'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save" style="width: 100px;"/></td>
            </tr>
            <?php echo form_close(); ?>
        </table>
        
    </fieldset>
</div>