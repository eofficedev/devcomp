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
            elem.innerHTML = "Date/Time : " + day + " " + hours + ':' + minutes + ':' + seconds;
        }

    </script>
    
    <?php
        $appconfig = $app_config->row();
    ?>
    <h1><?php echo $appconfig->app_title; ?></h1>
    <p style="margin-left: 10px;">
        <?php
        $this->load->helper('date');
        $row = $result->row();

        if ($row->emp_role == 1 || $row->emp_role == 3) {
            echo $row->emp_firstname . " " . $row->emp_lastname;
        } else {
            echo $row->emp_firstname . " " . $row->emp_lastname . " / " . $row->job_code . "-" . $row->id_emp . "/" . $row->org_code;
        }

        ?>
    </p>
    <p style="margin-left: 10px;" id="clock">
    </p>
</div>
<?php $this->load->view('content/sidemenu3'); ?>