<?php
	/**
	* 
	*/
	include_once("database.php");
	class komentar extends database
	{
		public $nota_id;
		public $emp_num;
		public $exam_id;
		public $komentar;
		function __construct()
		{
			parent::__construct();
			$this->table = "nota_comment";
			$this->order = "comment_id asc";
		}
		function set_values(){
			$data["nota_id"]=$this->nota_id;
			$data["comment"]=$this->komentar;
			$data["comment_date"]= date('Y-m-d H:i:s');
			$data["emp_num"]= $this->emp_num;
			$this->values = $data;
		}
	}
?>