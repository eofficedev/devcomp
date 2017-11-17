<?php
	/**
	* 
	*/
	include_once("database.php");
	class cuti_approve extends database
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table="cuti_approve";
			$this->set_order("id asc");
		}

	}
?>