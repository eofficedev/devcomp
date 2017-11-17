<?php
include_once("header.php");
?>
<div class="enable-bootstrap">
<h2>Pencarian</h2>
<form action="<?php echo site_url('notadinas/nav/search') ?>" method="post">
Kata Pencarian : <br><input type="text" class="form-control" name="perihal_cari">
<table>
	<tr>
		<td><input type="radio" name="urut" checked="checked" value="asc">Urutkan terbaru<br>
		<input type="radio" name="urut" value="desc">Urutkan terlama</td>
		<td>Tahun Dokumen : <br>
			<select name="tahun">
				<?php 
				$tahun = 2014;
				for ($i=0; $i < 20; $i++) { 
					echo "<option value='".$tahun."'>".$tahun."</option>";
					$tahun++;
				} 
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Search" class="btn btn-default" name="submit"></td>
	</tr>
</table>
</form>
</div>