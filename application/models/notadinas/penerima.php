<?php
/**
*  
*/
include_once("database.php");
class penerima extends database
{
	public $nota_id;
	public $emp_num;
	public $cc_status = 0;
	public $disposisi_status = 0;
	function __construct()
	{
		parent::__construct();
		$this->table = "nota_receiver";
		$this->order = "receiver_id asc";

	}
	function set_values(){
		$data['nota_id'] = $this->nota_id;
		$data['emp_num'] = $this->emp_num;
		$data['cc_status'] = $this->cc_status;
		$data['disposisi_status'] = $this->disposisi_status;
		$this->values = $data;
	}
}

?>