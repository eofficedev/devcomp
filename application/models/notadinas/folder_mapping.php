<?php
	/**
	* 
	*/
	include_once("database.php");
	class folder_mapping extends database
	{
		public $nota_id;
		public $folder_id;
		public $archive_status = 0;
		public $nota_create_date;
		public function __construct()
		{
			parent::__construct();
			$this->table ="nota_folder_mapping";
			$this->order = "nota_create_date desc";
		}
		public function set_values(){
			$data["nota_id"] = $this->nota_id;
			$data["folder_id"] = $this->folder_id;
			$data["archive_status"] = $this->archive_status;
			$data["nota_create_date"] = date("Y-m-d H:i:s");
			$this->values = $data;

		}
	}
?>