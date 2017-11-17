<?php 
	/**
	* 
	*/
	include_once("database.php");
	class notifikasi extends database
	{
		public $notif_desc;
		public $notif_link;
		public $notif_type;
		public $emp_num;

		function __construct()
		{
			parent::__construct();
			$this->table = "hrms_notification";
		}
		function set_values(){
			$data["notif_desc"]=$this->notif_desc;
			$data["notif_link"]=$this->notif_link;
			$data["notif_type"]=$this->notif_type;
			$data["emp_num"]=$this->emp_num;
			$data["date_post"] = date("Y-m-d H:i:s");
			$this->values = $data;
		}
	}
?>