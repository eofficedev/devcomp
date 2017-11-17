<?php

class Application extends CI_Controller {

    function Application() {
        parent::__construct();
        $this->load->library('HighCharts_lib.php');
    }


private function index(){
//        $data['charts'] = $this->getChart($studentName);
        $data['charts'] = $this->getChart();
        $this->load->view('charts',$data);
}

private function getChart() {

        $this->highcharts->set_title('Biaya pengeluaran SPPD');
        $this->highcharts->set_dimensions(740, 300); 
        $this->highcharts->set_axis_titles('Date', 'Price');
        $credits->href = base_url();
        $credits->text = "Code 2 Learn : HighCharts";
        $this->highcharts->set_credits($credits);
        $this->highcharts->render_to("content_top");

        $result = $this->Charting->getChartValue();

            if ($myrow = mysql_fetch_array($result)) {
                do {
                    $value[] = intval($myrow["Price"]);
                    $date[] = ($myrow["date"]);
                } while ($myrow = mysql_fetch_array($result));
            }

            $this->highcharts->push_xcategorie($date);

            $serie['data'] = $value;
            $this->highcharts->export_file("Code 2 Learn Chart".date('d M Y')); 
            $this->highcharts->set_serie($serie, "Age");

            return $this->highcharts->render();

        }
    }

?>