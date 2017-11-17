<?php
/**
* 
*/
include_once("database.php");
class emp extends database
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = "hrms_employees";
		$this->order = "emp_num asc ";
	}
}
?>