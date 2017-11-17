<?php
/**
* 
*/
include_once("database.php");
class folder extends database
{
	public $emp_num;	
	public $folder_name;
	function __construct()
	{
		parent::__construct();
		$this->table = "nota_folder";
		$this->order = "folder_id asc";
	}
	function set_values(){
		$data["folder_name"] = $this->folder_name;
		$data["emp_num"] = $this->emp_num;
		$this->values = $data;
	}

}
?>