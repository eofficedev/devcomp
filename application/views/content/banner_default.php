<div id="banner-top">
    <script type="text/javascript">
        function updateClock() {
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
                var elem = document.getElementById('clock');
 
                // Sets the elements inner HTML value to our clock data
                elem.innerHTML = "Date/Time : "+day+" "+hours + ':' + minutes + ':' + seconds;
            }

    </script>
    <?php
        $appconfig = $app_config->row();
    ?>
    <h1><?php echo $appconfig->app_title; ?></h1>
    
    <p style="margin-left: 10px;" id="clock">    
    <?php
//     $this->load->helper('date');
//         $datestring = "%d-%m-%Y - %h:%i %A";
//         $time = time();
//         $timezone = 'UP7';
//         $timedata=  gmt_to_local($time, $timezone, FALSE);
//         echo unix_to_human($timedata);
// //        echo mdate($datestring, $gmt);
        ?>
    </p>
</div>