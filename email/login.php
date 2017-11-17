
// set your roundcube domain path

?>
<form name="form" action="http://localhost:8080/eoffice/email/" method="post">
<input type="hidden" name="_action" value="login" />
<input type="hidden" name="_task" value="login" />
<input type="hidden" name="_autologin" value="1" />
<table border="0">
<tr>
<td>username:</td>
<td>
<input name="_user" id="rcmloginuser" size="28" type="text" /></td>
</tr>
<tr>
<td>Password:</td>
<td>
<input name="_pass" id="rcmloginpwd" size="28" type="password"/></td>
</tr>
<tr>
<td>
<input class="Button" type="submit" size="28" value="Webmail Login"/></td>
</tr>
</table>
</form>