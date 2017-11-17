<?php
	/**
	* 
	*/
	include_once("database.php");
	class cuti_komentar extends database
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table="cuti_komentar";
			$this->set_order("id asc");
		}

	}
?>