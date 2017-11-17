<?php
/**
* 
*/
include_once("database.php");
class nota_config extends database{


	public $tipe;
	public $urutan;
	public $value;
	public $skip_delimiter;
	function __construct()
	{
		parent::__construct();
		$this->table = "nota_format_code";
		$this->order = "urutan asc";
	}

	public function set_values(){
		$data["tipe"]=$this->tipe;
		$data["urutan"]=$this->urutan;
		$data["value"]=$this->value;
		$data["skip_delimiter"]=$this->skip_delimiter;
		$this->values = $data;
	}

}
?>