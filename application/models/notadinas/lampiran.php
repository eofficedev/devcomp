<?php
	/**
	* 
	*/
	include_once("database.php");
	class lampiran extends database
	{
		public $nota_id;
		public $lampiran_link;
		public $lampiran_name;
		function __construct()
		{
			parent::__construct();
			$this->table = "nota_lampiran";
			$this->order = "lampiran_id asc";
		}
		 function set_values(){
			$data["nota_id"] = $this->nota_id;
			$data["lampiran_link"] = $this->lampiran_link;
			$data["lampiran_name"] = $this->lampiran_name;
			$this->values = $data;
		}
	}
?>