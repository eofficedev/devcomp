<?php
	/**
	* 
	*/
	include_once("database.php");
	class nomor_nota extends database
	{
		public $nota_id;
		public $format_id;
		public $value;
		function __construct()
		{
			parent::__construct();
			$this->table="nota_nomor";
		}
		function set_values(){
			$data["nota_id"]=$this->nota_id;
			$data["format_id"]=$this->format_id;
			$data["value"]=$this->value;
			$this->values = $data;
		}
	}
?>