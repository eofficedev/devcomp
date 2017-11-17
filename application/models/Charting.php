<?php

class Charting extends CI_Model {

    function getChartValue() {
        $query = "select a.sppd_depart, (b.count(day_amount)+c.count(transport_fee)
                    From sppd_data a, sppd_day_fee b, sppd_transport_fee c
                    where a.sppd_status = 3";
        $result = mysql_query($query);
        return $result;
        echo $result;
    }
}

?>
