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
            absen.innerHTML = "Tanggal: " + day + " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jam: " + hours + ':' + minutes + ':' + seconds;
        }
        $(document).ready(function(){
            waktuJalan();
            setInterval(waktuJalan,1000);
            var ket = "<?php echo $telahabsens[0]->keterangan ?>";
            if(ket!="")
                setInterval(resetya,1000);
        });
        var i=0;
        function resetya(){
            i++;
            if(i>5)
                window.location = "<?php echo site_url('absensi/home') ?>";
        }
</script>
<div id="content2">
	<h1 class="center">Absensi</h1><br>
	<div class="formnya">
		<p class="center" id="jamAbsen"></p><br>
        <form method="post" action="<?php echo site_url('absensi/home/inputketerangan') ?>">
        <?php if($telahabsens!="sudah pulang") {?>
        <input type="hidden" name="username" value="<?php echo $user_aktif->emp_username ?>">
		<table >
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><?php echo ($user_aktif->emp_firstname." ".$user_aktif->emp_lastname) ?></td>
			</tr>
            <tr>
                <td>Waktu Absen</td>
                <td>:</td>
                <td><?php  echo date("H:i:s", strtotime($telahabsens[0]->waktu)) ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php  echo $telahabsens[0]->status ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>
                    <?php 
                        if( $telahabsens[0]->status=="Terlambat" && $telahabsens[0]->keterangan=="" ){ ?>
                            <textarea name="keterangan"></textarea>
                    <?php 
                        }
                        else {
                            echo $telahabsens[0]->keterangan;
                        } 
                    ?>
                </td>
            </tr>
            <tr>
                <?php 
                        if( $telahabsens[0]->status=="Terlambat" && $telahabsens[0]->keterangan=="" ){ ?>
                        <td colspan="3"><input type="submit" name="submit" value="Submit"></td>
                    <?php 
                        }

                        ?>
            </tr>
		</table>
        <?php }
        else{
            echo "Anda telah melakukan absen hari ini";
        ?>
        <script type="text/javascript">
        var i=0;
            $(document).ready(function(){
setInterval(function(){
            i++;
            if(i>5)
                window.location = "<?php echo site_url('absensi/home') ?>";
        },1000);

            });
        </script>
        <?php
        }

        ?>  
        </form>
	</div>
</div>
