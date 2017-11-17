<?php
/**
* 
*/
include_once("database.php");
class masalah extends database
{
	
	function __construct()
	{
		parent::__construct();
		$this->table = "nota_kode_masalah";
		$this->order = "id_kode_masalah asc";
	}


}
?>