<?php
	/**
	* 
	*/
	include_once("database.php");
	class absensi extends database
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table="absensi";
			$this->set_order("id asc");
		}

	}
?>