<?php 
include_once('database.php');
class referensi extends database{
	public $nota_id;
	public $referensi_id;
	public function __construct(){
		parent::__construct();
		$this->order = "referensi_id";
		$this->table = "nota_referensi";
	}
	public function set_values(){
		$data['nota_id'] = $this->nota_id;
		$data["nota_referensi"] = $this->referensi_id;
		$this->values = $data;
	}
}
?>