<?php
	/**
	* 
	*/
	include_once("database.php");
	class cuti_lampiran extends database
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table="cuti_lampiran";
			$this->set_order("id asc");
		}

	}
?>