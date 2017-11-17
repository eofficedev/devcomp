<?
class Chart extends CI_Controller {
 
    public function  __construct()
    {
        parent::__construct() ;
    }
 
    public function index() {
        $this->load->helper(array('url','fusioncharts_helper')) ;
 
        $graph_swfFile      = base_url().'Charts/Column3D.swf' ;
        $graph_width        = 450 ;
        $graph_height           = 250 ;
 
        // Store Name of Products
        $arrData[0][1] = "Product A";
        $arrData[1][1] = "Product B";
        $arrData[2][1] = "Product C";

 
        //Store sales data
        $arrData[0][2] = 567500;
        $arrData[1][2] = 815300;
        $arrData[2][2] = 556800;

        $strXML = "<graph caption='Test' numberPrefix=' formatNumberScale='0' decimalPrecision='0'>";
 
        //Convert data to XML and append
        foreach ($arrData as $arSubData) {
            $strXML .= "<set name='" . $arSubData[1] . "' value='" . $arSubData[2] . "' color='".getFCColor()."' />";
        }
        //Close <chart> element
        $strXML .= "</graph>";
 
        $data['graph']  = renderChart($graph_swfFile, '', $strXML, 'div' , $graph_width, $graph_height, false, false);
 
        $this->load->view('chart_view',$data) ;
    }
} 
?>