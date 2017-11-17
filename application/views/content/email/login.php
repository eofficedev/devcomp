<form id="myForm" style="display:none" name="form" action="<?php echo base_url('email/') ?>" method="post">
<input type="hidden" name="_action" value="login" />
<input type="hidden" name="_task" value="login" />
<input type="hidden" name="_autologin" value="1" />
<table border="0">
<tr>
<td>username:</td>
<td>
<input name="_user" id="rcmloginuser" size="28" type="text" value="<?php echo $user_aktif->email_username ?>" /></td>
</tr>
<tr>
<td>Password:</td>
<td>
<input name="_pass" id="rcmloginpwd" size="28" type="password" value="<?php echo $user_aktif->email_password ?>" /></td>
</tr>
<tr>
<td>
<input class="Button" type="submit" size="28" value="Webmail Login"/></td>
</tr>
</table>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$("#myForm").submit();
});
</script>