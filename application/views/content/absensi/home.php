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
    a{
        color:#f4f4f4;
        text-decoration: none;
    }
    
</style>
<div id="content2">
	<h1 class="center">Absensi</h1><br>
	<div class="formnya">
		<p class="center" id="jamAbsen"></p><br>
        <form method="post" action="<?php echo site_url('absensi/home/input') ?>">
		<table class="center">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" ></td>
			</tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" ></td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php echo $image ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="text" name="captcha">
                </td>
            </tr>
        </table>

        </form>
        <table  class="center">
            <tr>
                <td colspan="3"><input type="submit" onClick="submitForm()" name="submit" value="Submit">&nbsp<button id="back"  >Home</button></td>
            </tr>
            <tr>
                <td colspan="3"><?php echo $error ?></td>
            </tr>
		</table>
	</div>
</div>
<script type="text/javascript">
function submitForm(){
    $("form").submit();

}
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
            $("#back").click(function(){
                window.location="<?php echo site_url() ?>";

            });
        });
</script>