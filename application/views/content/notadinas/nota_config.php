<?php
include_once("header.php");
?>
<div id="content" class="enable-bootstrap" >
<div style="padding:30px 30px 30px 30px;">

<h1>Konfigurasi Nomor Nota</h1>
<form method="post" action="<?php echo site_url('notadinas/config/save') ?>">
	<table >
		<tr>
			<td>
				Delimiter	
			</td>
			<td>:</td>
			<td>
				<input type="text" name="field[]" value="delimiter" style="display:none"><input type="text" name="value[]" id="delimiter">
				<input type='text' style='display:none' name='skip_delimiter[]' style='display:none' value="1" > 
			</td>
		</tr>
			<td>
				Jumlah Field	
			</td>
			<td>:</td>
			<td>
				 <input type="number" name="jml" id="jml" ><br><br> <a class="btn btn-default" id="next" onclick="next();">Next</a>
			</td>
		</tr>

	</table>
	<table id="mytable">

	</table>
</form>
<script type="text/javascript">
function IsNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
	function next(){
		var delimiter = document.getElementById('delimiter').value;
		var d = delimiter;
		var jml = document.getElementById('jml').value;
		if(delimiter=="" ) 
			{
				alert("Error, Delimiternya belum di isi")
				return false;
			}
		if(!IsNumeric(jml))
			{
				alert("Error, Isi Jumlah Field harus angka")
				return false;
			}
			var i = 0;
			var isi="";
			var id = "val";
		for(i=0;i<jml;i++){
			isi = isi + "<tr style='width:300px'><td></td><td></td>";
			isi = isi + "		<td><select name=\"field[]\" onchange=\"show_val(this,'val"+i+"')\" >";
			isi = isi + "			<option value=\"auto increment\">Auto Increment</option>";
			isi = isi + "			<option value=\"unit organisasi\">Unit Organisasi</option>";
			isi = isi + "			<option value=\"text\">Text</option>";
			isi = isi + "			<option value=\"kode masalah\">Kode Masalah</option>";
			isi = isi + "			<option value=\"tanggal\">Tanggal</option>";
			isi = isi + "			<option value=\"bulan\">Bulan</option>";
			isi = isi + "			<option value=\"tahun\">Tahun</option>";
			isi = isi + "		</select><input style='display:none' type='text' name='value[]' id='"+id+i+"'><input type='text' style='display:none' name='skip_delimiter[]' style='display:none' value=0  id='ck"+i+"'> <input type='checkbox' value=1 onclick=\"ceklis(this,'ck"+i+"')\"> Skip Delimiter</td>";
			isi = isi + "		</tr>";
		}
		var table = document.getElementById("mytable").innerHTML;

		document.getElementById("mytable").innerHTML = isi;
		table = document.getElementById("mytable").innerHTML;
		document.getElementById("mytable").innerHTML = table + "<tr><td></td><td></td><td><input type='submit' value='simpan'></td></tr>";
		document.getElementById('delimiter').value = d;
	}
	function ceklis(val,id){
		if(val.checked) document.getElementById(id).value = 1;
		else document.getElementById(id).value = 0;
	}
	function show_val(val,id){
		if(val.value=="text"){
			document.getElementById(id).removeAttribute("style");
		}
		else document.getElementById(id).setAttribute("style","display:none");
	}
</script>
</div>

</div>