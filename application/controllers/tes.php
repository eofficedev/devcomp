<?php
 
   class tes extends Controller {
 
        public $swfCharts ;
 
        public function __construct() {
            parent::Controller() ;
            $this->load->helper('url') ;
            $this->load->library('fusioncharts') ;
 
            $this->swfCharts  = base_url().'js/FCF_Column3D.swf' ;
        }
 
        public function index() {
            //Store Name of Products
            $arrData[0][1] = "Product A";
            $arrData[1][1] = "Product B";
            $arrData[2][1] = "Product C";
            $arrData[3][1] = "Product D";
            $arrData[4][1] = "Product E";
            $arrData[5][1] = "Product F";
 
            //Store sales data
            $arrData[0][2] = 567500;
            $arrData[1][2] = 815300;
            $arrData[2][2] = 556800;
            $arrData[3][2] = 734500;
            $arrData[4][2] = 676800;
            $arrData[5][2] = 648500;
 
            $strXML        = $this->fusioncharts->setDataXML($arrData,'','Rp') ;
 
            $data['graph'] = renderChartHTML($this->swfCharts,'',$strXML,"productSales", 600, 300, false, false) ;
 
            $this->load->view('dashboard_admin',$data) ;
        }
    }
?>
