<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	
    table{
        width: 100%;
    }
    .ui-tabs{
        font-size: 12px;
        height: 70%;
    }
    .ui-datepicker{
        z-index: 9999999999;
    }
</style>
<div id="content2">
    <h1 class="center">Konfigurasi Email</h1><br>
    <form method="post" action = "<?php echo site_url('email/config/simpan') ?>">
    <div style="height:250px;width:90%;margin:0 auto">
    	<div style="float:left;width:50%">
    	<h2>IMAP Server Konfiguration</h2>
	    <table>
	    	<tr>
	    		<td>IMAP Server</td>
	    		<td><input type="text" name="imap_server" value="<?php echo $konfigurasi['default_host'] ?>"></td>
	    		<td style="font-size:12px;color:red">Gunakan SSL, Contoh: ssl:/imap.gmail.com</td>
	    	</tr>
	    	<tr>
	    		<td>IMAP Port</td>
	    		<td><input type="text" name="imap_port" value="<?php echo $konfigurasi['default_port'] ?>"></td>
	    		<td></td>
	    	</tr>
	    </table>
    </div>
    <div style="float:left;width:50%">
    	<h2>SMTP Server Konfiguration</h2>
	    <table>
	    	<tr>
	    		<td>SMTP Server</td>
	    		<td><input type="text" name="smtp_server" value="<?php echo $konfigurasi['smtp_server'] ?>"></td>
	    		<td style="font-size:12px;color:red">Gunakan SSL, Contoh: ssl:/smtp.gmail.com</td>
	    	</tr>
	    	<tr>
	    		<td>SMTP Port</td>
	    		<td><input type="text" name="smtp_port" value="<?php echo $konfigurasi['smtp_port'] ?>">
	    		</td>
	    		<td></td>
	    	</tr>
	    </table>

    </div>
    <input style="margin-top:100px" type="submit" name="submit" value="Simpan">
    
    </div>
   </form>
    
</div>