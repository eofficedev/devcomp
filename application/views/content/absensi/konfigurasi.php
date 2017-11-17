<style type="text/css">
	.center{
		text-align: center;
		margin: 0 auto;
	}
	.formnya{
		width: 500px;
		height: 430px;
		margin: 0 auto;

	}
    
</style>
<div id="content2">

    <h1 class="center">Konfigurasi Absensi</h1><br>
	<div class="formnya">
		<p class="center" id="jamAbsen"></p><br>
        <form method="post" action="<?php echo site_url('absensi/config/input') ?>">
		<table class="center">
			<tr>
				<td>Jam mulai kerja</td>
				<td>:</td>
				<td><select name="jam">
                        <?php 
                            for ($i=0; $i < 24; $i++) { 
                                $selected="";
                                $stjam=$i;
                                if(strlen($i)==1)
                                    $stjam = "0".$i;
                                if(date("H",strtotime($konfigurasi[0]->waktu_keterlambatan))==$stjam)
                                    $selected = "selected";
                                echo "<option ".$selected." value='".$stjam."' >".$stjam."</option>";
                            }
                        ?>
                    </select>
                     <select name="menit">
                        <?php 
                            for ($i=0; $i < 60; $i++) { 
                                $selected="";
                                $stjam=$i;
                                if(strlen($i)==1)
                                    $stjam = "0".$i;
                                if(date("i",strtotime($konfigurasi[0]->waktu_keterlambatan))==$stjam)
                                    $selected = "selected";
                                echo "<option ".$selected." value='".$stjam."' >".$stjam."</option>";
                            }
                        ?>
                    </select>
                </td>
			</tr>
            <tr>
                <td>Jam akhir kerja</td>
                <td>:</td>
                <td><select name="jam_pulang">
                        <?php 
                            for ($i=0; $i < 24; $i++) { 
                                $selected="";
                                $stjam=$i;
                                if(strlen($i)==1)
                                    $stjam = "0".$i;
                                if(date("H",strtotime($konfigurasi[0]->waktu_pulang))==$stjam)
                                    $selected = "selected";
                                echo "<option ".$selected." value='".$stjam."' >".$stjam."</option>";
                            }
                        ?>
                    </select>
                     <select name="menit_pulang">
                        <?php 
                            for ($i=0; $i < 59; $i++) { 
                                $selected="";
                                $stjam=$i;
                                if(strlen($i)==1)
                                    $stjam = "0".$i;
                                if(date("i",strtotime($konfigurasi[0]->waktu_pulang))==$stjam)
                                    $selected = "selected";
                                echo "<option ".$selected." value='".$stjam."' >".$stjam."</option>";
                            }
                        ?>
                    </select>
                   
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $error ?> 
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="submit" value="Submit"></td>
            </tr>
		</table>
        </form>
	</div>
</div>
<script type="text/javascript">
   function waktuJalan() {
            // Gets the current time
            var now = new Date();

            // Get the hours, minutes and seconds from the current time
            var day = now.getDate() + "/" + (parseInt(now.getMonth()) + 1) + "/" + now.getFullYear();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Format hours, minutes and seconds
            if (hours < 10) {
                hours = "0" + hours;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            // Gets the element we want to inject the clock into
            var absen = document.getElementById('jamAbsen');

            // Sets the elements inner HTML value to our clock data
            absen.innerHTML = "Tanggal: " + day + "	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jam: " + hours + ':' + minutes + ':' + seconds;
        }
        $(document).ready(function(){
            waktuJalan();
        	setInterval(waktuJalan,1000);

        });
</script>