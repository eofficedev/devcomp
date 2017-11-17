<?php
	/**
	* 
	*/
	include_once("database.php");
	class cuti extends database
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table="cuti_data";
			$this->set_order("last_edited desc");
		}

	}
?>